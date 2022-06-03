<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $guarded = ['id'];
    protected $with = ['merk', 'hargaSewa'];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id');
    }

    public function hargaSewa()
    {
        return $this->hasMany(HargaSewa::class, 'kendaraan_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'kendaraan_id');
    }
}
