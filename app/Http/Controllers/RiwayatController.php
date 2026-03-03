<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatHarga;
use App\Models\Lapangan;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RiwayatHarga::with('lapangan')
            ->orderBy('created_at', 'desc');

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filled('lapangan_id')) {
            $query->where('lap_id', $request->lapangan_id);
        }

        $transaksi = $query->get();
        $lapangans = Lapangan::all();

        return view('admin.dashboard.dataTransaksi', compact('transaksi', 'lapangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = RiwayatHarga::find($id);

        if ($transaksi) {
            $transaksi->delete();
            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dihapus.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Transaksi tidak ditemukan.'
        ], 404);
    }

    // Hapus massal transaksi
    public function bulkDelete(Request $request)
    {
        $ids = $request->ids; // array id transaksi yang dikirim dari frontend

        if (!$ids || count($ids) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada transaksi yang dipilih.'
            ], 400);
        }

        RiwayatHarga::whereIn('id', $ids)->delete();

        return response()->json([
            'success' => true,
            'message' => count($ids) . ' transaksi berhasil dihapus.'
        ]);
    }
}
