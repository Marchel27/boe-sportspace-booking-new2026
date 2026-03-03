<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan; // pastikan model Lapangan ada

class HomeController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::with('galeri')->get();
        return view('home', compact('lapangan')); // kirim ke view
    }
}
