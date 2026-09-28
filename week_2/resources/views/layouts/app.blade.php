<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profile Akademik ITS') - PBKK ITS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --biru-its: #003c8f;
            --biru-terang: #0b5bd3;
            --teal: #0e7c86;
            --abu-terang: #f1f5f9;
            --teks: #1e293b;
            --teks-muda: #64748b;
            --garis: #e2e8f0;
            --putih: #ffffff;
            --merah: #b91c1c;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, Arial, sans-serif;
            background: var(--abu-terang);
            color: var(--teks);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header { background: var(--biru-its); color: var(--putih); }

        .navbar {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .brand { font-size: 1.15rem; font-weight: 700; padding: 14px 0; }

        .nav-menu { display: flex; gap: 4px; flex-wrap: wrap; }

        .nav-menu a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: background 0.15s ease;
        }

        .nav-menu a:hover { background: rgba(255, 255, 255, 0.15); color: var(--putih); }

        .nav-menu a.active { background: rgba(255, 255, 255, 0.22); color: var(--putih); }

        main {
            flex: 1;
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            padding: 32px 20px;
        }

        footer {
            background: #0a2a63;
            color: rgba(255, 255, 255, 0.75);
            text-align: center;
            padding: 16px 20px;
            font-size: 0.85rem;
        }

        .card {
            background: var(--putih);
            border: 1px solid var(--garis);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 18px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
        }

        .hero {
            background: linear-gradient(135deg, var(--biru-its), var(--biru-terang));
            color: var(--putih);
            border-radius: 14px;
            padding: 34px 30px;
            margin-bottom: 22px;
        }

        .hero h1 { font-size: 1.8rem; margin-bottom: 8px; }
        .hero p { color: rgba(255, 255, 255, 0.85); max-width: 640px; }

        h1, h2, h3 { line-height: 1.3; }
        h2 { margin-bottom: 14px; font-size: 1.35rem; }
        h3 { margin: 6px 0 8px; font-size: 1.05rem; }

        .badge {
            display: inline-block;
            background: #e3edff;
            color: var(--biru-its);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 999px;
        }

        .grid { display: grid; gap: 16px; }
        .grid-2 { grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); }

        ul.list-clean { list-style: none; }
        ul.list-clean li { padding: 6px 0; border-bottom: 1px dashed var(--garis); }
        ul.list-clean li:last-child { border-bottom: 0; }

        a.btn {
            display: inline-block;
            background: var(--biru-terang);
            color: var(--putih);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        a.btn:hover { background: var(--biru-its); }
        a.btn-outline {
            background: transparent;
            border: 1px solid var(--biru-terang);
            color: var(--biru-terang);
        }
        a.btn-outline:hover { background: #e3edff; color: var(--biru-its); }

        .table { width: 100%; border-collapse: collapse; margin-top: 6px; }
        .table th, .table td { text-align: left; padding: 9px 12px; border-bottom: 1px solid var(--garis); font-size: 0.92rem; }
        .table th { background: var(--abu-terang); font-weight: 600; }
        .table tr:last-child td { border-bottom: 0; }

        .muted { color: var(--teks-muda); }
        .small { font-size: 0.85rem; }

        .alert {
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 14px;
            font-size: 0.9rem;
        }
        .alert-warn { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .alert-err { background: #fee2e2; color: var(--merah); border: 1px solid #fecaca; }

        .route-table code { background: var(--abu-terang); padding: 2px 6px; border-radius: 4px; font-size: 0.85em; }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="brand"><i class="bi bi-book"></i> Profil Akademik ITS</div>
            <div class="nav-menu">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                <a href="{{ route('dashboard.mahasiswa') }}">Mahasiswa</a>
                <a href="{{ route('agent.show') }}">Agentic AI</a>
                <a href="{{ route('ipk.hitung', ['ip1' => 3.5, 'ip2' => 3.9]) }}">Hitung IPK</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        Departemen Teknik Informatika - FTEIC - Institut Teknologi Sepuluh Nopember · PBKK 2026 · Local Routing Sandbox
    </footer>
</body>
</html>
