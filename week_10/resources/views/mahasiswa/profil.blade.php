@extends('layouts.portal')

@section('title', 'Profil — '.$mahasiswa->nama)

@section('detail')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h2 class="card-title">Data Diri</h2></div>
                <div class="card-body">
                    <dl>
                        <dt>Nama</dt><dd>{{ $mahasiswa->nama }}</dd>
                        <dt>NRP</dt><dd>{{ $mahasiswa->nrp }}</dd>
                        <dt>Program studi</dt><dd>{{ $mahasiswa->prodi }}</dd>
                        <dt>Angkatan</dt><dd>{{ $mahasiswa->angkatan }}</dd>
                        <dt>Email</dt><dd>{{ $mahasiswa->email ?: 'Belum diisi' }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h2 class="card-title">Keahlian dan Minat</h2></div>
                <div class="card-body" style="white-space: pre-line">{{ $mahasiswa->minat ?: 'Keahlian dan minat belum diisi.' }}</div>
            </div>
        </div>
    </div>
@stop
