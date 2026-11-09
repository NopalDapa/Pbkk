<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:mahasiswa.lihat');
    }

    public function index(Request $request): View
    {
        $request->validate(['q' => ['nullable', 'string', 'max:100']]);
        $keyword = trim($request->input('q') ?? '');
        $mahasiswa = Mahasiswa::query()
            ->when($keyword !== '', function ($query) use ($keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%")
                        ->orWhere('nrp', 'like', "%{$keyword}%")
                        ->orWhere('prodi', 'like', "%{$keyword}%");
                });
            })
            ->orderBy('nama')->orderBy('id')
            ->paginate(10)->withQueryString();

        return view('mahasiswa.index', compact('mahasiswa', 'keyword'));
    }

    public function create(): View
    {
        $this->authorize('create-mahasiswa');

        return view('mahasiswa.form', ['mahasiswa' => new Mahasiswa()]);
    }

    public function store(MahasiswaRequest $request): RedirectResponse
    {
        Mahasiswa::create($request->validated());

        return to_route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa): View
    {
        $this->authorize('update-mahasiswa');

        return view('mahasiswa.form', compact('mahasiswa'));
    }

    public function update(MahasiswaRequest $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->update($request->validated());

        return to_route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $this->authorize('delete-mahasiswa');
        $mahasiswa->delete();

        return to_route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
