@extends('admin.auth.layout')
@section('content')
    <div class="p-5">

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="text-red-600">
                    {{ __('Email atau Password yang anda masukkan tidak valid.') }}
                </div>
            </div>
        @endif

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Reset Password!</h1>
        </div>
        <form method="POST" action="{{ route('password.update') }}" class="user">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('email', request('email')) }}" placeholder="Enter Email Address..." required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Password..." name="password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password_confirmation" placeholder="Konfirmasi Password..." name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
        </form>
    </div>
@endsection
