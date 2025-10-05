<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function create()
    {
        // sementara kosongin dulu, nanti diisi form pesanan
        return view('pesanan.create');
    }
}
