@extends('admin.layouts.app')

@section('title', 'Detail Kegiatan')

@section('content')
    <div class="container">
        <h3>{{ $event->title }}</h3>

        @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid mb-3"
                style="max-height:320px;object-fit:cover">
        @endif

        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
        <p><strong>Lokasi:</strong> {{ $event->location }}</p>

        <div class="mb-3">
            {!! nl2br(e($event->description)) !!}
        </div>

        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-secondary">Edit</a>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline-primary">Kembali</a>
    </div>
@endsection
