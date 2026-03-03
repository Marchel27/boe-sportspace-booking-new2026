<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleryLapangan extends Model
{
    protected $table = 'galery_lapangan';

    protected $fillable = [
        'id_lap',
        'image_path'
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}