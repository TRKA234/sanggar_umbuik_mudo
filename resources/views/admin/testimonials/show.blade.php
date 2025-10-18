@extends('admin.layouts.app')

@section('title', 'Detail Testimoni')

@section('content')
<div class="container px-6 py-8">
  <h1 class="text-2xl font-bold mb-4">Detail Testimoni</h1>

  <div class="bg-white p-6 rounded shadow">
    <p><strong>Nama:</strong> {{ $testimonial->customer_name }}</p>
    <p><strong>Kota:</strong> {{ $testimonial->customer_city }}</p>
    <p><strong>Rating:</strong> {{ $testimonial->rating ?? '-' }}</p>
    <p class="mt-4"><strong>Pesan:</strong></p>
    <div class="mt-2 p-4 bg-gray-50 rounded">{{ $testimonial->message }}</div>
    <p class="mt-4 text-sm text-gray-500">Dibuat: {{ $testimonial->created_at }}</p>
  </div>

  <div class="mt-4">
    <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 bg-gray-200 rounded">Kembali</a>
  </div>
</div>
@endsection
