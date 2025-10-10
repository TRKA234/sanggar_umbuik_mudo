@extends('admin.layouts.app')

@section('title', 'Galeri - Sanggar Umbuik Mudo')
@section('page-title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Galeri</h4>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">Tambah Galeri</a>
    </div>

    @if($galleries->isEmpty())
        <div class="alert alert-light text-center py-5">
            <p class="text-muted mb-0">Belum ada galeri.</p>
        </div>
    @else
        <div class="row">
            @foreach($galleries as $gallery)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}"
                    class="card-img-top"
                    alt="{{ $gallery->title }}"
                    style="height: 180px; object-fit: cover;">

                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $gallery->title }}</h6>
                            <small class="text-muted">{{ Str::limit($gallery->description, 50) }}</small>
                        </div>
                        <div class="card-footer bg-white text-end">
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form action="{{ route('admin.galleries.destroy', $gallery->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Hapus galeri ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
