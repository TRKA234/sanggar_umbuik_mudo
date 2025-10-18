<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial;

class TestimoniController extends Controller
{
    public function create()
    {
        // If user not logged in, redirect to register page
        if (!Auth::check()) {
            return redirect()->route('register.form')->with('info', 'Silakan daftar atau login terlebih dahulu untuk memberi testimoni.');
        }

        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kota' => 'nullable|string|max:100',
            'rating' => 'nullable|integer|min:1|max:5',
            'pesan' => 'required|string|max:1000',
        ]);

        // ensure authenticated before storing
        if (!Auth::check()) {
            return redirect()->route('register.form')->with('info', 'Silakan daftar atau login terlebih dahulu untuk memberi testimoni.');
        }

        $user = Auth::user();

        $payload = [
            'customer_name' => $user->name ?? $request->input('nama'),
            'customer_city' => $request->input('kota'),
            'message' => $request->input('pesan'),
            'rating' => $request->input('rating'),
            'is_public' => false,
        ];

        try {
            DB::beginTransaction();

            Testimonial::create($payload);

            DB::commit();

            return redirect()->route('landing')->with('success', 'Terima kasih atas testimoni Anda!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to store testimonial: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan testimoni. Silakan coba lagi atau hubungi admin.');
        }
    }
}
