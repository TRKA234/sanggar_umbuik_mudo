@extends('user.layout.app')

@section('title', $service->title)

@section('content')
    <div class="container">
        <div class="mb-4">
            <h3>{{ $service->title }}</h3>
        </div>

        @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}"
                 alt="{{ $service->title }}"
                 class="img-fluid rounded mb-3"
                 style="max-height:320px;object-fit:cover;">
        @endif

        <p><strong>Harga:</strong> Rp {{ number_format($service->price, 0, ',', '.') }}</p>
        <p><strong>Durasi:</strong> {{ $service->duration_minutes }} menit</p>

        <div class="mb-3">
            <strong>Deskripsi:</strong><br>
            {!! nl2br(e($service->description)) !!}
        </div>

        <a href="{{ route('user.services.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <a href="{{ route('user.pesanan.create', $service->id) }}" class="btn btn-primary">
            Pesan Sekarang
        </a>
    </div>
@endsection
