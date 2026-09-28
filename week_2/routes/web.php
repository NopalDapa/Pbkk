<?php

use App\Data\ProfilAkademik;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aplikasi profile akademik statis berbasis local routing sandbox.
| Seluruh rute memakai named route (->name()) dan tidak ada URL
| hardcoded di dalam respon - semua navigasi memakai helper route().
|
*/

/*
|---------------------------------------------------------------------
| RUTE 1 - Halaman Home (/)
| Sambutan hangat khas ITS beserta profil singkat mahasiswa.
|---------------------------------------------------------------------
*/
Route::get('/', function () {
    $mahasiswa = ProfilAkademik::mahasiswa();

    return view('pages.home', [
        'daftarMahasiswa' => $mahasiswa,
    ]);
})->name('home');

/*
|---------------------------------------------------------------------
| RUTE 2 - Detail Profil (/mahasiswa/{nrp})
| Parameter wajib NRP 10 digit (diamankan dengan regex where()).
|---------------------------------------------------------------------
*/
Route::get('/mahasiswa/{nrp}', function (string $nrp) {
    $profil = ProfilAkademik::cariMahasiswa($nrp);

    // Format NRP valid tetapi data tidak ditemukan -> tampilkan halaman "tidak ditemukan".
    if ($profil === null) {
        return response()->view('pages.mahasiswa.not-found', [
            'nrp' => $nrp,
        ], 404);
    }

    return view('pages.mahasiswa.show', [
        'profil' => $profil,
    ]);
})
    ->where('nrp', '[0-9]{10}') // CHALLENGE 1: hanya NRP angka bulat 10 digit.
    ->name('mahasiswa.show');

/*
|---------------------------------------------------------------------
| RUTE 3 - Ide Platform Agentic AI (/agent/{tema?})
| Parameter opsional; bila kosong memakai fallback 'General Assistant Agent'.
|---------------------------------------------------------------------
*/
Route::get('/agent/{tema?}', function (?string $tema = null) {
    $temaAktif = ProfilAkademik::cariTema($tema);

    return view('pages.agent.show', [
        'temaAktif' => $temaAktif,
        'semuaTema' => ProfilAkademik::tema(),
        'temaTerpilih' => $tema,
    ]);
})->name('agent.show');

/*
|---------------------------------------------------------------------
| CHALLENGE 2 - Kalkulator Portofolio Akademis (/hitung-ipk/{ip1}/{ip2})
| Menjumlahkan dan mencari rata-rata IP mahasiswa pada dua semester.
| Closure dipakai ulang oleh dua rute agar logika tidak terduplikasi.
|---------------------------------------------------------------------
*/
$hitungIpk = function (string $ip1, string $ip2) {
    $ip1 = str_replace(',', '.', $ip1);
    $ip2 = str_replace(',', '.', $ip2);

    $nilai1 = (float) $ip1;
    $nilai2 = (float) $ip2;

    $valid1 = is_numeric($ip1) && $nilai1 >= 0 && $nilai1 <= 4.0;
    $valid2 = is_numeric($ip2) && $nilai2 >= 0 && $nilai2 <= 4.0;

    if (! $valid1 || ! $valid2) {
        return response()->view('pages.dashboard.ipk', [
            'ip1' => $ip1,
            'ip2' => $ip2,
            'total' => null,
            'rataRata' => null,
            'error' => 'Nilai IP harus berupa angka antara 0 sampai 4.',
        ], 422);
    }

    $total = $nilai1 + $nilai2;
    $rataRata = $total / 2;

    return view('pages.dashboard.ipk', [
        'ip1' => $ip1,
        'ip2' => $ip2,
        'total' => $total,
        'rataRata' => $rataRata,
        'error' => null,
    ]);
};

Route::get('/hitung-ipk/{ip1}/{ip2}', $hitungIpk)->name('ipk.hitung');

/*
|---------------------------------------------------------------------
| CHALLENGE 3 - Grouping Rute Profil Akademis di bawah prefix /dashboard
| Seluruh rute di dalam grup diberi prefix nama "dashboard." sehingga
| pemanggilan nama menjadi route('dashboard.mahasiswa.show', ...).
|---------------------------------------------------------------------
*/
Route::prefix('dashboard')->name('dashboard.')->group(function () use ($hitungIpk) {
    // Indeks dashboard: ringkasan seluruh profil akademis.
    Route::get('/', function () {
        return view('pages.dashboard.index', [
            'daftarMahasiswa' => ProfilAkademik::mahasiswa(),
        ]);
    })->name('index');

    // Daftar seluruh mahasiswa.
    Route::get('/mahasiswa', function () {
        return view('pages.dashboard.mahasiswa', [
            'daftarMahasiswa' => ProfilAkademik::mahasiswa(),
        ]);
    })->name('mahasiswa');

    // Detail profil mahasiswa (regex yang sama diterapkan).
    Route::get('/mahasiswa/{nrp}', function (string $nrp) {
        $profil = ProfilAkademik::cariMahasiswa($nrp);

        if ($profil === null) {
            return response()->view('pages.mahasiswa.not-found', [
                'nrp' => $nrp,
            ], 404);
        }

        return view('pages.mahasiswa.show', [
            'profil' => $profil,
        ]);
    })
        ->where('nrp', '[0-9]{10}')
        ->name('mahasiswa.show');

    // Kalkulator IPK juga tersedia di dalam grup dashboard.
    Route::get('/hitung-ipk/{ip1}/{ip2}', $hitungIpk)->name('ipk.hitung');
});

/*
|---------------------------------------------------------------------
| CHALLENGE 3 - Fallback Route
| Menangkap seluruh permintaan yang tidak cocok dengan rute di atas
| lalu menampilkan halaman 404 yang rapi.
|---------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
