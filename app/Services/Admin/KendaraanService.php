<?php

namespace App\Services\Admin;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Storage;

class KendaraanService
{
    public function createKendaraan($request)
    {
        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->storeAs('public/images', $nama_foto);
        
        $kendaraan = new Kendaraan();
        $kendaraan->merk_id = $request->merk_id;
        $kendaraan->no_polisi = $request->no_polisi;
        $kendaraan->no_mesin = $request->no_mesin;
        $kendaraan->no_rangka = $request->no_rangka;
        $kendaraan->tipe = $request->tipe;
        $kendaraan->kategori = $request->kategori;
        $kendaraan->kapasitas_penumpang = $request->kapasitas_penumpang;
        $kendaraan->tahun = $request->tahun;
        $kendaraan->warna = $request->warna;
        $kendaraan->foto = $nama_foto;
        $kendaraan->jenis_bbm = $request->jenis_bbm;
        $kendaraan->kapasitas_bbm = $request->kapasitas_bbm;
        $kendaraan->save();

        return $kendaraan;
    }

    public function updateKendaraan($request, $kendaraan)
    {
        $update = $kendaraan->update([
            'merk_id' => $request->merk_id,
            'no_polisi' => $request->no_polisi,
            'no_mesin' => $request->no_mesin,
            'no_rangka' => $request->no_rangka,
            'tipe' => $request->tipe,
            'kategori' => $request->kategori,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'tahun' => $request->tahun,
            'warna' => $request->warna,
            'jenis_bbm' => $request->jenis_bbm,
            'kapasitas_bbm' => $request->kapasitas_bbm
        ]);

        if($request->hasFile('foto')){
            Storage::delete('public/images/'.$kendaraan->photo);
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->storeAs('public/images', $nama_foto);
            $kendaraan->foto = $nama_foto;
            $kendaraan->update();            
        }

        return $update;
    }
}