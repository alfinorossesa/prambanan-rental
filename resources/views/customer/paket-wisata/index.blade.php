@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-4">
                <h3 class="lh-1 mb-4 text-center">Daftar Paket Wisata</h3>
            </div>                
        </div>
        <div class="container my-5 pt-3">
            <div class="row">
                @foreach ($paketWisata as $item)
                    <div class="col-md-6 mb-5">
                        <div class="row">
                            <img src="{{ asset('storage/images/'. $item->foto) }}" alt="..." style="width: 210px; height: 300px;" />
                            <div class="col-md-4">
                                <h4 class="mt-3">{{ $item->nama_paket }}</h4>
                                <p class="text-muted">
                                    Harga : <strong>Rp. {{ number_format($item->harga) }}</strong>
                                    Tujuan : {{ $item->tujuan }}
                                </p>
                                <p class="text-muted mb-0">
                                    Fasilitas : @foreach ($item['fasilitas'] as $i)
                                                    <li class="text-muted">{{ $i['fasilitas'] }}</li>
                                                @endforeach
                                </p>
                                <a class="btn btn-sm bg-darkblue-custom text-white rounded-pill mt-2" href="{{ route('paket-wisata.pesan', $item->id) }}">Pesan</a>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5">
            {{ $paketWisata->links() }}
        </div>
    </div>
</section>
@endsection