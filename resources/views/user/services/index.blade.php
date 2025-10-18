@extends('user.layout.app')

@section('title', 'Katalog Jasa')

@section('content')
    <div class="container">
        <h3 class="mb-4">Katalog Jasa</h3>

        <div class="row">
            @forelse($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}"
                                 class="card-img-top"
                                 alt="{{ $service->title }}"
                                 style="height:200px;object-fit:cover;">
                        @else
                            <img src="{{ asset('images/no-image.jpg') }}"
                                 class="card-img-top"
                                 alt="No Image"
                                 style="height:200px;object-fit:cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="text-muted mb-2">Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                            <p class="text-truncate text-secondary mb-3" style="max-height: 40px;">
                                {{ Str::limit($service->description, 80) }}
                            </p>

                            <div class="mt-auto">
                                <a href="{{ route('user.services.show', $service->id) }}"
                                   class="btn btn-outline-primary w-100">
                                   Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted">
                    <p>Belum ada layanan yang tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $services->links() }}
        </div>
    </div>
@endsection
