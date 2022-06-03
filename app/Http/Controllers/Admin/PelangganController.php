<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Admin\PelangganService;

class PelangganController extends Controller
{
    protected $pelanggan;
    public function __construct(PelangganService $pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }

    public function index()
    {
        $user = $this->pelanggan->getPelanggan();
        
        return view('admin.pelanggan.index', compact('user'));
    }

    public function show(User $user)
    {
        return view('admin.pelanggan.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('pelanggan.index')->with('destroy', 'Data pelanggan berhasil dihapus!');
    }
}
