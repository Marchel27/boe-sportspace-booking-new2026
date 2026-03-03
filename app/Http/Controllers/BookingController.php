<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewa;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Jobs\SendBookingApprovedEmail;
use App\Jobs\SendBookingRejectedEmail;
use App\Models\BookingRejection;


class BookingController extends Controller
{
    /**
     * Simpan booking baru beserta data penyewa
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'nama_lapangan' => 'required|integer|exists:lapangan,id_lap',
            'tanggal' => 'required|date',
            'sesi_waktu' => 'required|string|max:50',
        ]);

        try {
            // Cek apakah lapangan dan sesi sudah di-book
            $existing = Booking::where('lapangan_id', $validated['nama_lapangan'])
                ->where('tanggal', $validated['tanggal'])
                ->where('sesi_waktu', $validated['sesi_waktu'])
                ->first();

            if ($existing) {
                return response()->json([
                    'message' => 'Sesi sudah digunakan!',
                ], 409); // 409 Conflict
            }

            // Ambil atau buat penyewa berdasarkan email
            $penyewa = Penyewa::firstOrCreate(
                ['email' => $validated['email']],
                [
                    'nama' => $validated['nama'],
                    'no_hp' => $validated['no_hp'],
                ]
            );

            // Buat booking baru
            $booking = Booking::create([
                'penyewa_id' => $penyewa->id_pey,
                'lapangan_id' => $validated['nama_lapangan'],
                'tanggal' => $validated['tanggal'],
                'sesi_waktu' => $validated['sesi_waktu'],
                'status' => 'booked', // langsung approved untuk demo, bisa diubah sesuai kebutuhan
            ]);

            // Load relasi
            $booking->load('penyewa', 'lapangan');

            return response()->json([
                'message' => 'Booking berhasil dibuat!',
                'booking' => $booking
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi error!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function index()
    {
        $lapangan = Lapangan::all(); // Ambil semua lapangan
        return view('formBooking', compact('lapangan')); // Kirim ke view
    }

    public function sesiTerpakai(Request $request)
    {
        $lapanganId = $request->query('lapangan_id');
        $tanggal = $request->query('tanggal');

        if (!$lapanganId || !$tanggal) {
            return response()->json([]);
        }

        $bookedSesi = Booking::where('lapangan_id', $lapanganId)
            ->where('tanggal', $tanggal)
            ->pluck('sesi_waktu');

        return response()->json($bookedSesi);
    }
    public function dataBooking()
    {
        $bookings = Booking::with(['penyewa', 'lapangan'])
            ->where('status', 'booked')
            ->latest()
            ->get();

        return view('admin.dashboard.jadwalBooking', compact('bookings'));
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        // Update status
        $booking->update(['status' => 'approved']);

        // Kirim email di background
        SendBookingApprovedEmail::dispatch($booking);

        // Response cepat ke frontend
        return response()->json(['message' => 'Booking approved']);
    }
    public function reject(Request $request, $id)
    {
        $request->validate(['reason' => 'required|string']);

        // 1. Cari data dan muat relasinya
        $booking = Booking::with(['penyewa', 'lapangan'])->findOrFail($id);

        // 2. Simpan alasan penolakan (opsional)
        BookingRejection::create([
            'booking_id' => $booking->id_bok,
            'reason'     => $request->reason,
        ]);

        // 3. Dispatch Job (Data aman karena sudah di-clone ke array di constructor Job)
        SendBookingRejectedEmail::dispatchSync($booking, $request->reason);

        // 4. Baru hapus datanya
        $booking->delete();

        return response()->json(['message' => 'Booking berhasil ditolak & email sedang diproses']);
    }

    public function history()
    {
        $bookings = Booking::with(['penyewa', 'lapangan'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('admin.dashboard.historyBooking', compact('bookings'));
    }

    public function detail($id)
    {
        $booking = Booking::with(['penyewa', 'lapangan'])
            ->findOrFail($id);

        return view('admin.dashboard.detail.detailBooking', compact('booking'));
    }

    public function destroy($id)
    {
        Booking::where('id_bok', $id)->delete();

        return response()->json([
            'message' => 'Booking berhasil dihapus'
        ]);
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        Booking::whereIn('id_bok', $ids)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function tanggalStatus()
    {
        $totalLapangan = \App\Models\Lapangan::count();

        $bookings = \App\Models\Booking::selectRaw('tanggal, COUNT(DISTINCT lapangan_id) as total')
            ->groupBy('tanggal')
            ->get();

        $result = [];

        foreach ($bookings as $booking) {
            if ($booking->total >= $totalLapangan) {
                $result[$booking->tanggal] = 'full';
            } else {
                $result[$booking->tanggal] = 'partial';
            }
        }

        return response()->json($result);
    }
}
