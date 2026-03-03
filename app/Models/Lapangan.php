<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{

    protected $table = 'lapangan';
    protected $primaryKey = 'id_lap';
    protected $fillable = [
    'nama_lapangan',
    'deskripsi',
    'thumbnail',
    'harga',
    'sesi',
    'kategori'
    ];


    public function galeri()
    {
        return $this->hasMany(GaleryLapangan::class, 'id_lap', 'id_lap');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'lapangan_id', 'id_lap');
    }


}