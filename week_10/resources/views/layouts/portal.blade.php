@extends('adminlte::page')

@section('content_header')
    <h1>{{ $mahasiswa->nama }}</h1>
    <p class="text-muted">{{ $mahasiswa->nrp }} · {{ $mahasiswa->prodi }} · Angkatan {{ $mahasiswa->angkatan }}</p>
@stop

@section('content')
    <nav class="mb-3 d-flex flex-wrap" aria-label="Halaman mahasiswa">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mr-2 mb-2">Kembali ke daftar</a>
        @foreach (['tentang' => 'Tentang', 'profil' => 'Profil', 'ide-agent' => 'Ide Agent'] as $page => $label)
            <a href="{{ route('mahasiswa.'.$page, $mahasiswa) }}"
               class="btn {{ request()->routeIs('mahasiswa.'.$page) ? 'btn-primary' : 'btn-outline-primary' }} mr-2 mb-2"
               @if (request()->routeIs('mahasiswa.'.$page)) aria-current="page" @endif>{{ $label }}</a>
        @endforeach
        @can('update-mahasiswa')
            <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning mr-2 mb-2">Edit Mahasiswa</a>
        @endcan
    </nav>
    @yield('detail')
@stop
