<?php 

namespace App\Services\Admin;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;

class DataPengembalianService
{
    public function storeDataPengembalian($request)
    {
        $tanggalPengembalian = Carbon::now();

        $pengembalian = new Pengembalian();
        $pengembalian->peminjaman_id = $request->peminjaman_id;
        $pengembalian->kode_reservasi = $request->kode_reservasi;
        $pengembalian->tanggal_pengembalian = $tanggalPengembalian;
        $pengembalian->denda = $this->denda($request);
        $pengembalian->save();

        return $pengembalian;
    }

    public function jamPengembalian($pengembalian)
    {
        $jam = $pengembalian->peminjaman->jam_peminjaman;
        $waktu = $pengembalian->peminjaman->durasi_peminjaman;
        
        return date('H:i', strtotime($jam. ' + ' .$waktu.' hours')); 
    }

    public function tanggalPengembalian($pengembalian)
    {
        $tanggal = $pengembalian->peminjaman->tanggal_peminjaman;
        $waktu = $pengembalian->peminjaman->durasi_peminjaman;
        
        return date('d-m-Y' . $this->jamPengembalian($pengembalian), strtotime($tanggal. ' + ' .$waktu.' hours')); 
    }

    public function telatPengembalian($pengembalian)
    {
        $telat = $pengembalian->whereHas('peminjaman', function($q) use($pengembalian){
            $q->where('kode_reservasi', $pengembalian->kode_reservasi);
        })->first();

        //ambil durasi sewa
        $durasiSewa = $telat->peminjaman->durasi_peminjaman;

        //ambil tanggal sewa
        $jamSewa = date('H:i', strtotime($telat->peminjaman->jam_peminjaman));
        $tanggalSewa = date('d-m-Y ' .$jamSewa, strtotime($telat->peminjaman->tanggal_peminjaman));

        $tanggalKembali = date('d-m-Y H:i', strtotime($tanggalSewa. ' + ' .$durasiSewa.' hours'));

        //ambil tanggal sekarang
        $tanggalSekarang = date('d-m-Y H:i', strtotime($telat->tanggal_pengembalian));

        $date1 = date_create($tanggalKembali);
        $date2 = date_create($tanggalSekarang);
        $diff = date_diff($date1,$date2);

        return $diff;
    }

    public function denda($request)
    {
        $peminjaman = Peminjaman::where('kode_reservasi', $request->kode_reservasi)->firstOrFail();
    
        //ambil durasi sewa
        $durasiSewa = $peminjaman->durasi_peminjaman;

        //ambil tanggal sewa
        $jamSewa = date('H:i', strtotime($peminjaman->jam_peminjaman));
        $tanggalSewa = date('d-m-Y ' .$jamSewa, strtotime($peminjaman->tanggal_peminjaman));

        $tanggalKembali = date('d-m-Y H:i', strtotime($tanggalSewa. ' + ' .$durasiSewa.' hours'));

        //ambil tanggal sekarang
        $tanggalSekarang = date('d-m-Y H:i', strtotime(Carbon::now()));

        $date1 = date_create($tanggalKembali);
        $date2 = date_create($tanggalSekarang);
        $diff = date_diff($date1,$date2);

        if ($date1 > $date2) {
            return 0;
        }

        $dendaHari = $diff->d * 24;
        $dendajam = $diff->h;

        if ($peminjaman->kendaraan->kategori == 'mobil') {
            $denda = 10000 * ($dendaHari + $dendajam);

            return $denda;
        }

        $denda = 5000 * ($dendaHari + $dendajam);

        return $denda;
    }
}