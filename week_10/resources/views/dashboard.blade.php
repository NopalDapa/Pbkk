@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard Akademik</h1>
@stop

@section('content')
    <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>.
        Peran: {{ auth()->user()->getRoleNames()->join(', ') }}.</p>
    <div class="row">
        <div class="col-md-4">
            <x-adminlte-small-box title="{{ $totalMahasiswa }}" text="Mahasiswa" icon="fas fa-user-graduate" theme="info" />
        </div>
        <div class="col-md-4">
            <x-adminlte-small-box title="{{ $totalPengguna }}" text="Pengguna" icon="fas fa-users" theme="success" />
        </div>
        <div class="col-md-4">
            <x-adminlte-small-box title="{{ $totalPeran }}" text="Peran" icon="fas fa-user-shield" theme="warning" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2 class="h5">Portal Akademik</h2>
            <p>Admin dapat menambah, melihat, mengedit, dan menghapus data. Staf dapat melihat dan mencari data mahasiswa.</p>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Lihat data mahasiswa</a>
        </div>
    </div>
@stop
