@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $service->title }}</h3>

        @if($service->image)
            <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid mb-3"
                style="max-height:320px;object-fit:cover">
        @endif

        <p><strong>Harga:</strong> Rp {{ number_format($service->price, 0, ',', '.') }}</p>
        <p><strong>Durasi:</strong> {{ $service->duration_minutes }} menit</p>

        <div class="mb-3">
            {!! nl2br(e($service->description)) !!}
        </div>

        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary">Edit</a>
        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-primary">Kembali</a>
    </div>
@endsection