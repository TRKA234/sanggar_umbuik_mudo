@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Jasa</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3 row">
                <div class="col-md-6">
                    <label class="form-label">Harga</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', 0) }}"
                        required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Durasi (menit)</label>
                    <input type="number" name="duration_minutes" class="form-control" value="{{ old('duration_minutes') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-check mb-3">
                {{-- Tambahkan ini --}}
                <input type="hidden" name="is_active" value="0">

                {{-- Checkbox utama --}}
                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Aktif</label>
            </div>


            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection