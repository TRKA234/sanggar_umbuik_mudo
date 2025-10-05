<!doctype html>
<html lang="id">
<head>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Sanggar Umbuik Mudo')</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="font-sans text-gray-800 bg-white">
  @include('partials.navbar')

  <main class="min-h-screen">
    @yield('content')
  </main>

  @include('partials.footer')
</body>
</html>
