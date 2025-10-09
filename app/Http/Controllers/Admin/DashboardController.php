<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Models\Service;
use App\Models\Order;
use App\Models\Payment;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Jika tabel belum dibuat, set 0
        $stats = [
            'services' => Schema::hasTable('services') ? Service::count() : 0,
            'orders' => Schema::hasTable('orders') ? Order::count() : 0,
            'payments' => Schema::hasTable('payments') ? Payment::count() : 0,
            'news' => Schema::hasTable('news') ? News::count() : 0,
            'events' => Schema::hasTable('events') ? Event::count() : 0,
            'galleries' => Schema::hasTable('galleries') ? Gallery::count() : 0,
            'testimonials' => Schema::hasTable('testimonials') ? Testimonial::count() : 0,
            'users' => Schema::hasTable('users') ? User::count() : 0,
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
