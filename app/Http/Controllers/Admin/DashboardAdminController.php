<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPaketWisata;
use App\Models\Kendaraan;
use App\Models\Merk;
use App\Models\Peminjaman;
use App\Models\Supir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $admin = User::where('isAdmin', true)->get()->count();
        $merk = Merk::get()->count();
        $kendaraan = Kendaraan::get()->count();
        $supir = Supir::get()->count();
        $pelanggan = User::where('isAdmin', false)->get()->count();
        $peminjaman = Peminjaman::get()->count();
        $dataPaketWisata = DataPaketWisata::get()->count();

        return view('admin.dashboard', compact('admin', 'merk', 'kendaraan', 'supir', 'pelanggan', 'peminjaman', 'dataPaketWisata'));
    }
}
