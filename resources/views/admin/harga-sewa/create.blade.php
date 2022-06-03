@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('harga-sewa.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Harga Sewa Kendaraan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('harga-sewa.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="kendaraan_id">Kendaraan</label>
                <select class="custom-select  @error('kendaraan_id') is-invalid @enderror" name="kendaraan_id" id="kendaraan_id" required>
                    <option selected disabled>Pilih Kendaraan</option>
                    @foreach ($kendaraan as $item)
                        <option value="{{ $item->id }}">{{ $item->merk->nama_merk }} - {{ $item->tipe }}</option>
                    @endforeach
                </select> 
                @error('kendaraan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror   
            </div>
            
            <div class="form-group">
                <label for="harga">Harga Sewa</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Sewa" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <select class="custom-select  @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required>
                    <option selected disabled>Pilih Satu</option>
                    <option value="per jam">Per Jam</option>
                    <option value="per hari">Per Hari</option>
                </select> 
                @error('keterangan')
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