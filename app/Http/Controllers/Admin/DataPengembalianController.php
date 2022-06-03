<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataPengembalianRequest;
use App\Models\Pengembalian;
use App\Services\Admin\DataPengembalianService;
use Carbon\Carbon;

class DataPengembalianController extends Controller
{
    protected $dataPengembalian;
    public function __construct(DataPengembalianService $dataPengembalian)
    {
        $this->dataPengembalian = $dataPengembalian;
    }

    public function index()
    {
        $pengembalian = Pengembalian::latest()->get();

        return view('admin.pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $tanggalPengembalian = Carbon::now();

        return view('admin.pengembalian.create', compact('tanggalPengembalian'));
    }

    public function store(DataPengembalianRequest $request)
    {   
        $this->dataPengembalian->storeDataPengembalian($request);

        return redirect()->route('pengembalian.index');
    }

    public function show(Pengembalian $pengembalian)
    {
        $tanggalPengembalian = $this->dataPengembalian->tanggalPengembalian($pengembalian);
        $telat = $this->dataPengembalian->telatPengembalian($pengembalian);
        
        return view('admin.pengembalian.show', compact('pengembalian','tanggalPengembalian' , 'telat'));
    }

}
