@extends('admin.layouts.main')
@section('content')
<div class="mx-5 my-5">
    <a href="{{ route('pengembalian.index') }}" class="text-secondary">
        <h6 class="m-0 font-weight-bold"><i class="fas fa-chevron-left"></i> Kembali</h6>
    </a>
</div>

<div class="card shadow mt-3 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pengembalian</h6>
    </div>

    @if ($errors->any())
        <div class="p-3">
            <div class="alert alert-danger mb-0">
                <div class="text-red-600">
                    {{ __('Kode Reservasi yang anda masukkan tidak valid.') }}
                </div>
            </div>
        </div>
    @endif

    <div class="card-body">

        <p>Tanggal : {{ date('d-m-Y', strtotime($tanggalPengembalian)) }}</p>
        <p>Jam : {{ date('H:i', strtotime($tanggalPengembalian)) }} WIB</p>

        <form action="{{ route('pengembalian.store') }}" method="post" class="mt-4">
            @csrf
            <input type="hidden" name="peminjaman_id" id="peminjaman_id">
            <div class="form-group">
                <input type="text" class="form-control @error('kode_reservasi') is-invalid @enderror" id="kode_reservasi" name="kode_reservasi" placeholder="Masukkan Kode Reservasi" required autofocus>
                @error('kode_reservasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div id="kendaraan"></div>
            <button type="submit" class="btn btn-primary ">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        $('#kode_reservasi').keyup(function(){
            var id = $(this).val();
            var url = "{{ route('peminjaman.json', ':id') }}";
            url=url.replace(':id',id);
            
            $('#kendaraan').html('');
            
            $.get( url, function( data ) {
                $('#peminjaman_id').val(data.id);
               
                $('#kendaraan').html(`
                    <div class="my-3 alert-info">
                        <p class="p-2"> Nama Kendaraan : `+data.kendaraan.tipe+`</p>    
                    </div>
                `);
            });
        });
    </script>
@endpush