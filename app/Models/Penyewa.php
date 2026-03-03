<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    use HasFactory;

    protected $table = 'penyewa';
    protected $primaryKey = 'id_pey';

    protected $fillable = ['nama', 'no_hp', 'email'];

    // Relasi ke booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'penyewa_id', 'id_pey');
    }

    protected static function booted()
    {
        static::deleting(function ($penyewa) {
            $penyewa->bookings()->delete();
        });
    }
}