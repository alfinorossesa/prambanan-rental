@extends('customer.layouts.main')
@section('content')
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Rental mobil termurah.</h1>
                        <p class="lead fw-normal text-muted mb-5">Prambanan Rental merupakan aplikasi penyewan motor dan mobil. Tersedia juga paket wisata.</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="btn outline-darkblue-custom py-3 px-4 rounded-pill" href="#sewa-sekarang">Sewa Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="masthead-device-mockup">
                        <img src="{{ asset('template-customer/assets/img/logo.png') }}" alt="..." style="height: 30rem" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <aside class="text-center bg-darkblue-custom">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">"Kami juga menyediakan paket wisata"</div>
                    <img src="{{ asset('template-customer/assets/img/wisata-logo.png') }}" alt="..." style="width: 5rem" />
                </div>
            </div>
        </div>
    </aside>

    <section id="sewa-sekarang">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            @foreach ($kendaraan as $item)
                                <div class="col-md-6 mb-5 mt-3">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/images/'. $item->foto) }}" alt="..." class="sewa-picture" />
                                        <h4 class="mt-3">{{ $item->merk->nama_merk }} - {{ $item->tipe }}</h4>
                                        <p class="text-muted mb-0">
                                            Harga sewa mulai dari <br>
                                            Rp. {{ number_format($item->hargaSewa[0]->harga) }} / {{ $item->hargaSewa[0]->keterangan }}
                                        </p>
                                        <a class="btn btn-sm bg-darkblue-custom text-white rounded-pill mt-2" href="{{ route('sewa-mobil.pesan', $item->id) }}">Pesan</a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-md-4 mx-2"></div>
                                <div class="col-md-5 d-flex flex-column flex-lg-row align-items-center">
                                    <a class="btn outline-darkblue-custom px-4 rounded-pill" href="{{ route('sewa-mobil.index') }}">Lihat Selengkapnya</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-0">
                    <div class="features-device-mockup">
                        <img src="{{ asset('template-customer/assets/img/logo.webp') }}" alt="..." style="height: 30rem" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection