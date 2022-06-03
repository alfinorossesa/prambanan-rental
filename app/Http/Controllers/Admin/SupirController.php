<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupirRequest;
use App\Models\Supir;

class SupirController extends Controller
{
    public function index()
    {
        $supir = Supir::latest()->get();

        return view('admin.supir.index', compact('supir'));
    }

    public function create()
    {
        return view('admin.supir.create');
    }

    public function store(SupirRequest $request)
    {
        Supir::create($request->all());

        return redirect()->route('supir.index')->with('add', 'Supir berhasil ditambahkan!');
    }

    public function edit(Supir $supir)
    {
        return view('admin.supir.edit', compact('supir'));
    }

    public function update(SupirRequest $request, Supir $supir)
    {
        $supir->update($request->all());

        return redirect()->route('supir.index')->with('update', 'Supir berhasil diubah!');
    }

    public function destroy(Supir $supir)
    {
        $supir->delete();

        return redirect()->route('supir.index')->with('destroy', 'Supir berhasil dihapus!');
    }
}
