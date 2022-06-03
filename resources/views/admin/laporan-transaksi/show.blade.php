@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('laporan-transaksi.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
    </div>
    <div class="p-5 m-3">
        <h6>Kode Reservasi : <a href="{{ route('peminjaman.show', $detailTransaksi->id) }}" style="text-decoration : underline;">{{ $detailTransaksi->kode_reservasi }}</a></h6>
        <h6>Nama Pelanggan : {{ $detailTransaksi->user->nama }}</h6>
        <h6>Tanggal Pemesanan : {{ date('d-m-Y', strtotime($detailTransaksi->tanggal_pemesanan)) }}</h6>

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
                        <td>Merk Kendaraan</td>
                        <td>{{ $detailTransaksi->kendaraan->merk->nama_merk }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tipe</td>
                        <td>{{ $detailTransaksi->kendaraan->tipe }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Tanggal Peminjaman</td>
                        <td>{{ date('d-m-Y', strtotime($detailTransaksi->tanggal_peminjaman)) }}</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Jam Peminjaman</td>
                        <td>{{ date('H:i', strtotime($detailTransaksi->jam_peminjaman)) }} WIB</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Durasi </td>
                        <td>{{ $detailTransaksi->durasi_peminjaman }} Jam</td>
                        <td>-</td>
                    </tr>
                    <tr class="alert-info">
                        <td>6.</td>
                        <td>Aturan Dikembalikan Tanggal</td>
                        <td>{{ date('d-m-Y', strtotime($tanggalPengembalian)) }} / {{ date('H:i', strtotime($jamPengembalian)) }} WIB</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Supir</td>
                        <td>{{ $detailTransaksi->supir ? 'Ya' : 'Tidak' }}</td>
                        <td>Rp. {{ $detailTransaksi->supir ? number_format(100000) : 0 }}</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>BBM</td>
                        <td>{{ $detailTransaksi->bbm ? 'Ya' : 'Tidak' }}</td>
                        <td>Rp. {{ number_format($bbm) }}</td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Harga Sewa Kendaraan</td>
                        <td>Rp. {{ number_format($detailTransaksi->kendaraan->hargaSewa[0]->harga) }} / {{ $detailTransaksi->kendaraan->hargaSewa[0]->keterangan }}</td>
                        <td>Rp. {{ number_format($hargaSewaPerDurasi) }}</td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Dikembalikan Tanggal</td>
                        <td class="{{ $detailTransaksi->pengembalian->denda == 0 ? 'text-success' : 'text-danger' }}">{{ date('d-m-Y', strtotime($detailTransaksi->pengembalian->tanggal_pengembalian)) }} / {{ date('H:i', strtotime($detailTransaksi->pengembalian->tanggal_pengembalian)) }} WIB</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>Telat Pengembalian</td>
                            @if ($detailTransaksi->pengembalian->denda !== 0)
                                <td>{{ ($telat->d * 24) + $telat->h }} Jam</td>
                            @else
                                <td>-</td>
                            @endif
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Denda</td>
                        <td>-</td>
                        <td>Rp. {{ number_format($detailTransaksi->pengembalian->denda) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr class="alert-success">
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Total Biaya</th>
                        <th scope="col">Rp. {{ number_format(($detailTransaksi->supir ? 100000 : 0) + $bbm + $hargaSewaPerDurasi + ($detailTransaksi->pengembalian->denda)) }}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-5 mx-3">
            <div>
                <a href="{{ route('laporan-transaksi.pdf', $detailTransaksi->id) }}" class="btn btn-sm btn-primary">Cetak</a>
            </div>
       </div>

       @if ($detailTransaksi->pengembalian->denda !== 0)
            @if ($detailTransaksi->kendaraan->kategori == 'mobil')
                <div class="mt-5">
                    <p class="text-danger">*Note : Jika telat waktu pengembalian akan di denda Rp. 10.000/ jam</p>
                </div>
            @else 
                <div class="mt-5">
                    <p class="text-danger">*Note : Jika telat waktu pengembalian akan di denda Rp. 5.000/ jam</p>
                </div>
            @endif
       @endif

    </div>
</div>
@endsection