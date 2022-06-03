@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('transaksi-paket-wisata.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Paket Wisata</h6>
    </div>
    <div class="p-5 m-3">
        <h6>Kode Reservasi : {{ $paketWisata->kode_reservasi }}</h6>
        <h6>Nama Pelanggan : {{ $paketWisata->user->nama }}</h6>
        <h6>Tanggal Pemesanan : {{ date('d-m-Y', strtotime($paketWisata->tanggal_pemesanan)) }}</h6>

        <div class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Nama Paket Wisata</td>
                        <td>{{ $paketWisata->dataPaketWisata->nama_paket }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tanggal Berangkat</td>
                        <td>{{ date('d-m-Y', strtotime($paketWisata->tanggal_berangkat)) }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Harga</td>
                        <td>-</td>
                        <td>Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr class="alert-success">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-5 mx-3">
            <div>
                <a href="{{ route('transaksi-paket-wisata.pdf', $paketWisata->id) }}" class="btn btn-sm btn-primary">Cetak</a>
            </div>
       </div>

    </div>
</div>
@endsection