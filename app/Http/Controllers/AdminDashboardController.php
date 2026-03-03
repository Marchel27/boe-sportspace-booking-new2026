<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewa;
use App\Models\Lapangan;

class AdminDashboardController extends Controller
{
    // Fungsi untuk menampilkan semua data penyewa
    public function dataPenyewa(Request $request)
    {
        // Ambil semua data lapangan untuk dropdown filter di View
        $lapangans = Lapangan::all();

        // Ambil data penyewa dengan hitungan jumlah booking
        $penyewas = Penyewa::withCount('bookings')
            ->when($request->lapangan_id, function ($query) use ($request) {
                return $query->whereHas('bookings', function ($q) use ($request) {
                    // Sesuaikan 'lapangan_id' dengan nama kolom di tabel bookings Anda
                    $q->where('lapangan_id', $request->lapangan_id);
                });
            })
            ->orderBy('bookings_count', 'desc') // Mengurutkan dari yang paling sering booking
            ->get();

        // Kirim kedua variabel ke view
        return view('admin.dashboard.dataPenyewa', compact('penyewas', 'lapangans'));
    }

    // Fungsi untuk detail penyewa
    public function detailPenyewa($id_pey)
    {
        // Ambil penyewa + booking + lapangan
        $penyewa = Penyewa::with('bookings.lapangan')->findOrFail($id_pey);

        return view('admin.dashboard.detail.detailPenyewa', compact('penyewa'));
    }

    // Fungsi hapus
    public function hapusPenyewa($id_pey)
    {
        $penyewa = Penyewa::findOrFail($id_pey);
        $penyewa->delete();

        return response()->json([
            'message' => 'Penyewa dan booking terkait berhasil dihapus.'
        ]);
    }
}
