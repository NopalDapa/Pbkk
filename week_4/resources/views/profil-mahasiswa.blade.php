@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
    <h1 class="mb-4">Profil Mahasiswa</h1>

    <div class="row g-4">
        <div class="col-md-6">
            <x-info-card title="Data Diri">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama:</strong> Naufal Daffa Alfa Zain</li>
                    <li class="list-group-item"><strong>NRP:</strong> 5025241066</li>
                    <li class="list-group-item"><strong>Program Studi:</strong> S1 Teknik Informatika</li>
                    <li class="list-group-item"><strong>Angkatan:</strong> 2024</li>
                    <li class="list-group-item"><strong>Email:</strong> 5025241066@student.its.ac.id</li>
                </ul>
            </x-info-card>
        </div>
        <div class="col-md-6">
            <x-info-card title="Keahlian & Minat">
                <span class="badge bg-primary me-1 mb-1">PHP</span>
                <span class="badge bg-primary me-1 mb-1">Laravel</span>
                <span class="badge bg-primary me-1 mb-1">JavaScript</span>
                <span class="badge bg-secondary me-1 mb-1">Cyber Security</span>
                <span class="badge bg-secondary me-1 mb-1">Deployment</span>
                <span class="badge bg-secondary me-1 mb-1">Agentic AI</span>
                <hr>
                <p class="card-text mb-0">Tertarik pada cyber security dan deployment, sedang mengeksplorasi pemrograman web terutama di sisi backend.</p>
            </x-info-card>
        </div>
        <div class="col-12">
            <x-info-card title="Ringkasan Pendidikan">
                <p class="card-text">Mahasiswa S1 Teknik Informatika ITS angkatan 2024 dengan fokus pada cyber security, deployment, dan pengembangan backend. Aktif mengikuti mata kuliah Pemrograman Berbasis Kerangka Kerja (PBKK).</p>
            </x-info-card>
        </div>
    </div>
@endsection
