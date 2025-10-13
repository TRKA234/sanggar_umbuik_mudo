<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Admin Sanggar Umbuik Mudo')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/tinymce.min.js" referrerpolicy="origin"
        crossorigin="anonymous"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #fff;
            border-right: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link {
            color: #333;
            border-radius: 0.375rem;
            padding: 10px 15px;
            font-weight: 500;
        }

        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }

        /* Sidebar collapse (mobile) */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                z-index: 1050;
                left: -260px;
                top: 0;
                height: 100%;
                background: #fff;
                box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                left: 0;
            }

            .content-wrapper {
                padding: 1rem;
            }
        }

        /* Topbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem 1.25rem;
        }

        .content-wrapper {
            padding: 1.5rem;
        }

        .nav-profile img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
        }

        .menu-toggle {
            background: transparent;
            border: none;
            font-size: 1.4rem;
        }

        .menu-toggle:focus {
            outline: none;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="d-flex flex-nowrap">

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="sidebar p-3">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-4 text-decoration-none">
                <img src="{{ asset('logo1.png') }}" alt="logo" class="me-10" style="width:50px;">
                <span class="fw-bold fs-5 text-dark">Sanggar Umbuik Mudo</span>
            </a>

            <ul class="nav flex-column">
                <li><a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>

                <li><a href="{{ route('admin.services.index') }}"
                        class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">Katalog Jasa</a>
                </li>

                <li><a href="{{ route('admin.orders.index') }}"
                        class="nav-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">Pemesanan</a></li>

                <li><a href="{{ route('admin.payments.index') }}"
                        class="nav-link {{ request()->routeIs('admin.payments*') ? 'active' : '' }}">Pembayaran</a></li>

                <li><a href="{{ route('admin.news.index') }}"
                        class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}">Berita</a></li>

                <li><a href="{{ route('admin.events.index') }}"
                        class="nav-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}">Agenda</a></li>

        <li><a href="{{ route('admin.reports.index') }}"
            class="nav-link {{ request()->routeIs('admin.reports*') ? 'active' : '' }}">Laporan</a></li>

                <li><a href="{{ route('admin.certificates.index') }}"
                        class="nav-link {{ request()->routeIs('admin.certificates*') ? 'active' : '' }}">Sertifikat</a>
                </li>

                <li><a href="{{ route('admin.galleries.index') }}"
                        class="nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}">Galeri</a></li>

                <li><a href="{{ route('admin.testimonials.index') }}"
                        class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">Testimoni</a>
                </li>

                <li><a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">Pengguna</a></li>
            </ul>

            <hr>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger w-100" type="submit">Logout</button>
            </form>
        </nav>

        <!-- Main content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <nav class="topbar d-flex justify-content-between align-items-center">
                <button class="menu-toggle d-lg-none" onclick="toggleSidebar()">☰</button>
                <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>

                <!-- Settings Dropdown -->
                <!-- Settings Dropdown dengan Foto Profil -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="d-flex align-items-center px-3 py-2 border border-transparent rounded bg-white text-secondary hover-text-dark"
                                style="gap: 8px;">
                                <img src="{{ Auth::user()->profile_photo_url ?? asset('default-avatar.png') }}"
                                    alt="avatar" class="rounded-circle" width="32" height="32"
                                    style="object-fit: cover;">
                                <span class="fw-medium">{{ Auth::user()->name }}</span>
                                <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-3 py-2 border-bottom">
                                <div class="fw-semibold">{{ Auth::user()->name }}</div>
                                <small class="text-muted">{{ Auth::user()->email }}</small>
                            </div>

                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="bi bi-person me-2"></i> {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bi bi-box-arrow-right me-2 text-danger"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>


            </nav>

            <!-- Content -->
            <main class="content-wrapper">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebarMenu').classList.toggle('show');
        }
    </script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/tinymce.min.js" referrerpolicy="origin"
        crossorigin="anonymous"></script>

    @stack('scripts')
</body>

</html>
