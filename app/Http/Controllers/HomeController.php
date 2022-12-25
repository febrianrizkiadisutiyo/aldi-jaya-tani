<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKeluar;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // //total stok
        // $produk = DB::table('produks')
        //         ->sum('produks.stok');
        // //jumlah produk masuk
        // $produkMasuk = DB::table('produk_masuks')
        // ->sum('produk_masuks.jumlah_masuk');
        //  //jumlah produk keluar
        //  $produkKeluar = DB::table('produk_keluars')
        //  ->sum('produk_keluars.jumlah_keluar');
        $produk = Produk::sum('stok');
        $produkMasuk = ProdukMasuk::sum('jumlah_masuk');
        $produkKeluar = ProdukKeluar::sum('jumlah_keluar');

        $masuk_jan = ProdukMasuk::whereMonth('tanggal_masuk', '01')->sum('jumlah_masuk');
        $masuk_feb = ProdukMasuk::whereMonth('tanggal_masuk', '02')->sum('jumlah_masuk');
        $masuk_mar = ProdukMasuk::whereMonth('tanggal_masuk', '03')->sum('jumlah_masuk');
        $masuk_apr = ProdukMasuk::whereMonth('tanggal_masuk', '04')->sum('jumlah_masuk');
        $masuk_mei = ProdukMasuk::whereMonth('tanggal_masuk', '05')->sum('jumlah_masuk');
        $masuk_jun = ProdukMasuk::whereMonth('tanggal_masuk', '06')->sum('jumlah_masuk');
        $masuk_jul = ProdukMasuk::whereMonth('tanggal_masuk', '07')->sum('jumlah_masuk');
        $masuk_agu = ProdukMasuk::whereMonth('tanggal_masuk', '08')->sum('jumlah_masuk');
        $masuk_sep = ProdukMasuk::whereMonth('tanggal_masuk', '09')->sum('jumlah_masuk');
        $masuk_okt = ProdukMasuk::whereMonth('tanggal_masuk', '10')->sum('jumlah_masuk');
        $masuk_nov = ProdukMasuk::whereMonth('tanggal_masuk', '11')->sum('jumlah_masuk');
        $masuk_des = ProdukMasuk::whereMonth('tanggal_masuk', '12')->sum('jumlah_masuk');

        $keluar_jan = ProdukKeluar::whereMonth('tanggal_keluar', '01')->sum('jumlah_keluar');
        $keluar_feb = ProdukKeluar::whereMonth('tanggal_keluar', '02')->sum('jumlah_keluar');
        $keluar_mar = ProdukKeluar::whereMonth('tanggal_keluar', '03')->sum('jumlah_keluar');
        $keluar_apr = ProdukKeluar::whereMonth('tanggal_keluar', '04')->sum('jumlah_keluar');
        $keluar_mei = ProdukKeluar::whereMonth('tanggal_keluar', '05')->sum('jumlah_keluar');
        $keluar_jun = ProdukKeluar::whereMonth('tanggal_keluar', '06')->sum('jumlah_keluar');
        $keluar_jul = ProdukKeluar::whereMonth('tanggal_keluar', '07')->sum('jumlah_keluar');
        $keluar_agu = ProdukKeluar::whereMonth('tanggal_keluar', '08')->sum('jumlah_keluar');
        $keluar_sep = ProdukKeluar::whereMonth('tanggal_keluar', '09')->sum('jumlah_keluar');
        $keluar_okt = ProdukKeluar::whereMonth('tanggal_keluar', '10')->sum('jumlah_keluar');
        $keluar_nov = ProdukKeluar::whereMonth('tanggal_keluar', '11')->sum('jumlah_keluar');
        $keluar_des = ProdukKeluar::whereMonth('tanggal_keluar', '12')->sum('jumlah_keluar');

        return view('home', 
        compact('produk',
        'produkMasuk',
        'produkKeluar',

        'masuk_jan',
        'masuk_feb',
        'masuk_mar',
        'masuk_apr',
        'masuk_mei',
        'masuk_jun',
        'masuk_jul',
        'masuk_agu',
        'masuk_sep',
        'masuk_okt',
        'masuk_nov',
        'masuk_des',

        'keluar_jan',
        'keluar_feb',
        'keluar_mar',
        'keluar_apr',
        'keluar_mei',
        'keluar_jun',
        'keluar_jul',
        'keluar_agu',
        'keluar_sep',
        'keluar_okt',
        'keluar_nov',
        'keluar_des',
        ));  
    }
}
