<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mahasiswa.lihat');
    }

    public function __invoke(): View
    {
        return view('dashboard', [
            'totalMahasiswa' => Mahasiswa::count(),
            'totalPengguna' => User::count(),
            'totalPeran' => Role::count(),
        ]);
    }
}
