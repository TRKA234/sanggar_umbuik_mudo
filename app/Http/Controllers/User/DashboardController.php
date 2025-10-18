<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data milik user
        $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        $payments = Payment::whereHas('order', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->latest()->take(5)->get();
        $testimonials = Testimonial::latest()->take(3)->get();

        // Ambil katalog jasa yang bisa dipesan
        $services = Service::latest()->take(6)->get();

        return view('user.dashboard.index', compact(
            'user',
            'orders',
            'payments',
            'testimonials',
            'services'
        ));
    }
}
