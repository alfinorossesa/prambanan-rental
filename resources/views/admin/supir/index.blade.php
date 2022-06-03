@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Supir</h1>

    {{-- alert --}}
    @include('admin.alerts.alert')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('supir.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Supir
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supir as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="{{ route('supir.edit', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm rounded-circle border-0">
                                        <i class="fas fa-pen fa-sm text-white-100"></i> 
                                    </a>
                                    <form class="d-inline" action="{{ route('supir.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-circle border-0" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash fa-sm text-white-100"></i> </button>
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