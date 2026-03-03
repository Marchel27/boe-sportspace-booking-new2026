<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingRejection extends Model
{
    protected $table = 'booking_rejections';
    protected $primaryKey = 'id_rej';

    protected $fillable = [
        'booking_id',
        'reason',
    ];

    // Relasi ke booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id_bok');
    }
}