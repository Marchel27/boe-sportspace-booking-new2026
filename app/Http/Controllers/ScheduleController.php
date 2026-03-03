<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->get('date', date('Y-m-d'));
        $allLapangan = Lapangan::all();

        // 1. Pastikan mengambil lapangan_id dari request
        $lapanganId = $request->get('lapangan_id');

        // 2. Cari berdasarkan id_lap (Primary Key yang Anda tentukan di Model)
        $lapangan = Lapangan::where('id_lap', $lapanganId)->first() ?? Lapangan::first();

        $bookedSlots = [];
        if ($lapangan) {
            // 3. Gunakan $lapangan->id_lap, bukan $lapangan->id
            $bookedSlots = Booking::where('lapangan_id', $lapangan->id_lap)
                ->whereDate('tanggal', $date)
                ->pluck('sesi_waktu')
                ->toArray();
        }

        return view('schedule_booking', compact('date', 'allLapangan', 'lapangan', 'bookedSlots'));
    }
}
