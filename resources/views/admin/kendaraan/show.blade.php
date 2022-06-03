@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('kendaraan.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Kendaraan</h6>
    </div>
    <div class="card-body p-5">
        <div class="d-flex justify-content-center">
            <div class="mb-5">
                <img src="{{ asset('storage/images/'.$kendaraan->foto) }}" alt="photo" style="width: 460px; height:250px;">
            </div>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kategori</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->kategori }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Merk</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->merk->nama_merk }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Tipe</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->tipe }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Warna</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->warna }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Tahun</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->tahun }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">No. Polisi</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->no_polisi }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kapasitas Penumpang</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->kapasitas_penumpang }} Orang</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">No. Mesin</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->no_mesin }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">No. Rangka</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->no_rangka }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Jenis BBM</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->jenis_bbm }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kapasitas BBM</h6></td>
                    <td>:</td>
                    <td>{{ $kendaraan->kapasitas_bbm }} liter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection