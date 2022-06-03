<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataPaketWisataController;
use App\Http\Controllers\Admin\DataPeminjamanController;
use App\Http\Controllers\Admin\DataPengembalianController;
use App\Http\Controllers\Admin\DataTransaksiPaketWisataController;
use App\Http\Controllers\Admin\HargaSewaController;
use App\Http\Controllers\Admin\JsonController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\LaporanTransaksiController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\PelangganController;
use App\Http\Controllers\Admin\SupirController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\KontakKamiController;
use App\Http\Controllers\Customer\PaketWisataController;
use App\Http\Controllers\Customer\SewaMobilController;
use App\Http\Controllers\Customer\SewaMotorController;
use App\Http\Controllers\Customer\TestimoniController;
use App\Http\Controllers\Customer\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', CustomerController::class, 'index')->name('home');

Route::get('sewa-mobil', [SewaMobilController::class, 'index'])->name('sewa-mobil.index');

Route::get('sewa-motor', [SewaMotorController::class, 'index'])->name('sewa-motor.index');
    
Route::get('paket-wisata', [PaketWisataController::class, 'index'])->name('paket-wisata.index');

Route::get('kontak-kami', [KontakKamiController::class, 'index'])->name('kontak-kami.index');

Route::middleware('auth')->group(function(){
    Route::group(['prefix' => 'profile', 'as' => 'user.'], function(){
        Route::get('/{user}', [UserController::class, 'profile'])->name('profile');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::get('/{user}/pemesanan', [UserController::class, 'pemesanan'])->name('pemesanan');
        Route::get('/{user}/pemesanan/{peminjaman}/detail', [UserController::class, 'detail'])->name('pemesanan-detail');
        Route::get('/{user}/pemesanan/{paketWisata}/detail-paket-wisata', [UserController::class, 'detailPaketWisata'])->name('pemesanan-detailPaketWisata');
    });
    
    Route::group(['prefix' => 'sewa-mobil', 'as' => 'sewa-mobil.'], function(){
        Route::get('/{kendaraan}/pesan', [SewaMobilController::class, 'pesan'])->name('pesan');
        Route::post('/{kendaraan}/pesan', [SewaMobilController::class, 'store'])->name('store');
        Route::get('/{sewa}/biaya', [SewaMobilController::class, 'biaya'])->name('biaya');
        Route::get('/{sewa}/pdf', [SewaMobilController::class, 'pdf'])->name('pdf');
    });
    
    Route::group(['prefix' => 'sewa-motor', 'as' => 'sewa-motor.'], function(){
        Route::get('/{kendaraan}/pesan', [SewaMotorController::class, 'pesan'])->name('pesan');
        Route::post('/{kendaraan}/pesan', [SewaMotorController::class, 'store'])->name('store');
        Route::get('/{sewa}/biaya', [SewaMotorController::class, 'biaya'])->name('biaya');
        Route::get('/{sewa}/pdf', [SewaMotorController::class, 'pdf'])->name('pdf');
    });

    Route::group(['prefix' => 'paket-wisata', 'as' => 'paket-wisata.'], function(){
        Route::get('/{paketWisata}/pesan', [PaketWisataController::class, 'pesan'])->name('pesan');
        Route::post('/{paketWisata}/pesan', [PaketWisataController::class, 'store'])->name('store');
        Route::get('/{paketWisata}/biaya', [PaketWisataController::class, 'biaya'])->name('biaya');
        Route::get('/{paketWisata}/pdf', [PaketWisataController::class, 'pdf'])->name('pdf');
    });

    Route::group(['prefix' => 'testimoni', 'as' => 'testimoni.'], function(){
        Route::get('/', [TestimoniController::class, 'index'])->name('index');
        Route::post('/', [TestimoniController::class, 'store'])->name('store');
    });
    
});


Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('dashboard-admin', DashboardAdminController::class)->name('dashboard.admin');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
        Route::get('/{admin}/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/{admin}/profile', [AdminController::class, 'update'])->name('update');
    });
    
    Route::group(['prefix' => 'data-admin', 'as' => 'data-admin.'], function(){
        Route::get('/', [DataAdminController::class, 'index'])->name('index');
        Route::get('/create', [DataAdminController::class, 'create'])->name('create');
        Route::post('/create', [DataAdminController::class, 'store'])->name('store');
        Route::get('/{user}', [DataAdminController::class, 'show'])->name('show');
        Route::delete('/{user}', [DataAdminController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'merk', 'as' => 'merk.'], function(){
        Route::get('/', [MerkController::class, 'index'])->name('index');
        Route::get('/create', [MerkController::class, 'create'])->name('create');
        Route::post('/create', [MerkController::class, 'store'])->name('store');
        Route::get('/{merk}/edit', [MerkController::class, 'edit'])->name('edit');
        Route::put('/{merk}', [MerkController::class, 'update'])->name('update');
        Route::delete('/{merk}', [MerkController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'kendaraan', 'as' => 'kendaraan.'], function(){
        Route::get('/', [KendaraanController::class, 'index'])->name('index');
        Route::get('/create', [KendaraanController::class, 'create'])->name('create');
        Route::post('/create', [KendaraanController::class, 'store'])->name('store');
        Route::get('/{kendaraan}', [KendaraanController::class, 'show'])->name('show');
        Route::get('/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('edit');
        Route::put('/{kendaraan}', [KendaraanController::class, 'update'])->name('update');
        Route::delete('/{kendaraan}', [KendaraanController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'supir', 'as' => 'supir.'], function(){
        Route::get('/', [SupirController::class, 'index'])->name('index');
        Route::get('/create', [SupirController::class, 'create'])->name('create');
        Route::post('/create', [SupirController::class, 'store'])->name('store');
        Route::get('/{supir}', [SupirController::class, 'edit'])->name('edit');
        Route::put('/{supir}', [SupirController::class, 'update'])->name('update');
        Route::delete('/{supir}', [SupirController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'harga-sewa', 'as' => 'harga-sewa.'], function(){
        Route::get('/', [HargaSewaController::class, 'index'])->name('index');
        Route::get('/create', [HargaSewaController::class, 'create'])->name('create');
        Route::post('/create', [HargaSewaController::class, 'store'])->name('store');
        Route::get('/{hargaSewa}', [HargaSewaController::class, 'edit'])->name('edit');
        Route::put('/{hargaSewa}', [HargaSewaController::class, 'update'])->name('update');
        Route::delete('/{hargaSewa}', [HargaSewaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'pelanggan', 'as' => 'pelanggan.'], function(){
        Route::get('/', [PelangganController::class, 'index'])->name('index');
        Route::get('/{user}', [PelangganController::class, 'show'])->name('show');
        Route::delete('/{user}', [PelangganController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'peminjaman', 'as' => 'peminjaman.'], function(){
        Route::get('/', [DataPeminjamanController::class, 'index'])->name('index');
        Route::get('/{peminjaman}/detail', [DataPeminjamanController::class, 'show'])->name('show');
    });

    Route::group(['prefix' => 'pengembalian', 'as' => 'pengembalian.'], function(){
        Route::get('/', [DataPengembalianController::class, 'index'])->name('index');
        Route::get('/create', [DataPengembalianController::class, 'create'])->name('create');
        Route::post('/create', [DataPengembalianController::class, 'store'])->name('store');
        Route::get('/{pengembalian}/detail', [DataPengembalianController::class, 'show'])->name('show');
    });
    
    Route::group(['prefix' => 'laporan-transaksi', 'as' => 'laporan-transaksi.'], function(){
        Route::get('/', [LaporanTransaksiController::class, 'index'])->name('index');
        Route::get('/{id}/detail', [LaporanTransaksiController::class, 'show'])->name('show');
        Route::get('/{id}/pdf', [LaporanTransaksiController::class, 'pdf'])->name('pdf');
    });

    Route::group(['prefix' => 'data-paket-wisata', 'as' => 'data-paket-wisata.'], function(){
        Route::get('/', [DataPaketWisataController::class, 'index'])->name('index');
        Route::get('/create', [DataPaketWisataController::class, 'create'])->name('create');
        Route::post('/create', [DataPaketWisataController::class, 'store'])->name('store');
        Route::get('/{paketWisata}/edit', [DataPaketWisataController::class, 'edit'])->name('edit');
        Route::put('/{paketWisata}/edit', [DataPaketWisataController::class, 'update'])->name('update');
        Route::get('/{paketWisata}/detail', [DataPaketWisataController::class, 'show'])->name('show');
        Route::delete('/{paketWisata}/delete', [DataPaketWisataController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'transaksi/paket-wisata', 'as' => 'transaksi-paket-wisata.'], function(){
        Route::get('/', [DataTransaksiPaketWisataController::class, 'index'])->name('index');
        Route::get('/{paketWisata}/detail', [DataTransaksiPaketWisataController::class, 'show'])->name('show');
        Route::get('/{paketWisata}/pdf', [DataTransaksiPaketWisataController::class, 'pdf'])->name('pdf');
    });
    
    Route::get('peminjaman/{peminjaman}/get', [JsonController::class, 'peminjamanJson'])->name('peminjaman.json');
    Route::get('pengembalian/get', [JsonController::class, 'pengembalianJson'])->name('pengembalian.json');
    Route::get('merk/{kategori}/get', [JsonController::class, 'getMerk'])->name('get.merk');
    Route::get('kendaraan/{id}/get', [JsonController::class, 'kendaraanJson'])->name('kendaraan.json');
});


