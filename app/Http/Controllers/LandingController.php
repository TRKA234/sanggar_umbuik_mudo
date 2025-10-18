<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function index()
    {
        // ✅ Data layanan statis
        $services = [
            ['title' => 'Tari Tradisional', 'desc' => 'Pelatihan tari Minang untuk semua umur.'],
            ['title' => 'Musik Tradisional', 'desc' => 'Belajar alat musik tradisional khas Minangkabau.'],
            ['title' => 'Acara & Pertunjukan', 'desc' => 'Jasa pertunjukan seni untuk acara resmi dan adat.'],
        ];

        // ✅ Ambil data galeri terbaru, max 8 item
        $galleries = Gallery::latest()->take(8)->get();

        // ✅ Ambil hanya testimoni yang ditampilkan publik
        $testimonis = Testimonial::where('is_public', true)
            ->latest()
            ->get(['customer_name', 'message', 'rating']) // ambil hanya kolom yang dibutuhkan
            ->map(function ($t) {
                return (object) [
                    'nama'   => $t->customer_name ?: 'Pengunjung',
                    'pesan'  => $t->message,
                    'rating' => $t->rating ?? null,
                ];
            });

        // ✅ Logging ringan (tidak terlalu verbose)
        Log::info('Testimoni publik diambil', [
            'jumlah' => $testimonis->count(),
        ]);

        // ✅ Kirim semua data ke view
        return view('landing', compact('services', 'galleries', 'testimonis'));
    }
}
