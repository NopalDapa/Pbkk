@extends('layouts.app')

@section('title', 'Dashboard Akademik')

@section('content')
    <section class="hero">
        <h1><i class="bi bi-bar-chart-line-fill"></i> Dashboard Akademik</h1>
        <p>
            Seluruh rute profil akademis dikelompokkan di bawah prefix
            <code>/dashboard</code> dan memakai named routes dengan prefix nama
            <code>dashboard.</code> - tanpa URL hardcoded.
        </p>
    </section>

    <div class="grid grid-2">
        <div class="card">
            <h3>Ringkasan Mahasiswa</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>IPK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarMahasiswa as $mhs)
                        <tr>
                            <td>{{ $mhs['nrp'] }}</td>
                            <td>{{ $mhs['nama'] }}</td>
                            <td>{{ number_format($mhs['ipk'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="margin-top:12px;">
                <a class="btn" href="{{ route('dashboard.mahasiswa') }}">Daftar Mahasiswa</a>
            </p>
        </div>

        <div class="card">
            <h3>Kalkulator IPK</h3>
            <p class="small muted">
                Hitung rata-rata IP dua semester melalui
                <code>/hitung-ipk/&#123;ip1&#125;/&#123;ip2&#125;</code>.
            </p>
            <p style="margin-top:12px;">
                <a class="btn" href="{{ route('ipk.hitung', ['ip1' => 3.5, 'ip2' => 3.9]) }}">Contoh: 3.5 + 3.9</a>
            </p>
        </div>
    </div>

    <div class="card">
        <h3>Peta Rute dalam Grup <code>/dashboard</code></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Named Route</th>
                    <th>URL</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><code>dashboard.index</code></td>
                    <td><a href="{{ route('dashboard.index') }}">/dashboard</a></td>
                    <td>Halaman indeks dashboard</td>
                </tr>
                <tr>
                    <td><code>dashboard.mahasiswa</code></td>
                    <td><a href="{{ route('dashboard.mahasiswa') }}">/dashboard/mahasiswa</a></td>
                    <td>Daftar seluruh mahasiswa</td>
                </tr>
                <tr>
                    <td><code>dashboard.mahasiswa.show</code></td>
                    <td><code>/dashboard/mahasiswa/&#123;nrp&#125;</code></td>
                    <td>Detail profil (regex 10 digit)</td>
                </tr>
                <tr>
                    <td><code>dashboard.ipk.hitung</code></td>
                    <td><code>/dashboard/hitung-ipk/&#123;ip1&#125;/&#123;ip2&#125;</code></td>
                    <td>Kalkulator IPK di dalam grup</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection