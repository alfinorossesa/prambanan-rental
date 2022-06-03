@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-12">
                <h3 class="lh-1 mb-4 text-center">Detail Biaya Sewa Mobil</h3>
            </div>                
        </div>
        <div class="my-4">
            <p>Tanggal : {{ date('d-m-Y', strtotime($mobil->tanggal_pemesanan)) }}</p>
            <p>Pelanggan : {{ $mobil->user->nama }}</p>
            <p>Kode Reservasi : {{ $mobil->kode_reservasi }}</p>
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
                        <td>Merk Kendaraan</td>
                        <td>{{ $mobil->kendaraan->merk->nama_merk }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">2.</td>
                        <td>Tipe</td>
                        <td>{{ $mobil->kendaraan->tipe }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">3.</td>
                        <td>Tanggal Peminjaman</td>
                        <td>{{ date('d-m-Y', strtotime($mobil->tanggal_peminjaman)) }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">4.</td>
                        <td>Jam Peminjaman</td>
                        <td>{{ date('H:i', strtotime($mobil->jam_peminjaman)) }} WIB</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">5.</td>
                        <td>Durasi </td>
                        <td>{{ $mobil->durasi_peminjaman }} Jam</td> 
                        <td>-</td>
                    </tr>
                    <tr class="table-info">
                        <td scope="row">6.</td>
                        <td>Aturan Dikembalikan Tanggal</td>
                        <td>{{ $tanggalPengembalian }} / {{ $jamPengembalian }} WIB</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td scope="row">7.</td>
                        <td>Supir</td>
                        <td>{{ $mobil->supir == 1 ? 'Ya' : 'Tidak' }}</td>
                        <td>Rp. {{ $mobil->supir == 1 ? number_format(100000) : number_format(0) }}</td>
                    </tr>
                    <tr>
                        <td scope="row">8.</td>
                        <td>BBM</td>
                        <td>{{ $mobil->bbm == 1 ? 'Ya' : 'Tidak' }}</td>
                        <td>Rp. {{ $mobil->bbm == 1 ? number_format(100000) : number_format(0) }}</td>
                    </tr>
                    <tr>
                        <td scope="row">9.</td>
                        <td>Harga Sewa Kendaraan</td>
                        <td>Rp. {{ number_format($mobil->kendaraan->hargaSewa[0]->harga) }} / {{ $mobil->kendaraan->hargaSewa[0]->keterangan }}</td>
                        <td>Rp. {{ number_format($hargaSewa) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Harga Total</th>
                        <th scope="col">Rp. {{ number_format($total) }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="my-5">
            <p class="text-danger">*Note : Jika telat waktu pengembalian akan di denda Rp. 10,000 / jam</p>
        </div>
        <div class="d-flex float-end">
            <div>
               <a href="{{ route('sewa-mobil.pdf', $mobil->id) }}" class="btn btn-sm outline-darkblue-custom">cetak nota</a>
            </div>
       </div>
    </div>
</section>
@endsection