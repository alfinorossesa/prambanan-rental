@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Peminjaman</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Kode Reservasi</th>
                            <th>Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Durasi</th>
                            <th>Pengembalian</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_pemesanan)) }}</td>
                                <td>{{ $item->kode_reservasi }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->kendaraan->merk->nama_merk }} - {{ $item->kendaraan->tipe }}</td>
                                <td>{{ $item->durasi_peminjaman }} jam</td>
                                <td class="{{ $item->pengembalian !== null ? 'text-success' : 'text-danger' }}">
                                    {{ $item->pengembalian !== null ? 'Sudah' : 'Belum' }}
                                </td>
                                <td>
                                    <a href="{{ route('peminjaman.show', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm rounded-circle border-0">
                                        <i class="fas fa-info-circle fa-sm text-white-100"></i> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection