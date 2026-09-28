<?php

namespace App\Data;

/**
 * Sumber data statis untuk aplikasi profile akademik.
 *
 * Kelas ini menjadi satu-satunya "basis data" sederhana (tanpa database)
 * yang dipakai oleh seluruh closures rute agar kode di routes/web.php
 * tetap bersih dan mudah dibaca (standar PSR-12).
 */
class ProfilAkademik
{
    /**
     * Daftar mahasiswa dengan NRP sebagai kunci.
     *
     * NRP pola ITS standar: 10 digit, contoh: 5025221206.
     *
     * @var array<string, array<string, mixed>>
     */
    private const MAHASISWA = [
        '5025221206' => [
            'nrp' => '5025221206',
            'nama' => 'Muhammad Nopal Al Fajri',
            'email' => '5025221206@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.72,
            'asal' => 'Gresik, Jawa Timur',
            'hobi' => ['Coding', 'Bermain Game', 'Fotografi'],
            'kontak' => [
                'email' => '5025221206@mhs.its.ac.id',
                'github' => 'https://github.com/nopalfajri',
                'linkedin' => 'https://linkedin.com/in/nopal',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.60, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.75, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.80, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.70, 'sks' => 22],
            ],
            'moto' => 'Membangun yang bermanfaat, dekat dengan manusia.',
        ],
        '5025221007' => [
            'nrp' => '5025221007',
            'nama' => 'Salsabila Putri Ramadhani',
            'email' => '5025221007@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.88,
            'asal' => 'Surabaya, Jawa Timur',
            'hobi' => ['Desain UI/UX', 'Menulis', 'Berenang'],
            'kontak' => [
                'email' => '5025221007@mhs.its.ac.id',
                'github' => 'https://github.com/salsabila',
                'linkedin' => 'https://linkedin.com/in/salsabila',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.85, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.90, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.90, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.87, 'sks' => 22],
            ],
            'moto' => 'Detail adalah tempat tinggal ketelitian.',
        ],
        '5025221015' => [
            'nrp' => '5025221015',
            'nama' => 'Ahmad Rizky Pratama',
            'email' => '5025221015@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.65,
            'asal' => 'Sidoarjo, Jawa Timur',
            'hobi' => ['Futsal', 'Coding', 'Bersepeda'],
            'kontak' => [
                'email' => '5025221015@mhs.its.ac.id',
                'github' => 'https://github.com/rizkypratama',
                'linkedin' => 'https://linkedin.com/in/rizkypratama',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.50, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.60, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.70, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.80, 'sks' => 22],
            ],
            'moto' => 'Konsisten jauh lebih berharga daripada sesekali hebat.',
        ],
        '5025221023' => [
            'nrp' => '5025221023',
            'nama' => 'Dewi Lestari',
            'email' => '5025221023@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.55,
            'asal' => 'Malang, Jawa Timur',
            'hobi' => ['Membaca', 'Basket', 'Menggambar'],
            'kontak' => [
                'email' => '5025221023@mhs.its.ac.id',
                'github' => 'https://github.com/dewilestari',
                'linkedin' => 'https://linkedin.com/in/dewilestari',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.40, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.55, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.60, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.65, 'sks' => 22],
            ],
            'moto' => 'Belajar pelan tapi pasti lebih baik daripada berhenti.',
        ],
        '5025221031' => [
            'nrp' => '5025221031',
            'nama' => 'Bagas Aditya Nugroho',
            'email' => '5025221031@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.40,
            'asal' => 'Bojonegoro, Jawa Timur',
            'hobi' => ['Badminton', 'Game', 'Memancing'],
            'kontak' => [
                'email' => '5025221031@mhs.its.ac.id',
                'github' => 'https://github.com/bagasnugroho',
                'linkedin' => 'https://linkedin.com/in/bagasnugroho',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.25, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.40, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.45, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.50, 'sks' => 22],
            ],
            'moto' => 'Nikmati prosesnya, hasil akan mengikuti.',
        ],
        '5025221048' => [
            'nrp' => '5025221048',
            'nama' => 'Intan Permata Sari',
            'email' => '5025221048@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.80,
            'asal' => 'Tuban, Jawa Timur',
            'hobi' => ['Public Speaking', 'Menulis', 'Kuliner'],
            'kontak' => [
                'email' => '5025221048@mhs.its.ac.id',
                'github' => 'https://github.com/intanpermata',
                'linkedin' => 'https://linkedin.com/in/intanpermata',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.70, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.80, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.85, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.85, 'sks' => 22],
            ],
            'moto' => 'Berani tampil adalah awal dari kepemimpinan.',
        ],
        '5025221056' => [
            'nrp' => '5025221056',
            'nama' => 'Rizqullah Fauzan',
            'email' => '5025221056@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.62,
            'asal' => 'Lamongan, Jawa Timur',
            'hobi' => ['Sepak Bola', 'Traveling', 'Fotografi'],
            'kontak' => [
                'email' => '5025221056@mhs.its.ac.id',
                'github' => 'https://github.com/rizqullah',
                'linkedin' => 'https://linkedin.com/in/rizqullah',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.55, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.60, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.65, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.68, 'sks' => 22],
            ],
            'moto' => 'Dunia seluas peta; jelajahi sambil tetap belajar.',
        ],
        '5025221064' => [
            'nrp' => '5025221064',
            'nama' => 'Nadia Ayu Safitri',
            'email' => '5025221064@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.90,
            'asal' => 'Madiun, Jawa Timur',
            'hobi' => ['AI Research', 'Piano', 'Yoga'],
            'kontak' => [
                'email' => '5025221064@mhs.its.ac.id',
                'github' => 'https://github.com/nadiaayus',
                'linkedin' => 'https://linkedin.com/in/nadiaayus',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.80, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.90, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.92, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.95, 'sks' => 22],
            ],
            'moto' => 'Rasa ingin tahu adalah bahan bakar inovasi.',
        ],
        '5025221072' => [
            'nrp' => '5025221072',
            'nama' => 'Dimas Anggara Putra',
            'email' => '5025221072@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.30,
            'asal' => 'Ngawi, Jawa Timur',
            'hobi' => ['Musik', 'Dota', 'Cooking'],
            'kontak' => [
                'email' => '5025221072@mhs.its.ac.id',
                'github' => 'https://github.com/dimasanggara',
                'linkedin' => 'https://linkedin.com/in/dimasanggara',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.15, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.30, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.35, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.40, 'sks' => 22],
            ],
            'moto' => 'Keahlian bukan dari bakat, tapi dari pengulangan.',
        ],
        '5025221080' => [
            'nrp' => '5025221080',
            'nama' => 'Vina Rahmawati',
            'email' => '5025221080@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.75,
            'asal' => 'Kediri, Jawa Timur',
            'hobi' => ['Menari', 'Content Creator', 'Belajar Bahasa'],
            'kontak' => [
                'email' => '5025221080@mhs.its.ac.id',
                'github' => 'https://github.com/vinarahma',
                'linkedin' => 'https://linkedin.com/in/vinarahma',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.65, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.75, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.78, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.82, 'sks' => 22],
            ],
            'moto' => 'Berkembang bersama komunitas yang saling mengangkat.',
        ],
        '5025221099' => [
            'nrp' => '5025221099',
            'nama' => 'Fajar Ramadhan',
            'email' => '5025221099@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.48,
            'asal' => 'Pacitan, Jawa Timur',
            'hobi' => ['Koding Kompetitif', 'Catur', 'Berlari'],
            'kontak' => [
                'email' => '5025221099@mhs.its.ac.id',
                'github' => 'https://github.com/fajarramadhan',
                'linkedin' => 'https://linkedin.com/in/fajarramadhan',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.35, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.45, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.50, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.60, 'sks' => 22],
            ],
            'moto' => 'Latihan harian mengalahkan bakat sekali pakai.',
        ],
        '5025221103' => [
            'nrp' => '5025221103',
            'nama' => 'Ayu Lestari',
            'email' => '5025221103@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.70,
            'asal' => 'Blitar, Jawa Timur',
            'hobi' => ['Voli', 'Membaca Novel', 'Memasak'],
            'kontak' => [
                'email' => '5025221103@mhs.its.ac.id',
                'github' => 'https://github.com/ayulestari',
                'linkedin' => 'https://linkedin.com/in/ayulestari',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.60, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.68, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.72, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.80, 'sks' => 22],
            ],
            'moto' => 'Seimbang dalam belajar dan bermain adalah seni.',
        ],
        '5025221111' => [
            'nrp' => '5025221111',
            'nama' => 'Raka Pratama Putra',
            'email' => '5025221111@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.58,
            'asal' => 'Jombang, Jawa Timur',
            'hobi' => ['Skateboard', 'Editing Video', 'Karaoke'],
            'kontak' => [
                'email' => '5025221111@mhs.its.ac.id',
                'github' => 'https://github.com/rakaptr',
                'linkedin' => 'https://linkedin.com/in/rakaptr',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.45, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.55, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.62, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.70, 'sks' => 22],
            ],
            'moto' => 'Kreativitas tumbuh di ruang yang tidak jarang kosong.',
        ],
        '5025221120' => [
            'nrp' => '5025221120',
            'nama' => 'Zahra Aulia',
            'email' => '5025221120@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.85,
            'asal' => 'Ponorogo, Jawa Timur',
            'hobi' => ['Desain Grafis', 'Robotics', 'Berenang'],
            'kontak' => [
                'email' => '5025221120@mhs.its.ac.id',
                'github' => 'https://github.com/zahraaulia',
                'linkedin' => 'https://linkedin.com/in/zahraaulia',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.75, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.85, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.88, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.92, 'sks' => 22],
            ],
            'moto' => 'Kolaborasi lintas disiplin melahirkan solusi besar.',
        ],
        '5025221138' => [
            'nrp' => '5025221138',
            'nama' => 'Farhan Maulana',
            'email' => '5025221138@mhs.its.ac.id',
            'prodi' => 'Teknik Informatika',
            'departemen' => 'Departemen Teknik Informatika',
            'angkatan' => 2022,
            'semester' => 7,
            'ipk' => 3.52,
            'asal' => 'Surabaya, Jawa Timur',
            'hobi' => ['E-sports', 'Ngoding', 'Bulu Tangkis'],
            'kontak' => [
                'email' => '5025221138@mhs.its.ac.id',
                'github' => 'https://github.com/farhanmaulana',
                'linkedin' => 'https://linkedin.com/in/farhanmaulana',
            ],
            'riwayat' => [
                ['semester' => 1, 'ip' => 3.40, 'sks' => 20],
                ['semester' => 2, 'ip' => 3.50, 'sks' => 22],
                ['semester' => 3, 'ip' => 3.55, 'sks' => 20],
                ['semester' => 4, 'ip' => 3.62, 'sks' => 22],
            ],
            'moto' => 'Fokus pada tujuan kecil setiap hari adalah kunci.',
        ],
    ];

    /**
     * Katalog ide platform Agentic AI akhir semester.
     *
     * @var array<string, array<string, string>>
     */
    private const TEMA_AGENT = [
        'general-assistant' => [
            'slug' => 'general-assistant',
            'judul' => 'General Assistant Agent',
            'ringkas' => 'Asisten serbaguna untuk urusan akademik sehari-hari.',
            'deskripsi' => 'Asisten yang siap menjawab pertanyaan seputar jadwal kuliah, '
                . 'mengingatkan tenggat tugas, merangkum materi, hingga membantu menyusun '
                . 'rencana belajar. Menjadi tema dasar (fallback) bila tidak ada tema yang dipilih.',
        ],
        'tracking-keuangan' => [
            'slug' => 'tracking-keuangan',
            'judul' => 'Tracking Keuangan Otomatis',
            'ringkas' => 'Mencatat pengeluaran dari foto nota secara otomatis.',
            'deskripsi' => 'Platform agentic AI berbasis computer vision yang membaca isi nota '
                . 'belanja dari foto, lalu menghitung dan mencatat transaksi ke database secara '
                . 'otomatis. Data pengeluaran terstruktur dan siap dianalisis untuk membantu '
                . 'mengelola keuangan bulanan.',
        ],
    ];

    /**
     * Ambil seluruh data mahasiswa.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function mahasiswa(): array
    {
        return self::MAHASISWA;
    }

    /**
     * Cari profil mahasiswa berdasarkan NRP.
     *
     * @return array<string, mixed>|null
     */
    public static function cariMahasiswa(string $nrp): ?array
    {
        return self::MAHASISWA[$nrp] ?? null;
    }

    /**
     * Ambil seluruh katalog tema agent.
     *
     * @return array<string, array<string, string>>
     */
    public static function tema(): array
    {
        return self::TEMA_AGENT;
    }

    /**
     * Cari tema agent; bila tidak ditemukan, gunakan fallback default.
     *
     * @return array<string, string>
     */
    public static function cariTema(?string $slug): array
    {
        return self::TEMA_AGENT[$slug] ?? self::TEMA_AGENT['general-assistant'];
    }
}