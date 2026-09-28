@extends('layouts.app')

@section('title', $temaAktif['judul'])

@section('content')
    <section class="hero">
        <h1><i class="bi bi-robot"></i> Ide Platform Agentic AI</h1>
        <p>
            Proyeksi ide akhir semester: platform berbasis <em>agentic AI</em> yang
            diharapkan menjadi teman belajar generasi baru mahasiswa ITS.
        </p>
    </section>

    @if (empty($temaTerpilih))
        <div class="alert alert-warn">
            <i class="bi bi-lightbulb"></i> Tema tidak dipilih - sistem otomatis memakai fallback
            <strong>'General Assistant Agent'</strong>.
        </div>
    @endif

    <div class="card">
        <span class="badge">Tema Aktif</span>
        <h2 style="margin-top:8px;">{{ $temaAktif['judul'] }}</h2>
        <p><strong>{{ $temaAktif['ringkas'] }}</strong></p>
        <p class="small muted" style="margin-top:8px;">{{ $temaAktif['deskripsi'] }}</p>
    </div>

    <h2>Eksplorasi Tema Lain</h2>
    <div class="grid grid-2">
        @foreach ($semuaTema as $tema)
            <article class="card">
                <span class="badge">/agent/{{ $tema['slug'] }}</span>
                <h3>{{ $tema['judul'] }}</h3>
                <p class="small muted">{{ $tema['ringkas'] }}</p>
                <p style="margin-top:10px;">
                    <a class="btn btn-outline" href="{{ route('agent.show', ['tema' => $tema['slug']]) }}">
                        Lihat Tema
                    </a>
                </p>
            </article>
        @endforeach
    </div>
@endsection