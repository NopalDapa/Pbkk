@extends('layouts.app')

@section('title', 'Profil ' . $profil['nama'])

@section('content')
    <div class="card">
        <span class="badge">NRP {{ $profil['nrp'] }}</span>
        <h2 style="margin-top:8px;">{{ $profil['nama'] }}</h2>
        <p class="muted">
            {{ $profil['prodi'] }} · {{ $profil['departemen'] }}<br>
            Angkatan {{ $profil['angkatan'] }} · Semester {{ $profil['semester'] }}
        </p>
        <blockquote style="margin-top:12px;border-left:4px solid var(--biru-terang);padding-left:12px;color:var(--teks-muda);">
            "{{ $profil['moto'] }}"
        </blockquote>
    </div>

    <div class="grid grid-2">
        <div class="card">
            <h3>Detail Pribadi</h3>
            <ul class="list-clean">
                <li><i class="bi bi-envelope"></i> Email : {{ $profil['email'] }}</li>
                <li><i class="bi bi-geo-alt"></i> Asal : {{ $profil['asal'] }}</li>
                <li><i class="bi bi-mortarboard-fill"></i> IPK kumulatif : {{ number_format($profil['ipk'], 2) }}</li>
                <li>
                    <i class="bi bi-palette"></i> Hobi :
                    @foreach ($profil['hobi'] as $hobi)
                        <span class="badge">{{ $hobi }}</span>
                    @endforeach
                </li>
            </ul>
        </div>

        <div class="card">
            <h3>Riwayat Studi</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>IP</th>
                        <th>SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profil['riwayat'] as $nilai)
                        <tr>
                            <td>{{ $nilai['semester'] }}</td>
                            <td>{{ number_format($nilai['ip'], 2) }}</td>
                            <td>{{ $nilai['sks'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <h3>Kontak</h3>
        <ul class="list-clean">
            @foreach ($profil['kontak'] as $label => $link)
                <li>
                    <strong>{{ ucfirst($label) }}</strong> :
                    @if (str_starts_with($link, 'http'))
                        <a href="{{ $link }}" target="_blank" rel="noopener">{{ $link }}</a>
                    @else
                        {{ $link }}
                    @endif
                </li>
            @endforeach
        </ul>
        <p style="margin-top:14px;">
            <a class="btn btn-outline" href="{{ route('dashboard.mahasiswa') }}">← Kembali ke Daftar Mahasiswa</a>
        </p>
    </div>
@endsection