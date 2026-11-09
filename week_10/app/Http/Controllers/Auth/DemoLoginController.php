<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoLoginController extends Controller
{
    public function __invoke(Request $request, string $role): RedirectResponse
    {
        abort_unless(app()->environment('local') && config('demo.enabled'), 404);
        abort_unless(in_array($role, ['Admin', 'Staf'], true), 404);

        $user = User::where('email', strtolower($role).'@portal.test')->firstOrFail();
        abort_unless($user->hasExactRoles([$role]) && $user->hasVerifiedEmail(), 403);

        Auth::login($user);
        $request->session()->regenerate();

        return to_route('dashboard');
    }
}
