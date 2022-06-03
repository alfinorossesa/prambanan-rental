@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Pengembalian</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('pengembalian.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Pengembalian
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Reservasi</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengembalian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->kode_reservasi }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_pengembalian)) }} / {{ date('H:i', strtotime($item->tanggal_pengembalian)) }} WIB</td>
                                <td>Rp. {{ number_format($item->denda) }}</td>
                                <td>
                                    <a href="{{ route('pengembalian.show', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm rounded-circle border-0">
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