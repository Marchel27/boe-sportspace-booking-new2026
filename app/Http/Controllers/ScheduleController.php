<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Booking;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));
        $allLapangan = Lapangan::all();

        // ambil id_lap dari URL
        $lapanganId = $request->get('id_lap');

        // cari lapangan berdasarkan id_lap
        $lapangan = Lapangan::where('id_lap', $lapanganId)->first() ?? Lapangan::first();

        $bookedSlots = [];

        if ($lapangan) {
            $bookedSlots = Booking::where('lapangan_id', $lapangan->id_lap)
                ->whereDate('tanggal', $date)
                ->pluck('sesi_waktu')
                ->toArray();
        }

        return view('schedule_booking', compact('date', 'allLapangan', 'lapangan', 'bookedSlots'));
    }
}