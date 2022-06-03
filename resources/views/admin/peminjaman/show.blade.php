@extends('admin.layouts.main')
@section('content')

<div class="mx-5 my-5">
    <a href="{{ route('peminjaman.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Peminjaman</h6>
    </div>
    <div class="card-body p-5">
        <div class="d-flex justify-content-center">
            <div class="mb-5">
                <img src="{{ asset('storage/images/'.$peminjaman->kendaraan->foto) }}" alt="photo" style="width: 460px; height:250px;">
            </div>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Tanggal Pemesanan</h6></td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_pemesanan)) }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kode Reservasi</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->kode_reservasi }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Pelanggan</h6></td>
                    <td>:</td>
                    <td><a href="{{ route('pelanggan.show', $peminjaman->user->id) }}" style="text-decoration: underline">{{ $peminjaman->user->nama }}</a></td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kartu Identitas</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->kartu_identitas }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">NIK</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->nik }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Jaminan</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->jaminan }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Kendaraan</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->kendaraan->merk->nama_merk }} - {{ $peminjaman->kendaraan->tipe }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Tanggal Peminjaman</h6></td>
                    <td>:</td>
                    <td>{{ date('d-m-Y', strtotime($peminjaman->tanggal_peminjaman)) }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Jam Peminjaman</h6></td>
                    <td>:</td>
                    <td>{{ date('H:i', strtotime($peminjaman->jam_peminjaman)) }} WIB</td>
                </tr>

                @if ($peminjaman->kendaraan->kategori == 'mobil')
                    <tr>
                        <td><h6 class="m-0 font-weight-bold">Supir</h6></td>
                        <td>:</td>
                        <td>{{ $peminjaman->supir ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                @endif
                
                <tr>
                    <td><h6 class="m-0 font-weight-bold">BBM</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->bbm ? 'Ya' : 'Tidak' }}</td>
                </tr>
                <tr>
                    <td><h6 class="m-0 font-weight-bold">Durasi Peminjaman</h6></td>
                    <td>:</td>
                    <td>{{ $peminjaman->durasi_peminjaman }} jam</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-5">
            <div class="my-3 alert-info p-3">
                <h6 class="m-0 font-weight-bold text-primary">Biaya Peminjaman</h6>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Harga Sewa Kendaraan</td>
                        <td>Rp. {{ number_format($peminjaman->kendaraan->hargaSewa[0]->harga) }} / {{ $peminjaman->kendaraan->hargaSewa[0]->keterangan }}</td>
                        <td>Rp. {{ number_format($hargaSewaPerDurasi) }}</td>
                    </tr>

                    @if ($peminjaman->kendaraan->kategori == 'mobil')
                        <tr>
                            <td>Biaya Supir</td>
                            <td>{{ $peminjaman->supir ? 'Ya' : 'Tidak' }}</td>
                            <td>Rp. {{ $peminjaman->supir == 1 ? number_format(100000) : number_format(0) }}</td>
                        </tr>
                    @endif
                    
                    <tr>
                        <td>Biaya BBM</td>
                        <td>{{ $peminjaman->bbm ? 'Ya' : 'Tidak' }}</td>
                        <td>Rp. {{ number_format($bbm) }}</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th></th>
                        <th>Harga Total</th>
                        <th>Rp. {{ number_format($total) }}</th> 
                    </tr>
                </thead>
            </table>
        </div>

        <div class="mt-5">
            <div class="my-3 alert-warning p-3">
                <h6 class="m-0 font-weight-bold text-dark">Aturan Dikembalikan Tanggal : {{ date('d-m-Y', strtotime($tanggalPengembalian)) }} / {{ date('H:i', strtotime($jamPengembalian)) }} WIB</h6>
            </div>

            @if ($peminjaman->pengembalian !== null)
                <div class="my-3 alert-success p-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        Pengembalian Status : Sudah - Tanggal 
                        {{ date('d-m-Y', strtotime($peminjaman->pengembalian->tanggal_pengembalian)) }} / {{ date('H:i', strtotime($peminjaman->pengembalian->tanggal_pengembalian)) }} WIB
                    </h6>
                </div>
            @else
                <div class="my-3 alert-danger p-3">
                    <h6 class="m-0 font-weight-bold text-danger">Pengembalian Status : Belum</h6>
                </div>
            @endif

        </div>
        
    </div>
</div>
@endsection