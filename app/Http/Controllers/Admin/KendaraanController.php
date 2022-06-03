<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KendaraanRequest;
use App\Models\Kendaraan;
use App\Services\Admin\KendaraanService;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    protected $kendaraanService;
    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();

        return view('admin.kendaraan.index', compact('kendaraan'));
    }

    public function create()
    {
        return view('admin.kendaraan.create');
    }

    public function store(KendaraanRequest $request)
    {
        $this->kendaraanService->createKendaraan($request);

        return redirect()->route('kendaraan.index')->with('add', 'Data Kendaraan Berhasil Ditambahkan!');
    }

    public function show(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.show', compact('kendaraan'));
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    public function update(KendaraanRequest $request, Kendaraan $kendaraan)
    {
        $this->kendaraanService->updateKendaraan($request, $kendaraan);

        return redirect()->route('kendaraan.index')->with('update', 'Data Kendaraan Berhasil Diubah!');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        Storage::delete('public/images/'.$kendaraan->foto);

        return redirect()->route('kendaraan.index')->with('destroy', 'Data Kendaraan Berhasil Dihapus!');
    }

}
