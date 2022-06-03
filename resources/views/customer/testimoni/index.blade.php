@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    <div class="container-fluid px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-md-4">
                <h3 class="lh-1 mb-4 text-center">Testimoni</h3>
            </div>                
        </div>
        <div class="container mt-5 pt-3">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('testimoni.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" value="{{ auth()->user()->nama }}" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <textarea id="testimoni" class="form-control @error('testimoni') is-invalid @enderror" name="testimoni" rows="4" cols="50" placeholder="Berikan Testimoni Anda">{{ old('testimoni') }}</textarea>
                            @error('testimoni')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex float-end">
                            <div class="mx-3">
                                <button type="submit" class="btn btn-sm text-white bg-darkblue-custom">Submit</button>
                            </div>
                       </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <div class="d-flex justify-content-center" style="height: 270px;">
                        <div class="vr"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    @foreach ($testimoni as $item)
                        <div class="px-3 pt-2 pb-3 mb-4" style="border: 1px solid rgb(204, 203, 203);">
                            {{-- <h6 class="text-muted" style="border-bottom: 1px solid rgb(204, 203, 203);">{{ $item->user->nama }}</h6> --}}
                            <div class="row mb-1"  style="border-bottom: 1px solid rgb(204, 203, 203);">
                                <div class="col-md-6">
                                    <h6 class="text-muted mb-1">{{ $item->user->nama }}</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h6 class="text-muted mb-0 mt-1" style="font-size: 12px">{{ $item->created_at->diffForHumans() }}</h6>
                                </div>
                            </div>
                            
                            <p class="text-muted">{{ $item->testimoni }}</p>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center pt-5">
                        {{ $testimoni->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection