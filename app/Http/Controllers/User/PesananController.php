<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesananController extends Controller
{
    public function create()
    {
        // sementara kosongin dulu, nanti diisi form pesanan
        return view('pesanan.create');
    }
}
