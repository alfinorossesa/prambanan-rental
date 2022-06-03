<?php

namespace App\Services\Admin;

use App\Models\DataPaketWisata;
use Illuminate\Support\Facades\Storage;

class DataPaketWisataService
{
    public function storeDataPaketWisata($request)
    {
        $data = [];
        foreach ($request->fasilitas as $value) {
            $data[] = [
                'fasilitas' => $value
            ];
        }

        $foto = $request->file('foto');
        $nama_foto = time()."_".$foto->getClientOriginalName();
        $foto->storeAs('public/images', $nama_foto);

        $paketWisata = new DataPaketWisata();
        $paketWisata->nama_paket = $request->nama_paket;
        $paketWisata->tujuan = $request->tujuan;
        $paketWisata->fasilitas = $data;
        $paketWisata->harga = $request->harga;
        $paketWisata->foto = $nama_foto;
        $paketWisata->deskripsi = $request->deskripsi;
        $paketWisata->save();

        return $paketWisata;
    }

    public function updateDataPaketWisata($request, $paketWisata)
    {
        $data = [];
        foreach ($request->fasilitas as $value) {
            $data[] = [
                'fasilitas' => $value
            ];
        }

        $paketWisata->update([
            'nama_paket' => $request->nama_paket,
            'tujuan' => $request->tujuan,
            'fasilitas' => $data,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        if($request->hasFile('foto')){
            Storage::delete('public/images/'.$paketWisata->photo);
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->storeAs('public/images', $nama_foto);
            $paketWisata->foto = $nama_foto;
            $paketWisata->update();            
        }

        return $paketWisata;
    }
}