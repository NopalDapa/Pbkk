@extends('layouts.portal')

@section('title', 'Ide Agent — '.$mahasiswa->nama)

@section('detail')
    <div class="card">
        <div class="card-header"><h2 class="card-title">{{ $mahasiswa->ide_judul ?: 'Ide Agent' }}</h2></div>
        <div class="card-body">
            <h3 class="h5">Rancangan Platform</h3>
            <p style="white-space: pre-line">{{ $mahasiswa->ide_deskripsi ?: 'Deskripsi ide agent belum diisi.' }}</p>
            <h3 class="h5">Cara Kerja Agent</h3>
            <p class="mb-0" style="white-space: pre-line">{{ $mahasiswa->ide_alur ?: 'Cara kerja agent belum diisi.' }}</p>
        </div>
    </div>
@stop
