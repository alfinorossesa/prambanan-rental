<?php

namespace App\Services\Admin;

class DataPeminjamanService
{
    public function hargaSewaPerDurasi($peminjaman)
    {
        $harga = $peminjaman->kendaraan->hargaSewa[0]->harga;
        $keterangan = $peminjaman->kendaraan->hargaSewa[0]->keterangan;
        $durasi = $peminjaman->durasi_peminjaman;
        $total = $harga * $durasi;

        if ($keterangan == 'per hari') {
            $hargaPerJam = $harga / 24;

            return round($hargaPerJam * $durasi);
        }

        return $total;
    }

    public function total($peminjaman)
    {
        $hargaSewa = $this->hargaSewaPerDurasi($peminjaman);

        if ($peminjaman->kendaraan->kategori == 'mobil') {
            $hargaSupir = $peminjaman->supir == 1 ? 100000 : 0;
            $hargaBBM = $peminjaman->bbm == 1 ? 100000 : 0;
        } else {
            $hargaSupir = 0;
            $hargaBBM = $peminjaman->bbm == 1 ? 50000 : 0;
        }

        $total = $hargaSewa + $hargaSupir + $hargaBBM;

        return $total;
    }

    public function jamPengembalian($peminjaman)
    {
        $jam = $peminjaman->jam_peminjaman;
        $durasi = $peminjaman->durasi_peminjaman;
        
        return date('H:i', strtotime($jam. ' + ' .$durasi.' hours')); 
    }

    public function tanggalPengembalian($peminjaman)
    {
        $jam = date('H:i', strtotime($peminjaman->jam_peminjaman));
        $tanggal = $peminjaman->tanggal_peminjaman;
        $durasi = $peminjaman->durasi_peminjaman;

        $tanggalJamKembali = date('d-m-Y ' .$jam, strtotime($tanggal)); 

        return date('d-m-Y', strtotime($tanggalJamKembali. ' + ' .$durasi.' hours')); 
    }
}