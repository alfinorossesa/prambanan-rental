@extends('customer.auth.layout')
@section('content')
    <div class="p-5">

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="text-red-600">
                    {{ __('Data yang anda masukkan tidak valid.') }}
                </div>
            </div>
        @endif

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
        </div>
        <form method="POST" action="{{ route('register') }}" class="user">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-user @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan No. HP" required>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <div class="form-group">
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4" cols="50" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password Baru" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password" name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror 
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">Register</button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login</a>
        </div>
    </div>
@endsection

