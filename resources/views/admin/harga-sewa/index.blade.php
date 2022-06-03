@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Harga Sewa Kendaraan</h1>

    {{-- alert --}}
    @include('admin.alerts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('harga-sewa.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Nama Kendaraan</th>
                            <th>Harga Sewa</th>
                            <th>Keterangan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hargaSewa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->kendaraan->kategori }}</td>
                                <td>{{ $item->kendaraan->merk->nama_merk }} - {{ $item->kendaraan->tipe }}</td>
                                <td>Rp. {{ number_format($item->harga) }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>
                                    <a href="{{ route('harga-sewa.edit', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm rounded-circle border-0">
                                        <i class="fas fa-pen fa-sm text-white-100"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('harga-sewa.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-circle border-0" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash fa-sm text-white-100"></i></button>
                                    </form>
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