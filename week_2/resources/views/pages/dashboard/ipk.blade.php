@extends('layouts.app')

@section('title', 'Kalkulator IPK')

@section('content')
    <div class="hero">
        <h1><i class="bi bi-calculator"></i> Kalkulator IPK</h1>
        <p>
            Menjumlahkan IP dua semester lalu menghitung rata-ratanya secara otomatis
            melalui rute <code>/hitung-ipk/&#123;ip1&#125;/&#123;ip2&#125;</code>.
        </p>
    </div>

    @if (! empty($error))
        <div class="alert alert-err">
            <i class="bi bi-exclamation-triangle-fill"></i> {{ $error }}
        </div>
    @endif

    <div class="card">
        <h3>Hasil Perhitungan</h3>
        <table class="table">
            <tbody>
                <tr>
                    <td>IP Semester 1</td>
                    <td><strong>{{ number_format((float) $ip1, 2) }}</strong></td>
                </tr>
                <tr>
                    <td>IP Semester 2</td>
                    <td><strong>{{ number_format((float) $ip2, 2) }}</strong></td>
                </tr>
                @if (! is_null($total))
                    <tr>
                        <td>Total (penjumlahan)</td>
                        <td><strong>{{ number_format($total, 2) }}</strong></td>
                    </tr>
                    <tr>
                        <td>Rata-rata (IPK dua semester)</td>
                        <td>
                            <strong style="font-size:1.2rem;color:var(--biru-terang);">
                                {{ number_format($rataRata, 2) }}
                            </strong>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2" class="muted small">Perhitungan tidak dapat dilakukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <p class="small muted" style="margin-top:12px;">
            <i class="bi bi-lightbulb"></i> Ubah angka pada URL untuk mencoba kombinasi lain, contoh:
            <a href="{{ route('ipk.hitung', ['ip1' => 3.25, 'ip2' => 3.75]) }}">3.25 / 3.75</a>.
        </p>
    </div>
@endsection