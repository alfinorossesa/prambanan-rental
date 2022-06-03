@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container px-5 mb-5 pb-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-12">
                <h3 class="lh-1 mb-4 text-center">Detail Biaya Paket Wisata</h3>
            </div>                
        </div>
        <div class="my-4">
            <p>Tanggal : {{ date('d-m-Y', strtotime($paketWisata->tanggal_pemesanan)) }}</p>
            <p>Pelanggan : {{ $paketWisata->user->nama }}</p>
            <p>Kode Reservasi : {{ $paketWisata->kode_reservasi }}</p>
        </div>
        <div class="mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th> 
                        <th scope="col">Jenis</th>
                        <th scope="col">Ketrangan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1.</td>
                        <td>Nama Paket Wisata</td>
                        <td>{{ $paketWisata->dataPaketWisata->nama_paket }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">2.</td>
                        <td>Tanggal Berangkat</td>
                        <td>{{ date('d-m-Y', strtotime($paketWisata->tanggal_berangkat)) }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">3.</td>
                        <td>Harga Paket</td>
                        <td>-</td>
                        <td>Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Rp. {{ number_format($paketWisata->dataPaketWisata->harga) }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="d-flex float-end my-5">
            <div>
               <a href="{{ route('paket-wisata.pdf', $paketWisata->id) }}" class="btn btn-sm outline-darkblue-custom">cetak nota</a>
            </div>
       </div>
    </div>
</section>
@endsection