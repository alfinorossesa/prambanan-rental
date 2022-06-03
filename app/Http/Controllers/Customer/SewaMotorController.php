<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SewaMotorRequest;
use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Services\Customer\SewaMotorService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SewaMotorController extends Controller
{
    protected $sewaMotor;
    public function __construct(SewaMotorService $sewaMotor)
    {
        $this->sewaMotor = $sewaMotor;
    }

    public function index()
    {
        $kendaraan = $this->sewaMotor->getKendaraan();
       
        return view('customer.sewa-motor.index', compact('kendaraan'));
    }

    public function pesan(Kendaraan $kendaraan)
    {
        $kodeReservasi = $this->sewaMotor->generateRandomString();
        $tanggalPemesanan = Carbon::now();
        return view('customer.sewa-motor.pesan', compact('kendaraan', 'kodeReservasi', 'tanggalPemesanan'));
    }

    public function store(SewaMotorRequest $request)
    {
        $sewa = Peminjaman::create($request->all());

        return redirect()->route('sewa-motor.biaya', $sewa->id);

    }

    public function biaya(Peminjaman $sewa)
    {
        $motor = $this->sewaMotor->getMotor($sewa);
        $hargaSewa = $this->sewaMotor->hargaSewaPerDurasi($sewa);
        $total = $this->sewaMotor->total($sewa);
        $jamPengembalian = $this->sewaMotor->jamPengembalian($sewa);
        $tanggalPengembalian = $this->sewaMotor->tanggalPengembalian($sewa); 

        return view('customer.sewa-motor.biaya', compact('motor', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
    }

    public function pdf(Peminjaman $sewa)
    {
        $motor = $this->sewaMotor->getMotor($sewa);
        $hargaSewa = $this->sewaMotor->hargaSewaPerDurasi($sewa);
        $total = $this->sewaMotor->total($sewa);
        $jamPengembalian = $this->sewaMotor->jamPengembalian($sewa);
        $tanggalPengembalian = $this->sewaMotor->tanggalPengembalian($sewa); 

        $pdf = PDF::loadView('customer.sewa-motor.nota', compact('motor', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
        return $pdf->download('nota-sewa-motor.pdf');
    }
}
