<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        foreach (['create' => 'tambah', 'update' => 'ubah', 'delete' => 'hapus'] as $action => $permission) {
            Gate::define($action.'-mahasiswa', function (User $user) use ($permission): bool {
                return $user->hasExactRoles(['Admin']) && $user->hasPermissionTo('mahasiswa.'.$permission);
            });
        }
    }
}
