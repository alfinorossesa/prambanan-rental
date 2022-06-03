@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Transaksi Paket Wisata</h1>

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
                            <th>Nama Paket Wisata</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_pemesanan)) }}</td>
                                <td>{{ $item->kode_reservasi }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->dataPaketWisata->nama_paket }}</td>
                                <td>
                                    <a href="{{ route('transaksi-paket-wisata.show', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm rounded-circle border-0">
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