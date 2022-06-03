@extends('admin.auth.layout')
@section('content')
    <div class="p-5">

        <!-- Session Status -->
        @if (session()->has('status'))
            <div class="alert alert-info">
                <div class="text-red-600">
                    {{ __('Email konfirmasi berhasil terkirim. Silahkan periksa email anda.') }}
                </div>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="text-red-600">
                    {{ __('Email yang anda masukkan tidak valid.') }}
                </div>
            </div>
        @endif
        
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Masukan email anda untuk melakukan Lupa Password.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}" class="user">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address..." required>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">Lupa Password</button>
        </form>
    </div>
@endsection
