<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\GaleryLapangan;
use Illuminate\Http\Request;
use App\Models\RiwayatHarga;
use App\Models\Penyewa;

class LapanganController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'nama_lapangan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'gallery.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('lapangan_thumbnail', 'public');

        $lapangan = Lapangan::create([
            'nama_lapangan' => $request->nama_lapangan,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'thumbnail' => $thumbnailPath,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('lapangan_gallery', 'public');

                GaleryLapangan::create([
                    'id_lap' => $lapangan->id_lap, // harusnya sudah ada
                    'image_path' => $path
                ]);
            }
        }

        return redirect()->route('lapangan.index')
            ->with('success', 'Lapangan berhasil ditambahkan!');
    }

    public function index(Request $request)
    {
        $lapangan = Lapangan::all();

        $lapanganId = $request->lapangan_id;

        $penyewas = Penyewa::withCount(['bookings' => function ($query) use ($lapanganId) {
            if ($lapanganId) {
                $query->where('lapangan_id', $lapanganId);
            }
        }])
            ->when($lapanganId, function ($query) use ($lapanganId) {
                $query->whereHas('bookings', function ($q) use ($lapanganId) {
                    $q->where('lapangan_id', $lapanganId);
                });
            })
            ->get();

        return view('admin.dashboard.dataLapangan', compact('penyewas', 'lapangan'));
    }

    public function destroy($id_lap)
    {
        $lapangan = Lapangan::findOrFail($id_lap);

        // Hapus file thumbnail dulu kalau mau bersih
        if ($lapangan->thumbnail && file_exists(storage_path('app/public/' . $lapangan->thumbnail))) {
            unlink(storage_path('app/public/' . $lapangan->thumbnail));
        }

        $lapangan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lapangan berhasil dihapus!'
        ]);
    }

    public function edit($id_lap)
    {
        $lapangan = Lapangan::where('id_lap', $id_lap)->firstOrFail();

        return view('admin.dashboard.edit.edit_data_lapangan', compact('lapangan'));
    }

    public function update(Request $request, $id_lap)
    {
        $lapangan = Lapangan::findOrFail($id_lap);

        // VALIDASI
        $request->validate([
            'nama_lapangan' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // CEK APAKAH HARGA BERUBAH
        if ($lapangan->harga != $request->harga) {
            RiwayatHarga::create([
                'lap_id' => $lapangan->id_lap,
                'harga_lama' => $lapangan->harga,
                'harga_baru' => $request->harga,
            ]);
        }

        // UPDATE THUMBNAIL JIKA ADA FILE BARU
        if ($request->hasFile('thumbnail')) {
            // hapus file lama jika ada
            if ($lapangan->thumbnail && file_exists(storage_path('app/public/' . $lapangan->thumbnail))) {
                unlink(storage_path('app/public/' . $lapangan->thumbnail));
            }

            $thumbnailPath = $request->file('thumbnail')->store('lapangan_thumbnail', 'public');
            $lapangan->thumbnail = $thumbnailPath;
        }

        // UPDATE DATA TEKS
        $lapangan->nama_lapangan = $request->nama_lapangan;
        $lapangan->deskripsi = $request->deskripsi;
        $lapangan->harga = $request->harga;
        $lapangan->kategori = $request->kategori;

        $lapangan->save();

        // UPDATE GALLERY (TAMBAHKAN FOTO BARU SAJA)
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('lapangan_gallery', 'public');

                GaleryLapangan::create([
                    'id_lap' => $lapangan->id_lap,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('lapangan.index')
            ->with('success', 'Data venue berhasil diupdate!');
    }
}
