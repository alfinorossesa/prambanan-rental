<?php

namespace App\Services\Customer;

use App\Models\PaketWisata;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function updateUser($request ,$user)
    {
        $updateUser = $user->update($request->all());

        if($request->hasFile('foto')){
            Storage::delete('public/images/'.$user->foto);
            $foto = $request->file('foto');
            $nama_foto = time()."_".$foto->getClientOriginalName();
            $foto->storeAs('public/images', $nama_foto);
            $user->foto = $nama_foto;
            $user->update();            
        }

        return $updateUser;
    }

    public function history($user)
    {
        $historySewa = Peminjaman::where('user_id', $user->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return $historySewa;
    }

    public function historyPaketWisata($user)
    {
        $historyPaketWisata = PaketWisata::where('user_id', $user->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return $historyPaketWisata;
    }
}