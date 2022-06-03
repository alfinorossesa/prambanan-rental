@extends('customer.auth.layout')
@section('content')
    <div class="p-5">

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Mohon konfirmasi password anda sebelum melanjutkan menggunakan aplikasi.') }}
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="text-red-600">
                    {{ __('Password yang anda masukkan tidak valid.') }}
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.confirm') }}" class="user">
            @csrf
            <div class="form-group">
                <input type="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password..." name="password" required autocomplete="current-password">
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">Konfirmasi</button>
        </form>
    </div>
@endsection

