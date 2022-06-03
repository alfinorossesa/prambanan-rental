@extends('customer.auth.layout')
@section('content')
    <div class="p-5 mt-5">

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="text-red-600">
                    {{ __('Email atau Password yang anda masukkan tidak valid.') }}
                </div>
            </div>
        @endif

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Login Customer!</h1>
        </div>
        <form method="POST" action="{{ route('login') }}" class="user">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required autocomplete="current-password">
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                    <label class="custom-control-label" for="remember_me">Remember Me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
        </div>
        <div class="text-center">
            <a class="small" href="{{ route('register') }}">Buat Akun Baru!</a>
        </div>
    </div>
@endsection
