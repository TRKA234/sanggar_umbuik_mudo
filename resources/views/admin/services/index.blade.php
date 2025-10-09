@extends('admin.layouts.app')

@section('title', 'Katalog Jasa')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Katalog Jasa</h3>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Tambah Jasa</a>
        </div>

        {{-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif --}}

        <div class="row">
            @forelse($services as $service)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top"
                                style="height:200px;object-fit:cover">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="mb-2 text-muted">Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('admin.services.show', $service) }}"
                                    class="btn btn-sm btn-outline-primary">Lihat</a>
                                <a href="{{ route('admin.services.edit', $service) }}"
                                    class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Hapus layanan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada layanan.</p>
            @endforelse
        </div>

        <div class="mt-3">
            {{ $services->links() }}
        </div>
    </div>
@endsection