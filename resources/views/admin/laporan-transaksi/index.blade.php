@extends('admin.layouts.main')
@section('content')

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800">Laporan Transaksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Reservasi</th>
                            <th>Pelanggan</th>
                            <th>Biaya</th>
                            <th>Denda</th>
                            <th>Total</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $item->kode_reservasi }}</td>
                                <td>{{ $item->peminjaman->user->nama }}</td>
                                <td id="biaya-{{ $key }}"></td>
                                <td>Rp. {{ number_format($item->denda) }}</td>
                                <td id="total-{{ $key }}"></td>
                                <td>
                                    <a href="{{ route('laporan-transaksi.show', $item->peminjaman_id) }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm rounded-circle border-0">
                                        <i class="fas fa-info-circle fa-sm text-white-100"></i> 
                                    </a>
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

@push('script')
    <script>
        var url = "{{ route('pengembalian.json') }}";
        
        $.get( url, function( data ) {
            $.each(data, function( index, value ) {
                
                let harga = value.peminjaman.kendaraan.harga_sewa[0].harga;
                let keterangan = value.peminjaman.kendaraan.harga_sewa[0].keterangan;
                let waktu = value.peminjaman.durasi_peminjaman;
                let denda = value.denda;
                let supir = value.peminjaman.supir;
                let bbm = value.peminjaman.bbm;

                let biayaPerHariMobil = ((harga / 24) * waktu) + (supir == 1 ? 100000 : 0) + (bbm == 1 ? 100000 : 0);
                let biayaPerjamMobil = (harga * waktu) + (supir == 1 ? 100000 : 0) + (bbm == 1 ? 100000 : 0);

                let biayaPerHariMotor = ((harga / 24) * waktu) + (bbm == 1 ? 50000 : 0);
                let biayaPerjamMotor = (harga * waktu) + (bbm == 1 ? 50000 : 0);


                if (value.peminjaman.kendaraan.kategori == 'mobil') { 
                    if (keterangan == 'per hari') {
                        $(`#biaya-`+index).html(`
                            <p>Rp. `+ biayaPerHariMobil.toLocaleString('en-US') +`</p>
                        `);

                        let total = biayaPerHariMobil + denda;

                        $(`#total-`+index).html(`
                            <p>Rp. `+ total.toLocaleString('en-US') +`</p>
                        `);
                    } else {
                        $(`#biaya-`+index).html(`
                            <p>Rp. `+ biayaPerjamMobil.toLocaleString('en-US') +`</p>
                        `);

                        let total = biayaPerjamMobil + denda;

                        $(`#total-`+index).html(`
                            <p>Rp. `+ total.toLocaleString('en-US') +`</p>
                        `);
                    }
                } else {
                    if (keterangan == 'per hari') {
                        $(`#biaya-`+index).html(`
                            <p>Rp. `+ biayaPerHariMotor.toLocaleString('en-US') +`</p>
                        `);

                        let total = biayaPerHariMotor + denda;

                        $(`#total-`+index).html(`
                            <p>Rp. `+ total.toLocaleString('en-US') +`</p>
                        `);
                    } else {
                        $(`#biaya-`+index).html(`
                            <p>Rp. `+ biayaPerjamMotor.toLocaleString('en-US') +`</p>
                        `);

                        let total = biayaPerjamMotor + denda;

                        $(`#total-`+index).html(`
                            <p>Rp. `+ total.toLocaleString('en-US') +`</p>
                        `);
                    }
                }

            });
        });
    </script>
@endpush