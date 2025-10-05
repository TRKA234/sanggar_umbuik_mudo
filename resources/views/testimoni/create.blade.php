@extends('layouts.app')

@section('title', 'Beri Testimoni')

@section('content')
<section class="container mx-auto px-6 py-20">
  <h2 class="text-3xl font-bold text-center mb-10">Beri Testimoni Anda</h2>

  <div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
    <form action="{{ route('testimoni.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block mb-1 font-medium">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}"
               class="w-full p-3 rounded border @error('nama') border-red-500 @enderror">
        @error('nama')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="block mb-1 font-medium">Pesan</label>
        <textarea name="pesan" rows="4"
                  class="w-full p-3 rounded border @error('pesan') border-red-500 @enderror">{{ old('pesan') }}</textarea>
        @error('pesan')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg">
        Kirim Testimoni
      </button>
    </form>
  </div>
</section>
@endsection
