@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <h1>Selamat datang, Sobat ITS! <i class="bi bi-emoji-smile"></i></h1>
        <p>
            Salam hangat khas Institut Teknologi Sepuluh Nopember. Selamat menjelajah
            ruang belajar di Surabaya - tempat lahirnya insinyur yang tangguh dan berintegritas.
            Aplikasi ini adalah profil akademis pribadi yang dibangun murni di atas
            <strong>local routing sandbox Laravel</strong>.
        </p>
    </section>

    <h2>Profil Singkat Mahasiswa</h2>
    <div class="grid grid-2">
        @forelse ($daftarMahasiswa as $mhs)
            <article class="card">
                <div class="small">
                    <span class="badge">NRP {{ $mhs['nrp'] }}</span>
                </div>
                <h3>{{ $mhs['nama'] }}</h3>
                <p class="muted small">
                    {{ $mhs['prodi'] }} · Angkatan {{ $mhs['angkatan'] }} · IPK {{ number_format($mhs['ipk'], 2) }}
                </p>
                <p class="small">{{ $mhs['moto'] }}</p>
                <p style="margin-top:12px;">
                    <a class="btn" href="{{ route('mahasiswa.show', ['nrp' => $mhs['nrp']]) }}">Lihat Profil Lengkap</a>
                </p>
            </article>
        @empty
            <p class="muted">Belum ada data mahasiswa.</p>
        @endforelse
    </div>

    <div class="grid grid-2" style="margin-top:8px;">
        <div class="card">
            <h3><i class="bi bi-bullseye"></i> Ide Platform Agentic AI</h3>
            <p class="small muted">
                Proyeksi ide akhir semester tentang platform berbasis agen AI.
                Buka halaman ide untuk melihat tema fallback dan variasinya.
            </p>
            <p style="margin-top:12px;">
                <a class="btn btn-outline" href="{{ route('agent.show') }}">Lihat Ide Agentic AI</a>
            </p>
        </div>
        <div class="card">
            <h3><i class="bi bi-bar-chart-line-fill"></i> Dashboard Akademis</h3>
            <p class="small muted">
                Kumpulan rute profil akademis yang dikelompokkan di bawah prefix
                <code>/dashboard</code> - termasuk kalkulator IPK dua semester.
            </p>
            <p style="margin-top:12px;">
                <a class="btn btn-outline" href="{{ route('dashboard.index') }}">Buka Dashboard</a>
            </p>
        </div>
    </div>
@endsection
