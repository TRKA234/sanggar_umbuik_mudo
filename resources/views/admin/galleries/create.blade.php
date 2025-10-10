@extends('admin.layouts.app')

@section('title', 'Tambah Gambar Galeri')

@section('content')
<div class="container mt-4">
    <h3>Tambah Gambar</h3>

    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Caption</label>
            <textarea name="caption" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
