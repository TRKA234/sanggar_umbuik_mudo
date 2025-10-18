@extends('admin.layouts.app')

@section('title', 'Testimoni')

@section('content')
<div class="container px-6 py-8">
  <h1 class="text-2xl font-bold mb-4">Daftar Testimoni</h1>

  @if(session('success'))
    <div class="mb-4 text-green-700">{{ session('success') }}</div>
  @endif

  <div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Nama</th>
          <th class="px-4 py-2">Kota</th>
          <th class="px-4 py-2">Rating</th>
          <th class="px-4 py-2">Pesan</th>
          <th class="px-4 py-2">Public</th>
          <th class="px-4 py-2">Tanggal</th>
          <th class="px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($testimonials as $t)
          <tr class="border-t">
            <td class="px-4 py-2">{{ $t->id }}</td>
            <td class="px-4 py-2">{{ $t->customer_name }}</td>
            <td class="px-4 py-2">{{ $t->customer_city }}</td>
            <td class="px-4 py-2">{{ $t->rating ?? '-' }}</td>
            <td class="px-4 py-2">{{ Str::limit($t->message, 80) }}</td>
            <td class="px-4 py-2">{{ $t->is_public ? 'Yes' : 'No' }}</td>
            <td class="px-4 py-2">{{ $t->created_at->format('Y-m-d') }}</td>
            <td class="px-4 py-2">
              <a href="{{ route('admin.testimonials.show', $t->id) }}" class="text-blue-600">Lihat</a>
              <form action="{{ route('admin.testimonials.update', $t->id) }}" method="POST" style="display:inline">
                @csrf
                @method('PATCH')
                <input type="hidden" name="is_public" value="{{ $t->is_public ? 0 : 1 }}">
                <button type="submit" class="text-green-600 ml-2">{{ $t->is_public ? 'Sembunyikan' : 'Tampilkan' }}</button>
              </form>
              <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Hapus testimoni?')">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $testimonials->links() }}
  </div>
</div>
@endsection
