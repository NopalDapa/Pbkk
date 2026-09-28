@extends('layouts.app')

@section('title', 'Ide Riset Agentic AI')

@section('content')
    {{-- Tantangan 1: Toggle tema dinamis via variabel Blade PHP (?mode=dark) --}}
    @php
        $isDark = ($mode ?? 'light') === 'dark';
        $bgPage    = $isDark ? 'bg-dark text-white' : 'bg-light text-dark';
        $bgCard    = $isDark ? 'bg-secondary bg-opacity-25 text-white border-light' : 'bg-white text-dark';
    @endphp

    <div class="{{ $bgPage }} p-4 rounded-3 transition-all">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
            <h1 class="mb-0">Ide Riset: Platform Agentic AI</h1>
            <a class="btn btn-sm {{ $isDark ? 'btn-light' : 'btn-dark' }} d-inline-flex align-items-center gap-2"
               href="{{ request()->fullUrlWithQuery(['mode' => $isDark ? 'light' : 'dark']) }}">
                <img src="{{ asset($isDark ? 'assets/img/sun.svg' : 'assets/img/moon.svg') }}" alt="Toggle mode" width="20" height="20">
                Ganti ke mode {{ $isDark ? 'terang' : 'gelap' }}
            </a>
        </div>

        <x-status-banner type="{{ $isDark ? 'dark' : 'primary' }">
            Mode saat ini: <strong>{{ $isDark ? 'Dark' : 'Light' }}</strong>,
            ubah lewat parameter URL <code>?mode=dark</code> / <code>?mode=light</code>
        </x-status-banner>

        <div class="row g-4">
            <div class="col-md-6">
                <x-info-card title="Rancangan Platform">
                    <p class="card-text">Agent pelacak keuangan pribadi yang terhubung ke database lokal. Pengguna cukup mengetikkan uang masuk/keluar dalam bahasa sehari-hari, tanpa berinteraksi langsung dengan database dan tanpa perlu memahami syntax query.</p>
                </x-info-card>
            </div>
            <div class="col-md-6">
                <x-info-card title="Cara Kerja Agent">
                    <ul class="card-text mb-0">
                        <li>Pengguna mengetik: <em>"tambah pengeluaran kopi 10k"</em></li>
                        <li>Agent menerjemahkan bahasa natural menjadi query SQL</li>
                        <li>Query langsung dieksekusi ke database lokal</li>
                        <li>Agent membalas konfirmasi hasil pencatatan</li>
                    </ul>
                </x-info-card>
            </div>
        </div>

        {{-- Formulir pengumpulan ide --}}
        <div class="card {{ $bgCard }} shadow-sm mt-4">
            <div class="card-header fw-semibold">Formulir Pengumpulan Ide Riset</div>
            <div class="card-body">
                <form method="GET" action="{{ route('ide-agent') }}">
                    @php $inputClass = $isDark ? 'bg-dark text-white border-secondary' : ''; @endphp
                    <input type="hidden" name="mode" value="{{ $mode }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control {{ $inputClass }}" id="nama" name="user" placeholder="Nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Ide Riset</label>
                        <input type="text" class="form-control {{ $inputClass }}" id="judul" name="judul" placeholder="Judul ide riset Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                        <textarea class="form-control {{ $inputClass }}" id="deskripsi" name="deskripsi" rows="3" placeholder="Jelaskan ide riset Anda secara singkat" required></textarea>
                    </div>
                    <button type="submit" class="btn {{ $isDark ? 'btn-light' : 'btn-primary' }}">Kirim Ide</button>
                </form>

                {{-- Tampilkan hasil ide yang dikirim --}}
                @if(request()->filled('judul'))
                    <x-status-banner type="success">
                        <strong>Terima kasih, {{ request()->query('user', 'Sahabat') }}!</strong>
                        Ide riset "{{ request()->query('judul') }}" sudah kami terima. {{ request()->query('deskripsi') }}
                    </x-status-banner>
                @endif
            </div>
        </div>
    </div>
@endsection
