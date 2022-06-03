<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $guarded = ['id'];
    protected $with = ['kendaraan'];

    public function setTimeStartedAttribute($value) {
        $this->attributes['jam'] = (new Carbon($value))->format('H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'peminjaman_id');
    }
}
