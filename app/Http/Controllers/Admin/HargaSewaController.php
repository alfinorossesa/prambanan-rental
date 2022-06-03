<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HargaSewaRequest;
use App\Models\HargaSewa;
use App\Models\Kendaraan;

class HargaSewaController extends Controller
{
    public function index()
    {
        $hargaSewa = HargaSewa::latest()->get();

        return view('admin.harga-sewa.index', compact('hargaSewa'));
    }

    public function create()
    {
        $kendaraan = Kendaraan::doesnthave('hargaSewa')->get();

        return view('admin.harga-sewa.create', compact('kendaraan'));
    }

    public function store(HargaSewaRequest $request)
    {
        HargaSewa::create($request->all());

        return redirect()->route('harga-sewa.index')->with('add', 'Data harga sewa berhasil ditambahkan!');
    }

    public function edit(HargaSewa $hargaSewa)
    {
        return view('admin.harga-sewa.edit', compact('hargaSewa'));
    }

    public function update(HargaSewaRequest $request, HargaSewa $hargaSewa)
    {
        $hargaSewa->update($request->all());

        return redirect()->route('harga-sewa.index')->with('update', 'Data harga sewa berhasil diubah!');
    }

    public function destroy(HargaSewa $hargaSewa)
    {
        $hargaSewa->delete();

        return redirect()->route('harga-sewa.index')->with('destroy', 'Data harga sewa berhasil dihapus!');
    }
}
