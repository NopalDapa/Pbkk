@extends('layouts.app')

@section('title', 'Mahasiswa Tidak Ditemukan')

@section('content')
    <div class="card" style="text-align:center;padding:48px 24px;">
        <h2 style="font-size:1.6rem;"><i class="bi bi-person-exclamation"></i> Mahasiswa Tidak Ditemukan</h2>
        <p class="muted" style="margin:12px 0 20px;">
            NRP <strong>{{ $nrp }}</strong> berformat valid (10 digit), tetapi belum terdaftar
            dalam data profil akademis ini.
        </p>
        <a class="btn" href="{{ route('dashboard.mahasiswa') }}">Lihat Daftar Mahasiswa</a>
    </div>
@endsection