@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('title', 'Login Portal Akademik')
@section('auth_header', 'Login Portal Akademik')

@section('auth_body')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-check mb-3">
            <input id="remember" type="checkbox" name="remember" class="form-check-input">
            <label for="remember" class="form-check-label">Ingat saya</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    @if (app()->environment('local') && config('demo.enabled'))
        <hr>
        <p class="text-muted text-center">Login instan untuk demo kelas</p>
        <div class="row">
            @foreach (['Admin', 'Staf'] as $role)
                <div class="col-6">
                    <form method="POST" action="{{ route('demo.login', $role) }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-block">Login {{ $role }}</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@stop
