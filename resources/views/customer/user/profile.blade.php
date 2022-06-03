@extends('customer.layouts.main')
@section('content')
<section class="bg-body masthead">
    
    <div class="container px-5">
        @if (session()->has('success'))
            <div class="alert alert-success mb-5" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row d-flex  align-items-center justify-content-center">  
            <img src="{{ auth()->user()->foto ? asset('storage/images/'.auth()->user()->foto) : asset('template-customer/assets/img/profile.png') }}" alt="" class="img-preview profile-picture">
            <div class="text-center">
                <label for="foto" class="btn btn-sm outline-darkblue-custom mt-3">Upload Foto Profile</label>
            </div>
        </div>
        <div class="mt-5">
            <div class="row d-flex  align-items-center justify-content-center"> 
                <div class="col-md-8">
                    <form action="{{ route('user.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('put')
                    <input style="opacity: 0%;" type="file" id="foto" name="foto" onchange="previewImage()">
                        <div class="py-1 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', auth()->user()->nama) }}">
                            @error('nama')
                                <div class="is-invalid text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="py-1 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <div class="is-invalid text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="py-1 mb-3">
                            <label for="no_hp" class="form-label">No. HP</label>
                            <input type="number" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp', auth()->user()->no_hp) }}">
                            @error('no_hp')
                                <div class="is-invalid text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="py-1 mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" type="text" style="height: 5rem">{{ auth()->user()->alamat }}</textarea>
                            @error('alamat')
                                <div class="is-invalid text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex float-end">
                            <div class="mx-3">
                                <a href="{{ route('home') }}" class="btn btn-sm text-dark outline-dark-custom mt-3">Batal</a>
                                <button type="submit" class="btn btn-sm text-white bg-darkblue-custom mt-3">Update</button>
                            </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush