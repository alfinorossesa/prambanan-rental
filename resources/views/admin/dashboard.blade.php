@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between my-5">
            <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        </div>

        <div class="row mt-5">
            @if (auth()->user()->email == 'superadmin@admin.com')
                <div class="col-xl-3 col-md-6 mb-4">
                    <a href="{{ route('data-admin.index') }}">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Data admin
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('merk.index') }}">
                    <div class="card {{ $merk > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $merk > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Merk
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $merk }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('kendaraan.index') }}">
                    <div class="card {{ $kendaraan > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $kendaraan > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Kendaraan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kendaraan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('supir.index') }}">
                    <div class="card {{ $supir > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $supir > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Supir
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $supir }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('pelanggan.index') }}">
                    <div class="card {{ $pelanggan > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $pelanggan > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Pelanggan
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pelanggan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('peminjaman.index') }}">
                    <div class="card {{ $peminjaman > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $peminjaman > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Peminjaman
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $peminjaman }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('data-paket-wisata.index') }}">
                    <div class="card {{ $dataPaketWisata > 0 ? 'border-left-success' : 'border-left-danger' }} shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold {{ $dataPaketWisata > 0 ? 'text-success' : 'text-danger' }} text-uppercase mb-1">
                                        Data Paket Wisata
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dataPaketWisata }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
@endsection