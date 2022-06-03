<?php 

namespace App\Services\Admin;

use App\Models\User;

class PelangganService
{
    public function getPelanggan()
    {
        $user = User::where('isAdmin', false)->latest()->get();

        return $user;
    }
}