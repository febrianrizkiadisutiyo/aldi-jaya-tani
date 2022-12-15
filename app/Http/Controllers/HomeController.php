<?php

namespace App\Http\Controllers;

use App\Models\Produk;
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
        //total stok
        $produk = DB::table('produks')
                ->sum('produks.stok');
        //jumlah produk masuk
        $produkMasuk = DB::table('produk_masuks')
        ->sum('produk_masuks.jumlah_masuk');
         //jumlah produk keluar
         $produkKeluar = DB::table('produk_keluars')
         ->sum('produk_keluars.jumlah_keluar');
        return view('home', compact('produk','produkMasuk','produkKeluar'));
        

        
    }
}
