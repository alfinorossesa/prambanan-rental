@extends('admin.auth.layout')
@section('content')
    <div class="p-5">

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Verifikasi email anda dengan menekan tombol verifikasi dibawah.') }}
        </div>

        <form method="POST" action="{{ route('verification.send') }}" class="user">
            @csrf
            <button type="submit" class="btn btn-primary btn-user btn-block">Verifikasi Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="user mt-3">
            @csrf
            <button type="submit" class="btn btn-danger btn-user btn-block">Logout</button>
        </form>
    </div>
@endsection
