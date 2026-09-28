@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1 class="mb-4 d-inline-flex align-items-center gap-2">Selamat Datang
        <img src="{{ asset('assets/img/waving-hand.svg') }}" alt="Waving hand" width="36" height="36">
    </h1>

    {{-- Tantangan 2: Alert status interaktif dengan parameter nama user dari URL --}}
    @if($user)
        <x-status-banner type="success">
            Selamat datang, <strong>{{ $user }}</strong>! Senang kamu berkunjung ke portal profil akademik ini.
        </x-status-banner>
    @else
        <x-status-banner type="info">
            Selamat datang di portal profil akademik. Tambahkan <code>?user=NamaAndi</code> pada URL untuk sapaan personal.
        </x-status-banner>
    @endif

    <div class="row">
        <div class="col-md-4">
            <x-info-card title="Siapa Saya?">
                <p class="card-text">Naufal Daffa Alfa Zain, mahasiswa Teknik Informatika ITS yang tertarik pada cyber security dan deployment, sedang mengeksplorasi pemrograman web khususnya backend.</p>
            </x-info-card>
        </div>
        <div class="col-md-4">
            <x-info-card title="Tujuan Portal">
                <p class="card-text">Menampung profil diri, visualisasi rancangan platform Agentic AI, dan formulir pengumpulan ide riset.</p>
            </x-info-card>
        </div>
        <div class="col-md-4">
            <x-info-card title="Teknologi">
                <ul class="mb-0">
                    <li>Laravel Blade</li>
                    <li>Bootstrap 5 (Vite + NPM)</li>
                    <li>Layout terpusat</li>
                </ul>
            </x-info-card>
        </div>
    </div>
@endsection
