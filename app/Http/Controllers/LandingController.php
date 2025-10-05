<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
{
    $services = [
        ['title' => 'Tari Tradisional', 'desc' => 'Pelatihan tari Minang untuk semua umur.'],
        ['title' => 'Musik Tradisional', 'desc' => 'Belajar alat musik tradisional khas Minangkabau.'],
        ['title' => 'Acara & Pertunjukan', 'desc' => 'Jasa pertunjukan seni untuk acara resmi dan adat.'],
    ];

    $gallery = [
        '/images/galeri1.jpg',
        '/images/galeri2.jpg',
        '/images/galeri3.jpg',
        '/images/galeri4.jpg',
    ];

    $testimonis = \App\Models\Testimoni::latest()->get();

    return view('landing', compact('services', 'gallery', 'testimonis'));
}

}
