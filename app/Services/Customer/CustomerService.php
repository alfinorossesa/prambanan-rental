<?php

namespace App\Services\Customer;

use App\Models\Kendaraan;

class CustomerService
{
    public function getKendaraan()
    {
        $kendaraan = Kendaraan::where('kategori', 'mobil')->has('hargaSewa')->limit(4)->get();

        return $kendaraan;
    }
}