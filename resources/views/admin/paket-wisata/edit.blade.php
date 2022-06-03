@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('data-paket-wisata.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Paket Wisata</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('data-paket-wisata.update', $paketWisata->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama_paket">Nama Paket Wisata</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $paketWisata->nama_paket) }}" placeholder="Masukkan Nama Paket" required>
                @error('nama_paket')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan', $paketWisata->tujuan) }}" placeholder="Masukkan Tujuan" required>
                @error('tujuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fasilitas">Fasilitas</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="fasilitas" placeholder="Masukkan Fasilitas">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-md btn-outline-dark" id="fasilitas-button">Tambah Fasilitas</button>
                    </div>
                </div>
            </div>
            <div class="form-group" id="select-fasilitas">
                <div class="col-md-8">
                    <select name="fasilitas[]" id="multipleselect" class="custom-select multipleselect @error('fasilitas') is-invalid @enderror" multiple aria-label="multiple select example" required>
                        @foreach ($paketWisata['fasilitas'] as $item)
                            <option value="{{ $item['fasilitas'] }}" selected>{{ $item['fasilitas'] }}</option>
                        @endforeach
                    </select>
                </div>
                @error('fasilitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4" cols="50" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $paketWisata->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $paketWisata->harga) }}" placeholder="Masukkan Harga" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group pt-3">
                <label for="foto">Foto Paket Wisata</label>
                <input type="file" class=" @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto', $paketWisata->foto) }}" onchange="previewImage()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row d-flex  align-items-center justify-content-center pt-5">  
                <img src="{{ $paketWisata->foto ? asset('storage/images/'.$paketWisata->foto) : asset('template-admin/img/no-image-vertical.jpg') }}" alt="" class="img-preview tambah-paket-wisata">
            </div>
            <button type="submit" class="btn btn-primary my-5 ml-5">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        let i = 0;
        $("#fasilitas-button").click(function () {
            i++;
            let fasilitas = $('#fasilitas').val();

            if (fasilitas !== '') {
                $("#multipleselect").append(`
                    <option selected>`+fasilitas+`</option>
                `);

                $('#select-fasilitas').show();
            }
            
            let asd = $('#fasilitas').val('');
        });

        // multiple
        $(".multipleselect").select2();

        // preview image
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