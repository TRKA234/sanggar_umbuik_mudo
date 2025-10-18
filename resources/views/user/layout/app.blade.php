<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Dashboard Pengguna - Sanggar Umbuik Mudo')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #ffffff;
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

        /* Topbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem 1.25rem;
        }

        .content-wrapper {
            padding: 1.5rem;
        }

        /* Mobile */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                z-index: 1050;
                left: -250px;
                top: 0;
                height: 100%;
                box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            }

            .sidebar.show {
                left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="d-flex flex-nowrap">

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="sidebar p-3">
            <a href="{{ route('user.dashboard') }}" class="d-flex align-items-center mb-4 text-decoration-none">
                <img src="{{ asset('/images/logo.png') }}" alt="logo" class="me-2" style="width:45px;">
                <span class="fw-bold fs-6 text-dark">Sanggar Umbuik Mudo</span>
            </a>

            <ul class="nav flex-column">
                <li>
                    <a href="{{ route('user.dashboard') }}"
                        class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house me-2"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.services.index') }}"
                        class="nav-link {{ request()->routeIs('user.services*') ? 'active' : '' }}">
                        <i class="bi bi-list-ul me-2"></i> Katalog Jasa
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.pesanan.index') }}"
                        class="nav-link {{ request()->routeIs('user.orders*') ? 'active' : '' }}">
                        <i class="bi bi-bag-check me-2"></i> Pesanan
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.payments.index') }}"
                        class="nav-link {{ request()->routeIs('user.payments*') ? 'active' : '' }}">
                        <i class="bi bi-credit-card me-2"></i> Pembayaran
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.testimoni.index') }}"
                        class="nav-link {{ request()->routeIs('user.testimoni*') ? 'active' : '' }}">
                        <i class="bi bi-chat-quote me-2"></i> Testimoni
                    </a>
                </li>
            </ul>

            <hr>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger w-100" type="submit">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </nav>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Topbar -->
            <nav class="topbar d-flex justify-content-between align-items-center">
                <button class="btn btn-link d-lg-none text-dark fs-4" onclick="toggleSidebar()">☰</button>
                <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>

                <!-- Profil Dropdown -->
                <div class="dropdown">
                    <button class="d-flex align-items-center border-0 bg-white px-2 py-1 rounded"
                        id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="gap: 8px; cursor: pointer;">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('/images/avatar.png') }}" alt="avatar"
                            class="rounded-circle" width="36" height="36" style="object-fit: cover;">
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                        <i class="bi bi-caret-down-fill ms-1"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li class="px-3 py-2 border-bottom">
                            <div class="fw-semibold">{{ Auth::user()->name }}</div>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </li>

                        {{-- <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i> Profile
                            </a>
                        </li> --}}

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
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

    @stack('scripts')
</body>

</html>
