@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-4">
                <h3 class="lh-1 mb-4 text-center">Kontak Kami</h3>
            </div>                
        </div>
        <div class="container my-5 pt-3 col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="my-4">Prambanan Rental</h4>
                    <h6 class="text-muted">WhatsApp : 0897 4567 0000</h6>
                    <h6 class="text-muted">No. Telepon : (0274) 884372</h6>
                    <h6 class="text-muted">Alamat : Jl. Sambiroto Gang Pucanganom 43 Yogyakarta</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="mb-3">Temukan kami di Google map :</h6>
                    <iframe width="450" height="300" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                    src="{{ $url }}">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection