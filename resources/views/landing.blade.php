@extends('layouts.app')

@section('title', 'Sanggar Umbuik Mudo')

@section('content')
<!-- Hero -->
<section class="relative bg-white min-h-[90vh] flex items-center">
  <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

    <!-- Kiri: Teks -->
    <div>
      <h1 class="text-4xl md:text-6xl font-extrabold text-black drop-shadow-lg">
        Sanggar Umbuik Mudo
      </h1>
      <p class="mt-4 text-lg md:text-xl max-w-lg text-gray-700">
        Melestarikan seni dan budaya Minangkabau melalui tari, musik, dan pertunjukan.
      </p>
      <div class="mt-6 flex gap-4">
        <a href="#layanan" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold text-white">
            Lihat Layanan
        </a>
        <a href="#kontak" class="px-6 py-3 border border-black text-black rounded-lg font-semibold hover:bg-black hover:text-white">
            Hubungi Kami
        </a>
        <a href="{{ auth()->check() ? route('pesan.form') : route('register.form') }}"
            class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 rounded-lg font-semibold text-white">
            Pesan Sekarang
        </a>
        </div>
    </div>

    <!-- Kanan: Gambar -->
    <div class="flex justify-center">
      <img src="{{ asset('images/logo.png') }}" alt="Hero Sanggar" class="w-full max-w-xs rounded-lg shadow-lg">
  </div>
</section>


 <!-- Tentang Kami -->
<section id="tentang" class="relative py-20 text-white">
  <!-- Background image -->
  <div class="absolute inset-0 bg-[url('{{ asset('images/img1.jpg') }}')] bg-cover bg-center"></div>
  <!-- Overlay transparan (pakai alpha color) -->
  <div class="absolute inset-0 bg-white/80"></div>

  <div class="relative container mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold mb-6 text-yellow-400">Tentang Kami</h2>
    <p class="max-w-3xl mx-auto text-lg leading-relaxed text-black">
    Sanggar Umbuik Mudo adalah wadah untuk mempelajari, melestarikan, dan mengembangkan seni budaya Minangkabau.
    Kami menyediakan pelatihan tari, musik tradisional, serta pertunjukan untuk berbagai acara.
    </p>

  </div>
</section>

  <!-- Layanan -->
  <section id="layanan" class="bg-yellow-50 py-20">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-bold mb-10 text-red-700">Layanan Kami</h2>
      <div class="grid md:grid-cols-3 gap-8">
        @foreach($services as $s)
          <div class="p-6 bg-white shadow rounded-lg">
            <h3 class="text-xl font-semibold text-black">{{ $s['title'] }}</h3>
            <p class="mt-3 text-gray-600">{{ $s['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

<!-- Galeri -->
<section id="galeri" class="container mx-auto px-6 py-20">
  <h2 class="text-3xl font-bold text-center mb-10">Galeri</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    @forelse($galleries as $g)
    <img src="{{ asset('storage/' . $g->image_path) }}"
        alt="{{ $g->title }}"
        class="w-full h-48 object-cover rounded-lg shadow">
    @empty
    <p class="col-span-4 text-center text-gray-500">Belum ada galeri.</p>
    @endforelse
  </div>
</section>

  <!-- Testimoni -->
  <section id="testimoni" class="bg-yellow-50 py-20">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-10 text-red-700">Apa Kata Pengunjung?</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        @forelse($testimonis as $t)
          <div class="bg-white p-6 rounded-lg shadow">
            <p class="text-gray-700 italic">"{{ $t->pesan }}"</p>
            <p class="mt-4 font-semibold text-yellow-600">- {{ $t->nama }}</p>
          </div>
        @empty
          <p class="col-span-3 text-center text-gray-500">Belum ada testimoni.</p>
        @endforelse
      </div>
      <div class="text-center">
        <a href="{{ route('testimoni.create') }}"
           class="px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
          Beri Testimoni
        </a>
      </div>
    </div>
  </section>

  <!-- Kontak -->
  <section id="kontak" class="bg-black text-white py-20">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12">
      <div>
        <h2 class="text-3xl font-bold mb-4 text-yellow-400">Kontak Kami</h2>
        <p>Alamat: Jl. Contoh No. 123, Padang</p>
        <p>Telepon: 0812-3456-7890</p>
        <p>Email: info@sanggarumbuikmudo.com</p>
      </div>
      <form class="space-y-4">
        <input type="text" placeholder="Nama" class="w-full p-3 rounded text-gray-800">
        <input type="email" placeholder="Email" class="w-full p-3 rounded text-gray-800">
        <textarea placeholder="Pesan" class="w-full p-3 rounded text-gray-800"></textarea>
        <button type="submit" class="px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-600">
          Kirim
        </button>
      </form>
    </div>
  </section>
@endsection
