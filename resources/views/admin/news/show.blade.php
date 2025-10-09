@extends('admin.layouts.app')

@section('title', 'Detail Berita')

@section('content')
    <div class="container-fluid px-4 py-4">
        <h1 class="mb-4">Detail Berita</h1>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <!-- Judul Berita -->
                <h3 class="card-title mb-3">{{ $news->title }}</h3>

                <!-- Gambar (jika ada) -->
                @if ($news->thumbnail)
                    <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}"
                        class="img-fluid mb-3 rounded" style="max-height: 400px; object-fit: cover;">
                @endif

                <!-- Status Publikasi -->
                <p class="mb-2">
                    <strong>Status:</strong>
                    @if ($news->is_published)
                        <span class="badge bg-success">Publikasi</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </p>

                <!-- Tanggal dibuat & diperbarui -->
                <p class="text-muted mb-4">
                    <strong>Dibuat:</strong> {{ $news->created_at->format('d M Y H:i') }}<br>
                    <strong>Diperbarui:</strong> {{ $news->updated_at->format('d M Y H:i') }}
                </p>

                <!-- Isi Berita -->
                <div class="mb-4">
                    {!! $news->content !!}
                </div>

                <!-- Tombol kembali -->
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
