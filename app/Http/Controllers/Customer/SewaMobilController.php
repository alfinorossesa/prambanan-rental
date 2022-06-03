<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SewaMobilRequest;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Supir;
use App\Services\Customer\SewaMobilService;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class SewaMobilController extends Controller
{
    protected $sewaMobil;
    public function __construct(SewaMobilService $sewaMobil)
    {
        $this->sewaMobil = $sewaMobil;
    }

    public function index()
    {
        $kendaraan = $this->sewaMobil->getKendaraan();

        return view('customer.sewa-mobil.index', compact('kendaraan'));
    }

    public function pesan(Kendaraan $kendaraan)
    {
        $kodeReservasi = $this->sewaMobil->generateRandomString();
        $tanggalPemesanan = Carbon::now();
        $supir = Supir::all()->count();

        return view('customer.sewa-mobil.pesan', compact('kendaraan', 'kodeReservasi', 'tanggalPemesanan', 'supir'));
    }

    public function store(SewaMobilRequest $request)
    {
        $peminjaman = Peminjaman::create($request->all());

        return redirect()->route('sewa-mobil.biaya', $peminjaman->id);
    }

    public function biaya(Peminjaman $sewa) 
    {   
        $mobil = $this->sewaMobil->getMobil($sewa);
        $hargaSewa = $this->sewaMobil->hargaSewaPerDurasi($sewa);
        $total = $this->sewaMobil->total($sewa);
        $jamPengembalian = $this->sewaMobil->jamPengembalian($sewa);
        $tanggalPengembalian = $this->sewaMobil->tanggalPengembalian($sewa); 
        
        return view('customer.sewa-mobil.biaya', compact('mobil', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
    }

    public function pdf(Peminjaman $sewa)
    {
        $mobil = $this->sewaMobil->getMobil($sewa);
        $hargaSewa = $this->sewaMobil->hargaSewaPerDurasi($sewa);
        $total = $this->sewaMobil->total($sewa);
        $jamPengembalian = $this->sewaMobil->jamPengembalian($sewa);
        $tanggalPengembalian = $this->sewaMobil->tanggalPengembalian($sewa); 

        $pdf = PDF::loadView('customer.sewa-mobil.nota', compact('mobil', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
        return $pdf->download('nota-sewa-mobil.pdf');
    }
}
