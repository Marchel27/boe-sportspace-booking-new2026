<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Lapangan;

class KontrolJadwalController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['lapangan', 'penyewa']);

        $query->where('status', 'blocked');

        if ($request->lapangan_id) {
            $query->where('lapangan_id', $request->lapangan_id);
        }

        if ($request->tanggal) {
            $query->where('tanggal', $request->tanggal);
        }

        if ($request->sesi_waktu) {
            $query->where('sesi_waktu', $request->sesi_waktu);
        }

        $bookings = $query->latest()->get();

        $lapangan = Lapangan::all();

        return view('admin.dashboard.kontrolJadwal', compact('bookings', 'lapangan'));
    }

    public function block(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required',
            'tanggal' => 'required|date',
            'sesi_waktu' => 'required'
        ]);

        // Cek apakah jadwal sudah ada (entah dibooking orang atau sudah diblok)
        $exists = Booking::where('lapangan_id', $request->lapangan_id)
            ->where('tanggal', $request->tanggal)
            ->where('sesi_waktu', $request->sesi_waktu)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Jadwal sudah digunakan atau diblokir.');
        }

        // Buat data block baru TANPA penyewa
        Booking::create([
            'penyewa_id' => 13, // Biarkan kosong
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'sesi_waktu' => $request->sesi_waktu,
            'status' => 'blocked'
        ]);

        return back()->with('success', 'Jadwal berhasil diblok');
    }

    // Tambahkan fungsi ini
    public function cekSesiTerpakai(Request $request)
    {
        $lapangan_id = $request->lapangan_id;
        $tanggal = $request->tanggal;

        if (!$lapangan_id || !$tanggal) {
            return response()->json([]);
        }

        // Ambil semua sesi waktu yang sudah dibooking/diblokir pada tanggal & lapangan tersebut
        $sesiTerpakai = Booking::where('lapangan_id', $lapangan_id)
            ->where('tanggal', $tanggal)
            ->pluck('sesi_waktu');

        return response()->json($sesiTerpakai);
    }
}
