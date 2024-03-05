<?php

use App\Http\Controllers\barangController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\pembatalanController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\penerimaanController;
use App\Http\Controllers\pengajuanController;
use App\Http\Controllers\pengeluaranController;
use App\Http\Controllers\supplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

// route table master
Route::resource('barang', barangController::class);

Route::resource('kategori', kategoriController::class);

Route::resource('divisi', divisiController::class);

Route::resource('supplier', supplierController::class);

// route table transaksi

// Route::resource('pengajuan', pengajuanController::class);

Route::resource('pengajuan', pengajuanController::class);

Route::get('/pengajuan/{id}/generate', [PengajuanController::class, 'generate'])->name('pengajuan.generate');

Route::get('/laporanPengajuan', [PengajuanController::class, 'cetakPengajuan'])->name('pengajuan.laporan');


Route::resource('pembatalan', pembatalanController::class);

Route::resource('penerimaan', penerimaanController::class);

Route::get('/laporanPenerimaan', [penerimaanController::class, 'cetakPenerimaan'])->name('penerimaan.laporan');

Route::resource('pembelian', pembelianController::class);

Route::get('/laporanPembelian', [pembelianController::class, 'cetakPembelian'])->name('pembelian.laporan');

// Route::resource('pengeluaran', pengeluaranController::class)`;
