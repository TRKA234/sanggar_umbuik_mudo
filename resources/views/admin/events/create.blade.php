@extends('admin.layouts.app')

@section('title', 'Tambah Agenda Kegiatan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Tambah Agenda Kegiatan</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul Kegiatan</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="8">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_at" class="form-label">Tanggal & Waktu Mulai</label>
                <input type="datetime-local" name="start_at" id="start_at" class="form-control"
                    value="{{ old('start_at') }}">
            </div>

            <div class="mb-3">
                <label for="end_at" class="form-label">Tanggal & Waktu Selesai</label>
                <input type="datetime-local" name="end_at" id="end_at" class="form-control"
                    value="{{ old('end_at') }}">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lokasi</label>
                <input type="text" name="location" id="location" class="form-control"
                    value="{{ old('location') }}">
            </div>

            <div class="mb-3">
                <label for="fee" class="form-label">Biaya (Rp)</label>
                <input type="number" step="0.01" name="fee" id="fee" class="form-control"
                    value="{{ old('fee', 0) }}">
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Gambar Cover (opsional)</label>
                <input type="file" name="cover" id="cover" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/bbqy21ht0cx4f973h03dvvpbcipet4snwm61vshoj0bsrejs/tinymce/8/tinymce.min.js"
    referrerpolicy="origin" crossorigin="anonymous"></script>

<script>
    tinymce.init({
        selector: 'textarea#description',
        height: 300,
        menubar: false,
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code | help',
        branding: false
    });
</script>
@endpush
