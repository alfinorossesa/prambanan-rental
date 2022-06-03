@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-12">
                <h3 class="lh-1 mb-4 text-center">Form Pemesanan Paket Wisata</h3>
            </div>                
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mt-4">
                <img src="{{ asset('storage/images/'. $paketWisata->foto) }}" alt="" width="100%">
            </div>
            <div class="col-md-4 mt-5">
                <h5 class="mb-1 text-muted">Nama Paket Wisata : </h5> <h6 class="mb-4"><li>{{ $paketWisata->nama_paket }}</li></h6>
                <h5 class="mb-1 text-muted">Tujuan : </h5> <h6 class="mb-4"><li>{{ $paketWisata->tujuan }}</li></h6>
                <h5 class="mb-1 text-muted">Fasilitas : </h5> 
                <h6 class="mb-4">
                    @foreach ($paketWisata['fasilitas'] as $item)
                        <li>{{ $item['fasilitas'] }}</li>
                    @endforeach
                </h6>
    
                <h5 class="mb-1 text-muted">Deskripsi : </h5> <h6 class="mb-4"><li>{{ $paketWisata->deskripsi }}</li></h6>
                <h5 class="mb-1 text-muted">Harga : </h5> <h6 class="mb-4"><li>Rp. {{ number_format($paketWisata->harga) }}</li></h6>
            </div>
            <div class="col-md-4">
                <form action="{{ route('paket-wisata.store', $paketWisata->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="dataPaketWisata_id" value="{{ $paketWisata->id }}">
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
                    <div class="mb-3">
                        <label for="tanggal_berangkat">Pilih Tanggal Berangkat</label>
                        <input class="form-control @error('tanggal_berangkat') is-invalid @enderror" id="tanggal_berangkat" type="date" name="tanggal_berangkat" value="{{ old('tanggal_berangkat') }}" />
                        @error('tanggal_berangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                    <div class="d-flex float-end">
                        <div class="mx-2">
                            <a href="{{ route('paket-wisata.index') }}" class="btn btn-sm btn-dark">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>
@endsection