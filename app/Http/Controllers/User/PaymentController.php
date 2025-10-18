<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Halaman daftar pembayaran
    public function index()
    {
        return view('user.payments.index');
    }

    // Form tambah pembayaran baru
    public function create()
    {
        return view('user.payments.create');
    }

    // Simpan pembayaran baru
    public function store(Request $request)
    {
        // sementara kosongin dulu
        return redirect()->route('user.payments.index')->with('success', 'Pembayaran berhasil ditambahkan (dummy).');
    }

    // Tampilkan detail pembayaran
    public function show($id)
    {
        return view('user.payments.show', compact('id'));
    }

    // Form edit pembayaran
    public function edit($id)
    {
        return view('user.payments.edit', compact('id'));
    }

    // Update data pembayaran
    public function update(Request $request, $id)
    {
        // sementara kosongin dulu
        return redirect()->route('user.payments.index')->with('success', 'Pembayaran berhasil diperbarui (dummy).');
    }

    // Hapus pembayaran
    public function destroy($id)
    {
        // sementara kosongin dulu
        return redirect()->route('user.payments.index')->with('success', 'Pembayaran berhasil dihapus (dummy).');
    }
}
