<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Tampilkan semua katalog jasa (data dari admin).
     */
    public function index()
    {
        // Ambil semua jasa yang dibuat admin, tampilkan terbaru dulu
        $services = Service::latest()->paginate(9);

        return view('user.services.index', compact('services'));
    }

    /**
     * Tampilkan detail dari satu katalog jasa.
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('user.services.show', compact('service'));
    }
}
