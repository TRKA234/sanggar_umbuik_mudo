<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Testimoni;

class LandingController extends Controller
{
    public function index()
    {
        $services = [
            ['title' => 'Tari Tradisional', 'desc' => 'Pelatihan tari Minang untuk semua umur.'],
            ['title' => 'Musik Tradisional', 'desc' => 'Belajar alat musik tradisional khas Minangkabau.'],
            ['title' => 'Acara & Pertunjukan', 'desc' => 'Jasa pertunjukan seni untuk acara resmi dan adat.'],
        ];

        // Ambil data galeri dari database
        $galleries = Gallery::latest()->take(8)->get();

        // Ambil testimoni dari database
        $testimonis = Testimoni::latest()->get();

        return view('landing', compact('services', 'galleries', 'testimonis'));
    }
}
