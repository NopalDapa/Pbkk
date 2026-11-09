<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\View\View;

class PageController extends Controller
{
    public function tentang(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.tentang', compact('mahasiswa'));
    }

    public function profil(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.profil', compact('mahasiswa'));
    }

    public function ideAgent(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.ide-agent', compact('mahasiswa'));
    }
}
