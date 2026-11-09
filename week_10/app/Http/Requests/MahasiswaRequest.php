<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can($this->isMethod('POST') ? 'create-mahasiswa' : 'update-mahasiswa');
    }

    public function rules(): array
    {
        return [
            'nrp' => ['required', 'digits:10', Rule::unique('mahasiswa', 'nrp')->ignore($this->route('mahasiswa'))],
            'email' => ['nullable', 'email', 'max:255'],
            'tentang' => ['nullable', 'string', 'max:5000'],
            'minat' => ['nullable', 'string', 'max:1000'],
            'ide_judul' => ['nullable', 'string', 'max:255'],
            'ide_deskripsi' => ['nullable', 'string', 'max:5000'],
            'ide_alur' => ['nullable', 'string', 'max:5000'],
            'nama' => ['required', 'string', 'max:255'],
            'prodi' => ['required', 'string', 'max:100'],
            'angkatan' => ['required', 'integer', 'between:1900,'.(date('Y') + 1)],
        ];
    }
}
