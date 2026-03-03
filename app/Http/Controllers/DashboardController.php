<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Booking;
use App\Models\Penyewa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ringkasan Statistik Utama
        $totalLapangan = Lapangan::count();
        $totalBooking  = Booking::count();
        $totalPenyewa  = Penyewa::count();
        $totalPending  = Booking::where('status', 'booked')->count(); // ✅ TAMBAHAN

        // 2. Statistik per Lapangan
        $lapanganStats = Lapangan::withCount('bookings')->get();
        $labelsLapangan = $lapanganStats->pluck('nama_lapangan')->toArray();
        $dataBookingPerLapangan = $lapanganStats->pluck('bookings_count')->toArray();

        // 3. Statistik Bulanan
        $monthlyData = Booking::select(
            DB::raw('COUNT(*) as total'),
            DB::raw("DATE_FORMAT(tanggal, '%m') as month")
        )
            ->whereYear('tanggal', date('Y'))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        $dataPengunjung = array_fill(0, 12, 0);

        foreach ($monthlyData as $data) {
            $monthIndex = (int)$data->month - 1;
            if ($monthIndex >= 0 && $monthIndex < 12) {
                $dataPengunjung[$monthIndex] = (int)$data->total;
            }
        }

        return view('admin.dashboard.master', [
            'totalLapangan'          => $totalLapangan,
            'totalBooking'           => $totalBooking,
            'totalPenyewa'           => $totalPenyewa,
            'totalPending'           => $totalPending, // ✅ TAMBAHAN
            'dataPengunjung'         => $dataPengunjung,
            'labelsLapangan'         => $labelsLapangan,
            'dataBookingPerLapangan' => $dataBookingPerLapangan,
        ]);
    }
}
