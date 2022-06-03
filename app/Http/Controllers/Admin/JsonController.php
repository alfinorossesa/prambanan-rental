<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Merk;
use App\Models\Peminjaman;
use App\Models\Pengembalian;

class JsonController extends Controller
{
    public function peminjamanJson($peminjaman)
    {
        $peminjaman = Peminjaman::with('kendaraan')->where('kode_reservasi', $peminjaman)->first();

        return response()->json($peminjaman, 200);;
    }

    public function pengembalianJson()
    {
        $transaksi = Pengembalian::latest()->get();
        
        return response()->json($transaksi, 200);
    }
    
    public function getMerk($kategori)
    {
        $merk = Merk::where('kategori', $kategori)->get();
        
        echo "<option selected disabled>Pilih Merk</option>";
        
        foreach ($merk as $item) {
            echo "<option value='$item->id'>$item->nama_merk</option>";
        }
    }

    public function kendaraanJson($id)
    {
        $kendaraan = Kendaraan::find($id);

        return response()->json($kendaraan, 200);
    }
}
