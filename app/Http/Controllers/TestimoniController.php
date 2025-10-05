<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    public function create()
    {
        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'pesan' => 'required|string|max:500',
        ]);

        Testimoni::create($request->only(['nama', 'pesan']));

        return redirect()->route('landing')->with('success', 'Terima kasih atas testimoni Anda!');
    }
}
