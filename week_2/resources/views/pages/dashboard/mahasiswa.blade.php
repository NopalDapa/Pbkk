@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <div class="hero">
        <h1><i class="bi bi-person-vcard"></i> Daftar Mahasiswa</h1>
        <p>Seluruh profil akademis yang tersedia, dipetakan dari data statis <code>App\Data\ProfilAkademik</code>.</p>
    </div>

    <div class="grid grid-2">
        @forelse ($daftarMahasiswa as $mhs)
            <article class="card">
                <div class="small">
                    <span class="badge">NRP {{ $mhs['nrp'] }}</span>
                    <span class="badge">Angkatan {{ $mhs['angkatan'] }}</span>
                </div>
                <h3>{{ $mhs['nama'] }}</h3>
                <p class="muted small">{{ $mhs['prodi'] }} · IPK {{ number_format($mhs['ipk'], 2) }}</p>
                <p style="margin-top:12px;">
                    <a class="btn" href="{{ route('dashboard.mahasiswa.show', ['nrp' => $mhs['nrp']]) }}">Detail Profil</a>
                </p>
            </article>
        @empty
            <p class="muted">Belum ada data mahasiswa.</p>
        @endforelse
    </div>

    <p style="margin-top:4px;">
        <a class="btn btn-outline" href="{{ route('dashboard.index') }}"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </p>
@endsection