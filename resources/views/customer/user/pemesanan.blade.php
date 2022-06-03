@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-4">
                <h3 class="lh-1 mb-4 text-center">History Pemesanan</h3>
            </div>               
        </div>
    </div>
    <div class="container">
        <div class="mt-4 pb-2">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kode Reservasi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historySewa as $item)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>{{ date('d-m-Y', strtotime($item->tanggal_pemesanan)) }}</td>
                        <td>{{ $item->kode_reservasi }}</td>
                        <td>{{ $item->kendaraan->kategori }}</td>
                        <td>{{ $item->kendaraan->merk->nama_merk }} - {{ $item->kendaraan->tipe }}</td>
                        <td>
                            <a href="{{ route('user.pemesanan-detail', [auth()->user()->id, $item->id]) }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid px-4 mt-5 pt-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-6">
                <h3 class="lh-1 mb-4 text-center">History Pemesanan Paket Wisata</h3>
            </div>               
        </div>
    </div>
    <div class="container">
        <div class="mt-4 pb-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kode Reservasi</th>
                        <th scope="col">Nama Paket Wisata</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historyPaketWisata as $item)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>{{ date('d-m-Y', strtotime($item->tanggal_pemesanan)) }}</td>
                        <td>{{ $item->kode_reservasi }}</td>
                        <td>{{ $item->dataPaketWisata->nama_paket }}</td>
                        <td>
                            <a href="{{ route('user.pemesanan-detailPaketWisata', [auth()->user()->id, $item->id]) }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</section>
@endsection