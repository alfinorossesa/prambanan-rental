<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UserRequest;
use App\Models\PaketWisata;
use App\Models\Peminjaman;
use App\Models\User;
use App\Services\Customer\SewaMobilService;
use App\Services\Customer\SewaMotorService;
use App\Services\Customer\UserService;

class UserController extends Controller
{
    protected $userServcie;
    protected $sewaMobil;
    protected $sewaMotor;
    public function __construct(UserService $userServcie, SewaMobilService $sewaMobil, SewaMotorService $sewaMotor)
    {
        $this->userServcie = $userServcie;
        $this->sewaMobil = $sewaMobil;
        $this->sewaMotor = $sewaMotor;
    }

    public function profile()
    {   
        return view('customer.user.profile');
    }

    public function update(UserRequest $request, User $user)
    {
        $this->userServcie->updateUser($request, $user);
        
        return redirect()->route('user.profile', auth()->user()->id)->with('success', 'Profile berhasil di update!');
    }

    public function pemesanan(User $user)
    {
        $historySewa = $this->userServcie->history($user);
        $historyPaketWisata = $this->userServcie->historyPaketWisata($user);

        return view('customer.user.pemesanan', compact('historySewa', 'historyPaketWisata'));
    }

    public function detail($user, Peminjaman $peminjaman)
    {   
        if ($peminjaman->kendaraan->kategori == 'mobil') {
            $kendaraan = $this->sewaMobil->getMobil($peminjaman);
            $hargaSewa = $this->sewaMobil->hargaSewaPerDurasi($peminjaman);
            $total = $this->sewaMobil->total($peminjaman);
            $jamPengembalian = $this->sewaMobil->jamPengembalian($peminjaman);
            $tanggalPengembalian = $this->sewaMobil->tanggalPengembalian($peminjaman); 

            return view('customer.user.pemesanan-detail', compact('kendaraan', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
        }

        $kendaraan = $this->sewaMotor->getMotor($peminjaman);
        $hargaSewa = $this->sewaMotor->hargaSewaPerDurasi($peminjaman);
        $total = $this->sewaMotor->total($peminjaman);
        $jamPengembalian = $this->sewaMotor->jamPengembalian($peminjaman);
        $tanggalPengembalian = $this->sewaMotor->tanggalPengembalian($peminjaman); 

        return view('customer.user.pemesanan-detail', compact('kendaraan', 'hargaSewa', 'total', 'jamPengembalian', 'tanggalPengembalian'));
    }

    public function detailPaketWisata($user, PaketWisata $paketWisata)
    {
        return view('customer.user.pemesanan-detail-paket-wisata', compact('paketWisata'));
    }
}
