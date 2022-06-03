@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('supir.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Supir</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('supir.update', $supir->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik', $supir->nik) }}" placeholder="Masukkan NIK" required>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $supir->nama) }}" placeholder="Masukkan Nama Lengkap" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $supir->no_hp) }}" placeholder="Masukkan No. HP" required>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="4" cols="50" placeholder="Masukkan Alamat">{{ old('alamat', $supir->alamat) }}</textarea>
                @error('alamat')
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