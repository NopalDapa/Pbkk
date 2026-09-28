@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')

@section('content')
    <div class="card" style="text-align:center;padding:56px 24px;">
        <h2 style="font-size:2rem;">404</h2>
        <h3>Halaman Tidak Ditemukan</h3>
        <p class="muted" style="margin:12px 0 22px;">
            Halaman yang Anda cari tidak terdaftar pada routing sandbox ini.
            Gunakan tombol di bawah untuk kembali ke tempat yang aman.
        </p>
        <a class="btn" href="{{ route('home') }}"><i class="bi bi-house-door"></i> Kembali ke Beranda</a>
        <a class="btn btn-outline" href="{{ route('dashboard.index') }}"><i class="bi bi-bar-chart-line-fill"></i> Dashboard</a>
    </div>
@endsection