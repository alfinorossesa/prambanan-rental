@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('pengembalian.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pengembalian</h6> 
    </div>

    <div class="p-5">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kode Reservasi</td>
                    <td><a href="{{ route('peminjaman.show', $pengembalian->peminjaman_id) }}" style="text-decoration: underline;">{{ $pengembalian->kode_reservasi }}</a></td>
                </tr>
                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td>{{ date('d-m-Y', strtotime($pengembalian->peminjaman->tanggal_peminjaman)) }} / {{ date('H:i', strtotime($pengembalian->peminjaman->jam_peminjaman)) }} WIB</td>
                </tr>
                <tr>
                    <td>Durasi Peminjaman</td>
                    <td>{{ $pengembalian->peminjaman->durasi_peminjaman }} Jam</td>
                </tr>
                <tr class="alert-info">
                    <td>Aturan Dikembalikan Tanggal</td>
                    <td>{{ date('d-m-Y', strtotime($tanggalPengembalian)) }} / {{ date('H:i', strtotime($tanggalPengembalian)) }} WIB</td>
                </tr>
                <tr>
                    <td>Dikembalikan Tanggal</td>
                    <td class="{{ $pengembalian->denda == 0 ? 'text-success' : 'text-danger' }}">{{ date('d-m-Y', strtotime($pengembalian->tanggal_pengembalian)) }} / {{ date('H:i', strtotime($pengembalian->tanggal_pengembalian)) }} WIB</td>
                </tr>

                @if ($pengembalian->denda !== 0)
                    <tr>
                        <td>Telat Pengembalian</td>
                        <td>{{ ($telat->d * 24) + $telat->h }} Jam</td>
                    </tr>
                    <tr>
                        <td>Denda</td>
                        <td>Rp. {{ number_format($pengembalian->denda) }}</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if ($pengembalian->denda !== 0)
            @if ($pengembalian->peminjaman->kendaraan->kategori == 'mobil')
                <div class="p-4">
                    <h6 class="text-danger">*Note : Jika telat waktu pengembalian akan di denda Rp. 10,000 / jam</h6>
                </div>
            @else   
                <div class="p-4">
                    <h6 class="text-danger">*Note : Jika telat waktu pengembalian akan di denda Rp. 5,000 / jam</h6>
                </div>
            @endif
        @else
            <div class="mt-4">
                <h6 class="p-2 alert-success text-success font-weight-bold">Pengembalian Tepat Waktu!</h6>
            </div>
        @endif
    </div>
    
</div>
@endsection