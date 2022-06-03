@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Data Pelanggan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.show', $item->id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm rounded-circle border-0">
                                        <i class="fas fa-info-circle fa-sm text-white-100"></i>
                                    </a>
                                    <form class="d-inline" action="{{ route('pelanggan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm  rounded-circle border-0" onclick="return confirm('Apakah anda yakin ?')"><i class="fas fa-trash fa-sm text-white-100"></i></button>
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