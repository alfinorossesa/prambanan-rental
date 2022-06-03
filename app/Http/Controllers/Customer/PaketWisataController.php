<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\PaketWisataRequest;
use App\Models\DataPaketWisata;
use App\Models\PaketWisata;
use App\Services\Customer\PaketWisataService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PaketWisataController extends Controller
{
    protected $paketWisata;
    public function __construct(PaketWisataService $paketWisata)
    {
        $this->paketWisata = $paketWisata;
    }

    public function index()
    {
        $paketWisata = DataPaketWisata::latest()->paginate(20);

        return view('customer.paket-wisata.index', compact('paketWisata'));
    }

    public function pesan(DataPaketWisata $paketWisata)
    {
        $kodeReservasi = $this->paketWisata->generateRandomString();
        $tanggalPemesanan = Carbon::now();

        return view('customer.paket-wisata.pesan', compact('paketWisata', 'kodeReservasi', 'tanggalPemesanan'));
    }

    public function store(PaketWisataRequest $request)
    {
        $paketWisata = $this->paketWisata->storePaketWisata($request);

        return redirect()->route('paket-wisata.biaya', $paketWisata->id);
    }

    public function biaya(PaketWisata $paketWisata) 
    {   
        return view('customer.paket-wisata.biaya', compact('paketWisata'));
    }

    public function pdf(PaketWisata $paketWisata)
    {
        $pdf = Pdf::loadView('customer.paket-wisata.nota', compact('paketWisata'));
        return $pdf->download('nota-paket-wisata.pdf');
    }
}
