@extends('adminlte::page')

@section('title', $mahasiswa->exists ? 'Edit Mahasiswa' : 'Tambah Mahasiswa')

@section('content_header')
    <h1>{{ $mahasiswa->exists ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ $mahasiswa->exists ? route('mahasiswa.update', $mahasiswa) : route('mahasiswa.store') }}">
                @csrf
                @if ($mahasiswa->exists)
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input id="nrp" name="nrp" type="text" inputmode="numeric" pattern="[0-9]{10}" maxlength="10"
                           class="form-control @error('nrp') is-invalid @enderror" value="{{ old('nrp', $mahasiswa->nrp) }}" required>
                    <small class="form-text text-muted">10 digit angka, tidak boleh sama dengan mahasiswa lain.</small>
                    @error('nrp') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" name="nama" type="text" maxlength="255" class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $mahasiswa->nama) }}" required>
                    @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="prodi">Program studi</label>
                    <input id="prodi" name="prodi" type="text" maxlength="100" class="form-control @error('prodi') is-invalid @enderror"
                           value="{{ old('prodi', $mahasiswa->prodi) }}" required>
                    @error('prodi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input id="angkatan" name="angkatan" type="number" min="1900" max="{{ date('Y') + 1 }}"
                           class="form-control @error('angkatan') is-invalid @enderror"
                           value="{{ old('angkatan', $mahasiswa->angkatan ?? date('Y')) }}" required>
                    @error('angkatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <hr>
                <h2 class="h5">Profil dan ide mahasiswa</h2>
                <p class="text-muted">Opsional. Isi ini ditampilkan pada halaman masing-masing mahasiswa.</p>
                @foreach (['email' => 'Email', 'minat' => 'Keahlian dan minat', 'ide_judul' => 'Judul ide agent'] as $field => $label)
                    <div class="form-group">
                        <label for="{{ $field }}">{{ $label }}</label>
                        <input id="{{ $field }}" name="{{ $field }}" type="{{ $field === 'email' ? 'email' : 'text' }}"
                               maxlength="{{ $field === 'minat' ? 1000 : 255 }}"
                               class="form-control @error($field) is-invalid @enderror" value="{{ old($field, $mahasiswa->$field) }}">
                        @error($field) <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                @endforeach
                @foreach (['tentang' => 'Tentang mahasiswa', 'ide_deskripsi' => 'Deskripsi ide agent', 'ide_alur' => 'Cara kerja agent'] as $field => $label)
                    <div class="form-group">
                        <label for="{{ $field }}">{{ $label }}</label>
                        <textarea id="{{ $field }}" name="{{ $field }}" rows="3" maxlength="5000"
                                  class="form-control @error($field) is-invalid @enderror">{{ old($field, $mahasiswa->$field) }}</textarea>
                        @error($field) <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop
