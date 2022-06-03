@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('merk.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Merk</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('merk.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="custom-select  @error('kategori') is-invalid @enderror" name="kategori" id="kategori" required>
                    <option selected disabled>Pilih Kategori</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select> 
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror   
            </div>
            
            <div class="form-group">
                <label for="nama_merk">Nama Merk</label>
                <input type="text" class="form-control @error('nama_merk') is-invalid @enderror" id="nama_merk" name="nama_merk" value="{{ old('nama_merk') }}" placeholder="Masukkan Nama Merk" required>
                @error('nama_merk')
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