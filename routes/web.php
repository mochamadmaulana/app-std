<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function (){

    Route::get('beranda', \App\Http\Controllers\BerandaController::class)->name('beranda.index');

    Route::get('logout', \App\Http\Controllers\LogoutController::class)->name('logout');

    Route::prefix('data-master')->name('data-master.')->group(function () {
        Route::resource('satuan-produk', \App\Http\Controllers\DataMaster\SatuanProdukController::class);
        Route::resource('kategori-produk', \App\Http\Controllers\DataMaster\KategoriProdukController::class);
        Route::resource('bank', \App\Http\Controllers\DataMaster\BankController::class);
        Route::resource('termin', \App\Http\Controllers\DataMaster\TerminController::class);
        Route::resource('role', \App\Http\Controllers\DataMaster\RoleController::class);
        Route::resource('akses', \App\Http\Controllers\DataMaster\AksesController::class);
        Route::resource('jabatan-pegawai', \App\Http\Controllers\DataMaster\JabatanPegawaiController::class);
    });

    Route::resource('rekening-bank', \App\Http\Controllers\RekeningBankController::class);

    Route::resource('pembelian', \App\Http\Controllers\PembelianController::class);

    Route::resource('pegawai', \App\Http\Controllers\PegawaiController::class);

    Route::resource('pemasok', \App\Http\Controllers\PemasokController::class);

    Route::resource('produk', \App\Http\Controllers\ProdukController::class);

    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::resource('role-akses', \App\Http\Controllers\Pengaturan\RoleAksesController::class);
    });
});
