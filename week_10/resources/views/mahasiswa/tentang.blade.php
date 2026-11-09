@extends('layouts.portal')

@section('title', 'Tentang — '.$mahasiswa->nama)

@section('detail')
    <div class="card">
        <div class="card-header"><h2 class="card-title">Tentang {{ $mahasiswa->nama }}</h2></div>
        <div class="card-body" style="white-space: pre-line">{{ $mahasiswa->tentang ?: 'Deskripsi mahasiswa belum diisi.' }}</div>
    </div>
@stop
