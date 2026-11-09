<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\DemoLoginController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'permission:mahasiswa.lihat'])->group(function () {
    Route::redirect('/', '/dashboard')->name('beranda');
    foreach (['tentang', 'profil-mahasiswa', 'ide-agent'] as $page) {
        Route::redirect('/'.$page, '/mahasiswa');
    }
    Route::get('/mahasiswa/{mahasiswa}/tentang', [PageController::class, 'tentang'])->name('mahasiswa.tentang');
    Route::get('/mahasiswa/{mahasiswa}/profil', [PageController::class, 'profil'])->name('mahasiswa.profil');
    Route::get('/mahasiswa/{mahasiswa}/ide-agent', [PageController::class, 'ideAgent'])->name('mahasiswa.ide-agent');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('mahasiswa', MahasiswaController::class)
        ->except('show')->parameters(['mahasiswa' => 'mahasiswa']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/demo-login/{role}', DemoLoginController::class)
    ->middleware(['guest', 'throttle:6,1'])->name('demo.login');

require __DIR__.'/auth.php';
