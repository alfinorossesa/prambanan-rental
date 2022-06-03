<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPaketWisata extends Model
{
    use HasFactory;
    protected $table = 'data_paket_wisata';
    protected $guarded = ['id'];
    protected $casts = [
        'fasilitas' => 'array',
        ];

    public function paketWisata()
    {
        return $this->hasMany(PaketWisata::class, 'dataPaketWisata_id');
    }
}
