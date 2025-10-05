<nav class="bg-white shadow">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <a href="{{ route('landing') }}" class="text-xl font-bold text-black">Sanggar Umbuik Mudo</a>

    <div class="flex space-x-6">
      <a href="#tentang" class="hover:text-yellow-500">Tentang</a>
      <a href="#layanan" class="hover:text-yellow-500">Layanan</a>
      <a href="#galeri" class="hover:text-yellow-500">Galeri</a>
      <a href="#testimoni" class="hover:text-yellow-500">Testimoni</a>
      <a href="#kontak" class="hover:text-yellow-500">Kontak</a>
    </div>

    <div class="flex space-x-4">
      @guest
        <a href="{{ route('login') }}" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-600">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Register</a>
      @else
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800">Logout</button>
        </form>
      @endguest
    </div>
  </div>
</nav>
