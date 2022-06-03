<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerkRequest;
use App\Models\Merk;

class MerkController extends Controller
{
    public function index()
    {
        $merk = Merk::latest()->get();

        return view('admin.merk.index', compact('merk'));
    }

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(MerkRequest $request)
    {
        Merk::create($request->all());

        return redirect()->route('merk.index')->with('add', 'Data Merk Berhasil Ditambahkan!');
    }

    public function edit(Merk $merk)
    {
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(MerkRequest $request, Merk $merk)
    {
        $merk->update($request->all());

        return redirect()->route('merk.index')->with('update', 'Data Merk Berhasil Diupdate!');
    }

    public function destroy(Merk $merk)
    {
        $merk->delete();

        return redirect()->route('merk.index')->with('destroy', 'Data Merk Berhasil Dihapus!');
    }

}
