<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;
    protected $table = 'paket_wisata';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dataPaketWisata()
    {
        return $this->belongsTo(DataPaketWisata::class, 'dataPaketWisata_id');
    }
}
