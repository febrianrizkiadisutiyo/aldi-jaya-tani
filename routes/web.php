<?php

use App\Models\satuanProduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProdukMasukController;
use App\Http\Controllers\laporanMasukController;
use App\Http\Controllers\ProdukKeluarController;
use App\Http\Controllers\satuanProdukController;
use App\Http\Controllers\laporanKeluarController;
use App\Http\Controllers\laporanProdukController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/coba', function () {
    return view('coba');
});
Route::group(['middleware' => ['auth', 'hakakses:pemilikToko,karyawan']], function () {
    //crud Produk
    Route::get('/create_produk', [ProdukController::class, 'create']);
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/store_produk', [ProdukController::class, 'store']);
    Route::get('/edit_produk/{id}', [ProdukController::class, 'edit']);
    Route::put('/update_produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/delete_produk/{id}', [ProdukController::class, 'destroy']);

    //crud satuanProduk
    Route::get('/satuanProduk', [satuanProdukController::class, 'index']);
    Route::get('/create_satuan', [satuanProdukController::class, 'create']);
    Route::post('/store_satuan', [satuanProdukController::class, 'store']);
    Route::get('/edit_satuan/{id}', [satuanProdukController::class, 'edit']);
    Route::put('/update_satuan/{id}', [satuanProdukController::class, 'update']);
    Route::delete('/delete_satuan/{id}', [satuanProdukController::class, 'destroy']);
    //produk Masuk
    Route::get('/produkMasuk', [ProdukMasukController::class, 'index']);
    Route::get('/create_produkMasuk', [ProdukMasukController::class, 'create']);
    Route::post('/store_produkMasuk', [ProdukMasukController::class, 'store']);
    //produk Keluar
    Route::get('/produkKeluar', [ProdukKeluarController::class, 'index']);
    Route::get('/create_produkKeluar', [ProdukKeluarController::class, 'create']);
    Route::post('/store_produkKeluar', [ProdukKeluarController::class, 'store']);
});

// Route::get('/produkMasuk/ajax', [ProdukMasukController::class,'ajax']);

Route::group(['middleware' => ['auth', 'hakakses:pemilikToko']], function () {
    
    //laporan Produk
    Route::get('/laporanProduk', [laporanProdukController::class, 'index']);
    Route::get('/cetaklaporanProduk', [laporanProdukController::class, 'cetak']);
    Route::get('/excellaporanProduk', [laporanProdukController::class, 'excel']);
    //laporan Produk Masuk
    Route::get('/laporanMasuk', [laporanMasukController::class, 'index']);
    Route::get('/cetaklaporanMasuk/{tgl_awal}/{tgl_akhir}', [laporanMasukController::class, 'cetakPertanggal']);
    Route::get('/excellaporanMasuk', [laporanMasukController::class, 'excel']);
    //laporan Produk Keluar
    Route::get('/laporanKeluar', [laporanKeluarController::class, 'index']);
    Route::get('/cetaklaporanKeluar/{tgl_awal}/{tgl_akhir}', [laporanKeluarController::class, 'cetakPertanggal']);

    //hapus produk masuk dan keluar
    Route::delete('/delete_produkMasuk/{id}', [ProdukMasukController::class, 'destroy']);
    Route::delete('/delete_produkKeluar/{id}', [ProdukKeluarController::class, 'destroy']);
});

//transaksi
// Route::get('/transaksi', [TransaksiController::class,'index']);
// Route::get('/transaksi/ajax', [TransaksiController::class,'ajax']);
// Route::get('/create_transaksi', [TransaksiController::class,'create']);
// Route::post('/store_transaksi', [TransaksiController::class,'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
