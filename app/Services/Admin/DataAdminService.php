<?php

namespace App\Services\Admin;

use App\Models\User;

class DataAdminService
{
    public function getAdmin()
    {
        $admin = User::where('isAdmin', true)->latest()->get();

        return $admin;
    }

    public function createAdmin($request)
    {
        $create = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'isAdmin' => $request->isAdmin
        ]);

        return $create;
    }
}