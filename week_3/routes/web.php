<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil-mahasiswa', [PageController::class, 'profilMahasiswa'])->name('profil-mahasiswa');
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');
