<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Services\Admin\DataPeminjamanService;
use App\Services\Admin\DataPengembalianService;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanTransaksiController extends Controller
{
    protected $dataPeminjaman;
    protected $dataPengembalian;
    public function __construct(DataPeminjamanService $dataPeminjaman, DataPengembalianService $dataPengembalian)
    {
        $this->dataPeminjaman = $dataPeminjaman;
        $this->dataPengembalian = $dataPengembalian;
    }

    public function index()
    {
        $transaksi = Pengembalian::latest()->get(); 

        return view('admin.laporan-transaksi.index', compact('transaksi'));
    }

    public function show($id)
    {
        $detailTransaksi = Peminjaman::find($id);
        $tanggalPengembalian = $this->dataPeminjaman->tanggalPengembalian($detailTransaksi);
        $jamPengembalian = $this->dataPeminjaman->jamPengembalian($detailTransaksi);
        $hargaSewaPerDurasi = $this->dataPeminjaman->hargaSewaPerDurasi($detailTransaksi);

        if ($detailTransaksi->kendaraan->kategori == 'mobil') {
            $bbm = $detailTransaksi->bbm ? 100000 : 0;
        } else {
            $bbm = $detailTransaksi->bbm ? 50000 : 0;
        }

        $pengembalian = Pengembalian::where('kode_reservasi', $detailTransaksi->kode_reservasi)->first();
        $telat = $this->dataPengembalian->telatPengembalian($pengembalian);
        
        return view('admin.laporan-transaksi.show', compact('detailTransaksi', 'tanggalPengembalian', 'jamPengembalian', 'bbm', 'hargaSewaPerDurasi', 'telat'));
    }

    public function pdf($id)
    {
        $detailTransaksi = Peminjaman::find($id);
        $tanggalPengembalian = $this->dataPeminjaman->tanggalPengembalian($detailTransaksi);
        $jamPengembalian = $this->dataPeminjaman->jamPengembalian($detailTransaksi);
        $hargaSewaPerDurasi = $this->dataPeminjaman->hargaSewaPerDurasi($detailTransaksi);

        if ($detailTransaksi->kendaraan->kategori == 'mobil') {
            $bbm = $detailTransaksi->bbm ? 100000 : 0;
        } else {
            $bbm = $detailTransaksi->bbm ? 50000 : 0;
        }

        $pengembalian = Pengembalian::where('kode_reservasi', $detailTransaksi->kode_reservasi)->first();
        $telat = $this->dataPengembalian->telatPengembalian($pengembalian);

        $pdf = Pdf::loadView('admin.laporan-transaksi.nota', compact('detailTransaksi', 'tanggalPengembalian', 'jamPengembalian', 'bbm', 'hargaSewaPerDurasi', 'telat'));
        return $pdf->download('nota-transaksi.pdf');
    }

}
