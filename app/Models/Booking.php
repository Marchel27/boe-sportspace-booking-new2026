<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;


    protected $table = 'bookings';
    protected $primaryKey = 'id_bok';


    protected $fillable = [
        'penyewa_id',
        'lapangan_id',
        'tanggal',
        'sesi_waktu',
        'status',
    ];

    // Relasi ke penyewa
    // Booking.php
    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'penyewa_id', 'id_pey');
    }

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id_lap');
    }

    public function rejection()
    {
        return $this->hasOne(BookingRejection::class, 'booking_id', 'id_bok');
    }


    public function dashboard()
    {
        // 1. Ambil data Summary (untuk angka-angka di atas)
        $totalLapangan = Lapangan::count();
        $totalBooking = Booking::count(); // Sesuaikan nama model booking Anda
        $totalPenyewa = Penyewa::count();

        // 2. Ambil data untuk Chart Bar (Data Lapangan per Booking)
        $lapanganStats = Lapangan::withCount('bookings')->get();
        // Pastikan di Model Lapangan sudah ada relasi 'bookings'

        $labelsLapangan = $lapanganStats->pluck('nama_lapangan'); // Nama-nama lapangan
        $dataBookingPerLapangan = $lapanganStats->pluck('bookings_count'); // Jumlah bookingnya

        return view('admin.dashboard.index', compact(
            'totalLapangan',
            'totalBooking',
            'totalPenyewa',
            'labelsLapangan',
            'dataBookingPerLapangan'
        ));
    }
}
