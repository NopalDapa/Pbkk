@extends('adminlte::page')

@section('title', 'Data Mahasiswa')

@section('content_header')
    <h1>Data Mahasiswa</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    @can('create-mahasiswa')
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    @endcan
    <div class="card">
        <div class="card-header">
            <form action="{{ route('mahasiswa.index') }}" method="GET" class="form-inline">
                <label for="q" class="mr-2">Cari mahasiswa</label>
                <input id="q" type="search" name="q" value="{{ $keyword }}" maxlength="100"
                       class="form-control mr-2" placeholder="Nama, NRP, atau prodi">
                <button class="btn btn-primary" type="submit">Cari</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-link">Reset</a>
            </form>
            @error('q') <p class="text-danger mt-2">{{ $message }}</p> @enderror
        </div>
        <div class="card-body table-responsive">
            <p class="text-muted">{{ $mahasiswa->total() }} data ditemukan.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NRP</th><th>Nama</th><th>Program studi</th><th>Angkatan</th><th>Halaman mahasiswa</th>
                        @canany(['update-mahasiswa', 'delete-mahasiswa']) <th>Aksi</th> @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item->nrp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td class="text-nowrap">
                                <a class="btn btn-outline-info btn-sm" href="{{ route('mahasiswa.tentang', $item) }}">Tentang</a>
                                <a class="btn btn-outline-info btn-sm" href="{{ route('mahasiswa.profil', $item) }}">Profil</a>
                                <a class="btn btn-outline-info btn-sm" href="{{ route('mahasiswa.ide-agent', $item) }}">Ide Agent</a>
                            </td>
                            @canany(['update-mahasiswa', 'delete-mahasiswa'])
                                <td>
                                    @can('update-mahasiswa')
                                        <a href="{{ route('mahasiswa.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @endcan
                                    @can('delete-mahasiswa')
                                        <form class="d-inline" method="POST" action="{{ route('mahasiswa.destroy', $item) }}"
                                              onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Hapus Data</button>
                                        </form>
                                    @endcan
                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr><td colspan="{{ auth()->user()->canAny(['update-mahasiswa', 'delete-mahasiswa']) ? 6 : 5 }}" class="text-center">Data mahasiswa tidak ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">{{ $mahasiswa->links() }}</div>
        </div>
    </div>
@stop
