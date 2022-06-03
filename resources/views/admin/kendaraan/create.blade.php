@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('kendaraan.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow my-3 mb-5 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kendaraan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('kendaraan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="custom-select  @error('kategori') is-invalid @enderror" name="kategori" id="kategori" required>
                    <option selected disabled>Pilih Kategori</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select> 
                @error('kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror   
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="merk_id">Merk Kendaraan</label>
                        <select class="custom-select merk_id @error('merk_id') is-invalid @enderror" id="merk_id" name="merk_id" required>
                            <option selected disabled>Pilih Merk</option>
                        </select>
                        @error('merk_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror  
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipe">Tipe Kendaraan</label>
                        <input type="text" class="form-control @error('tipe') is-invalid @enderror" id="tipe" name="tipe" value="{{ old('tipe') }}" placeholder="Masukkan Tipe Kendaraan" required>
                        @error('tipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_polisi">No. Polisi</label>
                        <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" id="no_polisi" name="no_polisi" value="{{ old('no_polisi') }}" placeholder="Masukkan No. Polisi" required>
                        @error('no_polisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahun">Tahun Kendaraan</label>
                        <select class="custom-select @error('tahun') is-invalid @enderror" id="tahun" name="tahun" required>
                            <option selected disabled>Pilih Tahun</option>
                        </select>
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="warna">Warna Kendaraan</label>
                        <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" value="{{ old('warna') }}" placeholder="Masukkan Warna Kendaraan" required>
                        @error('warna')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kapasitas_penumpang">Kapasitas Penumpang</label>
                        <input type="number" class="form-control @error('kapasitas_penumpang') is-invalid @enderror" id="kapasitas_penumpang" name="kapasitas_penumpang" value="{{ old('kapasitas_penumpang') }}" placeholder="Masukkan Kapasitas Penumpang" required>
                        @error('kapasitas_penumpang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_mesin">No. Mesin Kendaraan</label>
                        <input type="text" class="form-control @error('no_mesin') is-invalid @enderror" id="no_mesin" name="no_mesin" value="{{ old('no_mesin') }}" placeholder="Masukkan No. Mesin Kendaraan" required>
                        @error('no_mesin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_rangka">No. Rangka Kendaraan</label>
                        <input type="text" class="form-control @error('no_rangka') is-invalid @enderror" id="no_rangka" name="no_rangka" value="{{ old('no_rangka') }}" placeholder="Masukkan No. Rangka Kendaraan" required>
                        @error('no_rangka')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_bbm">Jenis BBM Kendaraan</label>
                        <input type="text" class="form-control @error('jenis_bbm') is-invalid @enderror" id="jenis_bbm" name="jenis_bbm" value="{{ old('jenis_bbm') }}" placeholder="Masukkan Jenis BBM Kendaraan" required>
                        @error('jenis_bbm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kapasitas_bbm">Kapasitas BBM Kendaraan</label>
                        <input type="number" class="form-control @error('kapasitas_bbm') is-invalid @enderror" id="kapasitas_bbm" name="kapasitas_bbm" value="{{ old('kapasitas_bbm') }}" placeholder="Masukkan Kapasitas BBM Kendaraan" required>
                        @error('kapasitas_bbm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group pt-3">
                <label for="foto">Foto Kendaraan</label>
                <input type="file" class=" @error('foto') is-invalid @enderror" id="foto" name="foto" required onchange="previewImage()">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row d-flex  align-items-center justify-content-center pt-5">  
                <img src="{{ asset('template-admin/img/no-image.jpg') }}" alt="" class="img-preview tambah-kendaraan">
            </div>
            
            <button type="submit" class="btn btn-primary my-5 ml-5">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
            $('#kategori').change(function(){
                var id = $(this).val();
                var url = "{{ route('get.merk', ':id') }}";
                url=url.replace(':id',id);

                $.get( url, function( data ) {
                    $('.merk_id').html(data);
                });
            });
        
            // get year
            const yearSelect = document.getElementById("tahun");
            function poutaleYear(){
                let year = new Date().getFullYear();

                for(let i = 0; i < 51; i++){
                    const option = document.createElement("option");
                    option.textContent = year - i;
                    yearSelect.appendChild(option);
                }
            }

            poutaleYear();

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