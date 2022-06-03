<?php 

namespace App\Services\Customer;

use Illuminate\Support\Facades\DB;

class SewaMotorService
{
    public function getKendaraan()
    {
        $search = request('cari');
        $kendaraan = DB::table('kendaraan')
                ->select('kendaraan.id', 'kendaraan.kategori', 'kendaraan.tipe', 'kendaraan.foto', 'kendaraan.created_at', 'merk.nama_merk', 'harga_sewa.harga', 'harga_sewa.keterangan')
                ->join('merk', 'kendaraan.merk_id', '=', 'merk.id')
                ->join('harga_sewa', 'kendaraan.id', '=', 'harga_sewa.kendaraan_id')
                ->where(function($q) use($search){
                    $q->where('kendaraan.tipe', 'like', '%' .$search. '%')
                    ->orWhere('merk.nama_merk', 'like', '%' .$search. '%');
                })
                ->where('kendaraan.kategori', '=', 'motor')
                ->latest()->paginate(20);

        return $kendaraan;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function getMotor($sewa)
    {
        $motor = $sewa->with('kendaraan')->where('id', $sewa->id)->first();

        return $motor;
    }

    public function hargaSewaPerDurasi($sewa)
    {
        $harga = $sewa->kendaraan->hargaSewa[0]->harga;
        $keterangan = $sewa->kendaraan->hargaSewa[0]->keterangan;
        $durasi = $sewa->durasi_peminjaman;
        $total = $harga * $durasi;

        if ($keterangan == 'per hari') {
            $hargaPerJam = $harga / 24;

            return round($hargaPerJam * $durasi);
        }

        return $total;
    }

    public function total($sewa)
    {
        $hargaSewa = $this->hargaSewaPerDurasi($sewa);
        $hargaBBM = $sewa->bbm == 1 ? 50000 : 0;

        $total = $hargaSewa + $hargaBBM;

        return $total;
    }

    public function jamPengembalian($sewa)
    {
        $jam = $sewa->jam_peminjaman;
        $durasi = $sewa->durasi_peminjaman;
        
        return date('H:i', strtotime($jam. ' + ' .$durasi.' hours')); 
    }

    public function tanggalPengembalian($sewa)
    {
        $jam = date('H:i', strtotime($sewa->jam_peminjaman));
        $tanggal = $sewa->tanggal_peminjaman;
        $durasi = $sewa->durasi_peminjaman;

        $tanggalJamKembali = date('d-m-Y ' .$jam, strtotime($tanggal)); 
        
        return date('d-m-Y', strtotime($tanggalJamKembali. ' + ' .$durasi.' hours')); 
    }
}