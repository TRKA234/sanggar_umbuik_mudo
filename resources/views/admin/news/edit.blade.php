@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Edit Berita</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $news->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <textarea id="content" name="content" class="form-control"
                    rows="10">{{ old('content', $news->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar (opsional)</label>
                @if($news->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita" style="max-width:200px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                    {{ $news->is_published ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Tampilkan / Publikasi</label>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: 'textarea#content',
    height: 400,
    menubar: false,
    plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
    toolbar: 'undo redo | blocks | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code | help',
    images_upload_url: '{{ route('admin.news.upload') }}',
    automatic_uploads: true,
    relative_urls: false,
    convert_urls: false,
    file_picker_types: 'image',
    branding: false,
    images_upload_handler: function (blobInfo, success, failure) {
        var formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        fetch('{{ route('admin.news.upload') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(json => success(json.location))
        .catch(err => failure('Upload gagal: ' + err.message));
    }
});
</script>
@endsection
