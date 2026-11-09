<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nrp', 'nama', 'prodi', 'angkatan', 'email', 'tentang', 'minat',
        'ide_judul', 'ide_deskripsi', 'ide_alur',
    ];
}
