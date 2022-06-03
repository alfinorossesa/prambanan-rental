@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Merk Kendaraan</h1>

    {{-- alert --}}
    @include('admin.alerts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('merk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                            <th>Nama Merk</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($merk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->nama_merk }}</td>
                                <td>
                                    <a href="{{ route('merk.edit', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm rounded-circle border-0">
                                        <i class="fas fa-pen fa-sm text-white-100"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('merk.destroy', $item->id) }}" method="post">
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