<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataPaketWisataRequest;
use App\Models\DataPaketWisata;
use App\Services\Admin\DataPaketWisataService;
use Illuminate\Support\Facades\Storage;

class DataPaketWisataController extends Controller
{
    protected $dataPaketWisata;
    public function __construct(DataPaketWisataService $dataPaketWisata)
    {
        $this->dataPaketWisata = $dataPaketWisata;
    }

    public function index()
    {
        $paketWisata = DataPaketWisata::latest()->get();

        return view('admin.paket-wisata.index', compact('paketWisata'));
    }

    public function create()
    {
        return view('admin.paket-wisata.create');
    }

    public function store(DataPaketWisataRequest $request)
    {
        $this->dataPaketWisata->storeDataPaketWisata($request);

        return redirect()->route('data-paket-wisata.index')->with('add', 'Data Paket Wisata berhasil ditambahkan!');
    }

    public function edit(DataPaketWisata $paketWisata)
    {
        return view('admin.paket-wisata.edit', compact('paketWisata'));
    }

    public function update(DataPaketWisataRequest $request, DataPaketWisata $paketWisata)
    {
        $this->dataPaketWisata->updateDataPaketWisata($request, $paketWisata);

        return redirect()->route('data-paket-wisata.index')->with('update', 'Data Paket Wisata berhasil diupdate!');
    }

    public function show(DataPaketWisata $paketWisata)
    {
        return view('admin.paket-wisata.show', compact('paketWisata'));
    }

    public function destroy(DataPaketWisata $paketWisata)
    {
        $paketWisata->delete();
        Storage::delete('public/images/'.$paketWisata->foto);

        return redirect()->route('data-paket-wisata.index')->with('destroy', 'Data Paket Wisata berhasil dihapus!');
    }
}
