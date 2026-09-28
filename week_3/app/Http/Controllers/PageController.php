<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function beranda(): View
    {
        return view('beranda', [
            'title' => 'Beranda',
            'user' => request()->query('user'),
        ]);
    }

    public function profilMahasiswa(): View
    {
        return view('profil-mahasiswa', [
            'title' => 'Profil Mahasiswa',
        ]);
    }

    public function ideAgent(): View
    {
        return view('ide-agent', [
            'title' => 'Ide Riset Agentic AI',
            'mode' => request()->query('mode', 'light'),
        ]);
    }
}
