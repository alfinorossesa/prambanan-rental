@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('pelanggan.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pelanggan</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Nama</h6></td>
                    <td>:</td>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Email</h6></td>
                    <td>:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">No. HP</h6></td>
                    <td>:</td>
                    <td>{{ $user->no_hp }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Alamat</h6></td>
                    <td>:</td>
                    <td>{{ $user->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection