@extends('user.layout.app')

@section('title', 'Dashboard Pengguna - Sanggar Umbuik Mudo')
@section('page-title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row g-3 mb-4">

            <!-- Katalog Jasa -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-primary shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Katalog Jasa</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['services'] ?? 0 }}</h3>
                            <div><span class="badge bg-primary">Tersedia</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pesanan -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-warning shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Pesanan</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['orders'] ?? 0 }}</h3>
                            <div><span class="badge bg-warning text-dark">Aktif</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembayaran -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-success shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Pembayaran</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['payments'] ?? 0 }}</h3>
                            <div><span class="badge bg-success">Selesai</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni -->
            <div class="col-sm-6 col-xl-3">
                <div class="card border-info shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title">Testimoni</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['testimonials'] ?? 0 }}</h3>
                            <div><span class="badge bg-info text-dark">Publik</span></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bagian Konten Utama -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Pesanan Terbaru -->
                <div class="card mb-3">
                    <div class="card-header">Pesanan Terbaru</div>
                    <div class="card-body">
                        @if(isset($latestOrders) && count($latestOrders) > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($latestOrders as $order)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $order->service_name }}
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mb-0">Belum ada pesanan yang dibuat.</p>
                        @endif
                    </div>
                </div>

                <!-- Testimoni Publik -->
                <div class="card">
                    <div class="card-header">Testimoni Terbaru</div>
                    <div class="card-body">
                        @if(isset($latestTestimonials) && count($latestTestimonials) > 0)
                            <ul class="list-group list-group-flush">
                                @foreach($latestTestimonials as $t)
                                    <li class="list-group-item">
                                        <strong>{{ $t->customer_name ?? 'Anonim' }}</strong><br>
                                        <small class="text-muted">{{ $t->message }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mb-0">Belum ada testimoni yang ditampilkan.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Kolom Samping -->
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">Notifikasi</div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Belum ada notifikasi baru.</p>
                        <small class="text-muted">Kamu akan mendapat pemberitahuan jika pesanan dikonfirmasi atau pembayaran diterima.</small>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Aksi Cepat</div>
                    <div class="card-body">
                        <a href="{{ route('user.services.index') }}" class="btn btn-primary w-100 mb-2">Lihat Katalog Jasa</a>
                        <a href="{{ route('user.pesanan.create') }}" class="btn btn-outline-primary w-100 mb-2">Lihat Pesanan</a>
                        <a href="{{ route('user.payments.index') }}" class="btn btn-outline-success w-100 mb-2">Riwayat Pembayaran</a>
                        <a href="{{ route('user.testimoni.create') }}" class="btn btn-outline-info w-100">Tulis Testimoni</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
