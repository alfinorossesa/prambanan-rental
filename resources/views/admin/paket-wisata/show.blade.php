@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('data-paket-wisata.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Paket Wisata</h6>
    </div>
    <div class="card-body p-5">
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="mb-5">
                    <img src="{{ asset('storage/images/'.$paketWisata->foto) }}" alt="photo" class="tambah-paket-wisata">
                </div>
            </div>
            <table class="table col-md-6">
                <tbody>
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Nama Paket Wisata</h6></td>
                        <td>:</td>
                        <td>{{ $paketWisata->nama_paket }}</td>
                    </tr>
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Tujuan</h6></td>
                        <td>:</td>
                        <td>{{ $paketWisata->tujuan }}</td>
                    </tr>
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Fasilitas</h6></td>
                        <td>:</td>
                        <td>
                            @foreach ($paketWisata['fasilitas'] as $item)
                                <li>{{ $item['fasilitas'] }}</li>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Deskripsi</h6></td>
                        <td>:</td>
                        <td>{{ $paketWisata->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Harga</h6></td>
                        <td>:</td>
                        <td>Rp. {{ number_format($paketWisata->harga) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection