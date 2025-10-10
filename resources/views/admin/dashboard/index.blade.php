@extends('admin.layouts.app')

@section('title', 'Dashboard Admin - Sanggar Umbuik Mudo')
@section('page-title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Katalog Jasa</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['services'] ?? 0 }}</h3>
                            <div><span class="badge bg-primary">View</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Pemesanan</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['orders'] ?? 0 }}</h3>
                            <div><span class="badge bg-warning">New</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Pembayaran</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['payments'] ?? 0 }}</h3>
                            <div><span class="badge bg-success">Done</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Pengguna</h6>
                        <div class="d-flex align-items-center">
                            <h3 class="me-auto">{{ $stats['users'] ?? 0 }}</h3>
                            <div><span class="badge bg-secondary">Total</span></div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Galeri</h6>
                    <div class="d-flex align-items-center">
                        <h3 class="me-auto">{{ $stats['galleries'] ?? 0 }}</h3>
                        <div><span class="badge bg-info">Total</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>

        <!-- Placeholder sections -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-3">
                    <div class="card-header">Ringkasan Pesanan Terbaru</div>
                    <div class="card-body">
                        <p class="text-muted">Belum ada data — ketika modul pemesanan aktif, daftar pesanan terbaru akan
                            muncul di sini.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Berita & Pengumuman</div>
                    <div class="card-body">
                        <p class="text-muted">Konten berita singkat ditampilkan di sini.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">Notifikasi</div>
                    <div class="card-body">
                        <p class="text-muted">Notifikasi email / pesan akan muncul di sini.</p>
                        <small class="text-muted">Catatan: Karena tidak menggunakan WhatsApp API, ada tombol untuk membuka
                            WhatsApp manual (wa.me) saat perlu menghubungi pemesan.</small>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Tindakan Cepat</div>
                    <div class="card-body">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary w-100 mb-2">Tambah Katalog
                            Jasa</a>
                        <a href="{{ route('admin.orders.create') }}" class="btn btn-outline-primary w-100 mb-2">Tambah
                            Pemesanan
                            Manual</a>
                        <a href="{{ route('admin.news.create') }}" class="btn btn-outline-secondary w-100">Tulis Berita</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
