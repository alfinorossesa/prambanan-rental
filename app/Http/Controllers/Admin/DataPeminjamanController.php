<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Services\Admin\DataPeminjamanService;

class DataPeminjamanController extends Controller
{
    protected $dataPeminjaman;
    public function __construct(DataPeminjamanService $dataPeminjaman)
    {
        $this->dataPeminjaman = $dataPeminjaman;
    }

    public function index()
    {
        $peminjaman = Peminjaman::with('pengembalian')->latest()->get();

        return view('admin.peminjaman.index', compact('peminjaman')); 
    }

    public function show(Peminjaman $peminjaman)
    {
        $hargaSewaPerDurasi = $this->dataPeminjaman->hargaSewaPerDurasi($peminjaman);
        $total = $this->dataPeminjaman->total($peminjaman);
        $jamPengembalian = $this->dataPeminjaman->jamPengembalian($peminjaman);
        $tanggalPengembalian = $this->dataPeminjaman->tanggalPengembalian($peminjaman);

        if ($peminjaman->kendaraan->kategori == 'mobil') {
            $bbm = $peminjaman->bbm ? 100000 : 0;
        } else {
            $bbm = $peminjaman->bbm ? 50000 : 0;
        }

        return view('admin.peminjaman.show', compact('peminjaman', 'total', 'jamPengembalian', 'tanggalPengembalian', 'hargaSewaPerDurasi', 'bbm'));
    }
}
