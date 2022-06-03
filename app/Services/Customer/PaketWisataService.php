<?php

namespace App\Services\Customer;

use App\Models\PaketWisata;

class PaketWisataService
{
    public function storePaketWisata($request)
    {
        $paketWisata = PaketWisata::create([
            'kode_reservasi' => $request->kode_reservasi,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'user_id' => auth()->user()->id,
            'dataPaketWisata_id' => $request->dataPaketWisata_id,
            'tanggal_berangkat' => $request->tanggal_berangkat
        ]);

        return $paketWisata;
    }

    public function generateRandomString($length = 10) 
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}