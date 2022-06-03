@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-4">
                <h3 class="lh-1 mb-4 text-center">Daftar Mobil</h3>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <form action="{{ route('sewa-mobil.index') }}">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Masukan Kata Kunci...." value="{{ request('cari') }}">
                            <span class="input-group-btn">
                                <button class="btn bg-darkblue-custom text-white" type="submit">Cari</button>
                            </span>
                        </div>
                    </form>
                </div>    
            </div>                
        </div>
        <div class="container my-5 pt-3">
            <div class="row">
                @foreach ($kendaraan as $item)
                    <div class="col-md-3 mb-5">
                        <div class="text-center">
                            <img src="{{ asset('storage/images/'. $item->foto) }}" alt="..." class="sewa-picture" />
                            <h4 class="mt-3">{{ $item->nama_merk }} - {{ $item->tipe }}</h4>
                            <p class="text-muted mb-0">
                                Harga sewa mulai dari <br>
                                <strong>Rp. {{ number_format($item->harga) }}</strong> / {{ $item->keterangan }}
                            </p>
                            <a class="btn btn-sm bg-darkblue-custom text-white rounded-pill mt-2" href="{{ route('sewa-mobil.pesan', $item->id) }}">Pesan</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5">
            {{ $kendaraan->links() }}
        </div>
    </div>
</section>
@endsection