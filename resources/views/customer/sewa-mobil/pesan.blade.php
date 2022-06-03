@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-12">
                <h3 class="lh-1 mb-4 text-center">Form Pemesanan Sewa Mobil</h3>
            </div>                
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ route('sewa-mobil.store', $kendaraan->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kode_reservasi">Kode Reservasi</label>
                        <input class="form-control @error('kode_reservasi') is-invalid @enderror" id="kode_reservasi" type="text" name="kode_reservasi" value="{{ $kodeReservasi }}" readonly/>
                        @error('kode_reservasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                        <input class="form-control @error('tanggal_pemesanan') is-invalid @enderror" id="tanggal_pemesanan" type="date" name="tanggal_pemesanan" value="{{ $tanggalPemesanan->toDateString() }}" readonly/>
                        @error('tanggal_pemesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="user_id">Nama Pelanggan</label>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input class="form-control @error('user_id') is-invalid @enderror" id="user_id" type="text" value="{{ auth()->user()->nama }}" readonly/>
                        @error('user_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" type="text" style="height: 5rem" readonly>{{ auth()->user()->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="no_hp">No. HP</label>
                        <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" type="number" value="{{ auth()->user()->no_hp }}" readonly/>
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kartu_identitas">Kartu Identitas</label>
                                <select class="form-select @error('kartu_identitas') is-invalid @enderror" id="kartu_identitas" name="kartu_identitas">
                                    <option selected disabled>Pilih Satu</option>
                                    <option value="ktp">KTP</option>
                                    <option value="sim">SIM</option>
                                </select>
                                @error('kartu_identitas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik">NIK</label>
                                <input class="form-control @error('nik') is-invalid @enderror" id="nik" type="number" name="nik" value="{{ old('nik') }}" placeholder="NIK"/>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jaminan">Jaminan</label>
                        <select class="form-select @error('jaminan') is-invalid @enderror" id="jaminan" name="jaminan">
                            <option selected disabled>Pilih Jaminan</option>
                            <option value="kartu keluarga">Kartu Keluarga</option>
                            <option value="npwp">NPWP</option>
                            <option value="ktp">KTP</option>
                        </select>
                        @error('jaminan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kendaraan_id">Kategori Kendaraan</label>
                        <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->id }}">
                        <input class="form-control @error('kendaraan_id') is-invalid @enderror" id="kendaraan_id" type="text" value="{{ $kendaraan->kategori }}" readonly/>
                        @error('kendaraan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="merk">Merk</label>
                                <input class="form-control @error('merk') is-invalid @enderror" id="merk" type="text" value="{{ $kendaraan->merk->nama_merk }}" readonly/>
                                @error('merk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kendaraan_id">Tipe</label>
                                <input class="form-control @error('kendaraan_id') is-invalid @enderror" id="kendaraan_id" type="text" value="{{ $kendaraan->tipe }}" readonly/>
                                @error('kendaraan_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                <input class="form-control @error('tanggal_peminjaman') is-invalid @enderror" id="tanggal_peminjaman" type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" />
                                @error('tanggal_peminjaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jam_peminjaman">Jam Peminjaman</label>
                                <input class="form-control @error('jam_peminjaman') is-invalid @enderror" id="jam_peminjaman" type="time" name="jam_peminjaman" value="{{ old('jam_peminjaman') }}"/>
                                @error('jam_peminjaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror  
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="supir">Supir</label>
                        <select class="form-select @error('supir') is-invalid @enderror" id="supir" name="supir" {{ $supir == 0 ? 'disabled' : '' }}>
                            <option selected disabled>{{ $supir == 0 ? 'Supir Tidak Tersedia' : 'Pilih Satu' }}</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        @error('supir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="bbm">BBM</label>
                        <select class="form-select @error('bbm') is-invalid @enderror" id="bbm" name="bbm">
                            <option selected disabled>Pilih Satu</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        @error('bbm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="durasi_peminjaman">Durasi Peminjaman</label>
                        <select class="form-select @error('durasi_peminjaman') is-invalid @enderror" id="durasi_peminjaman" name="durasi_peminjaman">
                            <option selected disabled>Pilih Satu</option>
                            <option value="12">12 Jam</option>
                            <option value="24">24 Jam</option>
                            <option value="36">36 Jam</option>
                            <option value="48">48 Jam</option>
                        </select>
                        @error('durasi_peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                    <div class="d-flex float-end">
                        <div class="mx-2">
                            <a href="{{ route('sewa-mobil.index') }}" class="btn btn-sm btn-dark">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4">
                    <img src="{{ asset('storage/images/'. $kendaraan->foto) }}" alt="" width="100%">
                </div>
            </div>
        </form>
    </div>
    
</section>
@endsection