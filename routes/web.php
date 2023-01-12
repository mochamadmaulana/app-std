<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function (){
    Route::get('service-menu', [\App\Http\Controllers\ServiceMenuController::class, 'index'])->name('service.menu');

    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::get('dashboard', \App\Http\Controllers\Inventory\DashboardController::class)->name('dashboard');
        Route::resource('supplier', \App\Http\Controllers\Inventory\SupplierController::class);
        Route::resource('barang-masuk', \App\Http\Controllers\Inventory\BarangMasukController::class);
        Route::resource('satuan-barang', \App\Http\Controllers\Inventory\SatuanBarangController::class);
    });

    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::get('dashboard', \App\Http\Controllers\Pengaturan\DashboardController ::class)->name('dashboard');
        Route::resource('karyawan', \App\Http\Controllers\Pengaturan\KaryawanController::class);
        Route::resource('jabatan', \App\Http\Controllers\Pengaturan\JabatanController::class)->except('show');
    });
});
