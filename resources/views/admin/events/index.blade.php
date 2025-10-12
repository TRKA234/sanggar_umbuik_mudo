@extends('admin.layouts.app')

@section('title', 'Agenda Kegiatan')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Agenda Kegiatan</h3>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
        </div>

        {{-- Notifikasi sukses --}}
        {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}

        <div class="row">
            @forelse($events as $event)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top"
                                style="height:200px;object-fit:cover">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="mb-1 text-muted"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                            <p class="mb-2 text-muted"><strong>Lokasi:</strong> {{ $event->location }}</p>

                            <div class="mt-auto">
                                <a href="{{ route('admin.events.show', $event) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Hapus kegiatan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada kegiatan.</p>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $events->links() }}
        </div>
    </div>
@endsection
