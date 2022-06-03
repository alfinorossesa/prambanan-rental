<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaketWisata;
use Barryvdh\DomPDF\Facade\Pdf;

class DataTransaksiPaketWisataController extends Controller
{
    public function index()
    {   
        $transaksi = PaketWisata::latest()->get();

        return view('admin.transaksi-paket-wisata.index', compact('transaksi'));
    }

    public function show(PaketWisata $paketWisata)
    {
        return view('admin.transaksi-paket-wisata.show', compact('paketWisata'));
    }

    public function pdf(PaketWisata $paketWisata)
    {
        $pdf = Pdf::loadView('admin.transaksi-paket-wisata.nota', compact('paketWisata'));
        return $pdf->download('nota-paket-wisata.pdf');
    }
}
