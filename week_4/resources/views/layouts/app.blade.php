<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Profil Akademik' }} | Profil Akademik ITS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

    {{-- Navbar statis --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-inline-flex align-items-center gap-2" href="{{ route('beranda') }}">
                    <img src="{{ asset('assets/img/graduation-cap.svg') }}" alt="Logo" width="28" height="28">
                    Profil Akademik
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profil-mahasiswa') ? 'active' : '' }}" href="{{ route('profil-mahasiswa') }}">Profil Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('ide-agent') ? 'active' : '' }}" href="{{ route('ide-agent') }}">Ide Riset</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Container konten utama --}}
    <main class="container my-4 flex-grow-1">
        @yield('content')
    </main>

    {{-- Footer ITS --}}
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} Institut Teknologi Sepuluh Nopember | PBKK</small>
        </div>
    </footer>

</body>
</html>
