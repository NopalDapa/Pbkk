<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (['mahasiswa.lihat', 'mahasiswa.tambah', 'mahasiswa.ubah', 'mahasiswa.hapus'] as $permission) {
            Permission::findOrCreate($permission, 'web');
        }

        Role::findOrCreate('Admin', 'web')->syncPermissions(['mahasiswa.lihat', 'mahasiswa.tambah', 'mahasiswa.ubah', 'mahasiswa.hapus']);
        Role::findOrCreate('Staf', 'web')->syncPermissions(['mahasiswa.lihat']);

        foreach (['Admin', 'Staf'] as $role) {
            $user = User::updateOrCreate(
                ['email' => strtolower($role).'@portal.test'],
                ['name' => $role.' Akademik', 'password' => Hash::make('password'), 'email_verified_at' => now()],
            );
            $user->syncRoles([$role]);
        }

        if (Mahasiswa::count() === 0) {
            Mahasiswa::factory(50)->create();
        }

        // Lengkapi data demo lama tanpa mengganti identitas atau isi yang sudah disunting.
        Mahasiswa::whereNull('tentang')->whereNull('ide_judul')->each(function (Mahasiswa $mahasiswa) {
            $details = Mahasiswa::factory()->make()->only([
                'minat', 'ide_judul', 'ide_deskripsi', 'ide_alur',
            ]);
            $details['email'] = $mahasiswa->email ?? $mahasiswa->nrp.'@student.its.ac.id';
            $details['tentang'] = $mahasiswa->nama.' adalah mahasiswa '.$mahasiswa->prodi.'.';
            $mahasiswa->update(array_filter($details, fn ($value, $field) => $mahasiswa->$field === null, ARRAY_FILTER_USE_BOTH));
        });
    }
}
