<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        $faker = fake('id_ID');

        $nama = $faker->name();
        $prodi = $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer']);
        $minat = $faker->randomElement(['Pengembangan web dan basis data', 'Keamanan informasi dan jaringan', 'Kecerdasan buatan dan analisis data']);
        $ide = $faker->randomElement([
            ['Agent Asisten Belajar', 'Asisten yang membantu mahasiswa menyusun jadwal belajar sesuai materi kuliah.', 'Mahasiswa memasukkan daftar materi dan tenggat. Agent menyusun prioritas dan jadwal belajar harian.'],
            ['Agent Pencatat Keuangan', 'Asisten pencatat pemasukan dan pengeluaran mahasiswa melalui bahasa sehari-hari.', 'Mahasiswa mengetik transaksi. Agent mengenali nominal dan kategori, lalu menyajikan ringkasan keuangan.'],
            ['Agent Rekomendasi Mata Kuliah', 'Asisten pemilihan mata kuliah berdasarkan minat dan riwayat studi.', 'Mahasiswa memberikan minat dan mata kuliah yang telah lulus. Agent memeriksa prasyarat dan menyarankan pilihan.'],
            ['Agent Pencarian Referensi', 'Asisten yang membantu menemukan referensi untuk tugas dan penelitian.', 'Mahasiswa memasukkan topik penelitian. Agent mencari referensi relevan dan merangkum pokok bahasannya.'],
        ]);

        return [
            'angkatan' => $faker->numberBetween((int) date('Y') - 3, (int) date('Y')),
            'nrp' => fn (array $attributes) => $faker->unique()->numerify('5025'.substr((string) $attributes['angkatan'], -2).'####'),
            'nama' => $nama,
            'prodi' => $prodi,
            'email' => fn (array $attributes) => $attributes['nrp'].'@student.its.ac.id',
            'tentang' => $nama.' adalah mahasiswa '.$prodi.' yang berminat pada '.strtolower($minat).'. Sedang mengembangkan keterampilan pemrograman melalui proyek portal akademik.',
            'minat' => $minat,
            'ide_judul' => $ide[0],
            'ide_deskripsi' => $ide[1],
            'ide_alur' => $ide[2],
        ];
    }
}
