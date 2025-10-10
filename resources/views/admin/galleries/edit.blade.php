@extends('admin.layouts.app')

@section('title', 'Edit Gambar Galeri')

@section('content')
<div class="container mt-4">
    <h3>Edit Gambar</h3>

    <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $gallery->title }}">
        </div>

        <div class="mb-3">
            <label>Caption</label>
            <textarea name="caption" class="form-control">{{ $gallery->caption }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Sekarang</label><br>
            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="200" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
