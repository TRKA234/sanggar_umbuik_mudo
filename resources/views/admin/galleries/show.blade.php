@extends('admin.layouts.app')

@section('title', 'Detail Galeri')

@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card">
        <div class="card-header">
            <h4>{{ $gallery->title ?? 'Tanpa Judul' }}</h4>
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" class="img-fluid rounded mb-3" alt="{{ $gallery->title }}">
            <p>{{ $gallery->caption ?? 'Tidak ada deskripsi.' }}</p>
            <small class="text-muted">Dibuat: {{ $gallery->created_at->format('d M Y H:i') }}</small>
        </div>
    </div>
</div>
@endsection
