<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatHarga extends Model
{
    protected $table = 'riwayat_transaksi_lapangan';

    protected $fillable = [
        'lap_id',
        'harga_lama',
        'harga_baru',
    ];


    // app/Models/RiwayatHarga.php
    public function lapangan() {
        return $this->belongsTo(Lapangan::class, 'lap_id'); // id_lap = foreign key
    }
   
}

