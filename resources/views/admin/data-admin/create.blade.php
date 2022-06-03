@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('data-admin.index') }}">
        <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Admin</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-admin.store') }}" method="post">
            @csrf
            <input type="hidden" name="isAdmin" value="{{ true }}">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan No. HP" required>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4" cols="50" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Konfirmasi Password" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>
@endsection