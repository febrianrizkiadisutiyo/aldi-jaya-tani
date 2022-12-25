<?php

namespace App\Http\Controllers;

use App\Exports\laporanMasukExcel;
use App\Models\Produk;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class laporanMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $produkMasuk = ProdukMasuk::where('nama_produk', 'like', '%' . $request->search . '%')
                ->join('produks', 'produks.id', '=', 'produk_masuks.id_produk')
                ->join('satuan_produks', 'satuan_produks.id', '=', 'produks.satuanProduk_id')
                ->select('produk_masuks.*', 'produks.nama_produk', 'satuan_produks.satuan_produk', 'produks.harga_beli', 'produks.harga_jual', 'produks.stok', 'produk_masuks.jumlah_masuk', 'produk_masuks.tanggal_masuk')
                ->paginate(5);
        } else {
            // $produkMasuk = ProdukMasuk::join('produks','produks.id','=','produk_masuks.id_produk')
            //             ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
            //             ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.tanggal_masuk')
            //             ->get();
            $produkMasuk = ProdukMasuk::with('Produk')->paginate(5);
        }

        
        $produk = Produk::all();
        
        return view('laporan.laporanMasuk', compact('produk', 'produkMasuk'));
    }
    public function excel()
    {
        return Excel::download(new laporanMasukExcel(), 'laporanProdukMasuk.xlsx');
    }
    public function cetakPertanggal(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        if ($tgl_awal and $tgl_akhir) {
            $cetakprodukMasuk = ProdukMasuk::with('Produk')
                ->whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])
                ->get();
            // $sum_total = ProdukMasuk::whereBetween('tanggal_masuk', [$tgl_awal, $tgl_akhir])->sum('total');
        } else {
            $cetakprodukMasuk = ProdukMasuk::with('Produk');
        }
        return view('laporan.cetaklaporanMasuk', compact('cetakprodukMasuk','tgl_awal','tgl_akhir'));

        // dd(["tanggal awal : ".$tgl_awal, "Tanggal Akhir : ".$tgl_akhir]);
        // $cetakprodukMasuk = ProdukMasuk::join('produks','produks.id','=','produk_masuks.id_produk')
        //                 ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
        //                 ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.created_at')
        //                 ->whereBetween('created_at',[$tgl_awal, $tgl_akhir])
        //                 ->get();

        // $cetakprodukMasuk = ProdukMasuk::join('produks','produks.id','=','produk_masuks.id_produk')
        // ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
        // ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.tanggal_masuk')
        // ->whereBetween('tanggal_masuk',[$tgl_awal, $tgl_akhir])
        // ->get();

        // $cetakprodukMasuk = ProdukMasuk::with('Produk')
        // ->whereBetween('tanggal_masuk',[$tgl_awal, $tgl_akhir])
        // ->get();

        // return view('laporan.cetaklaporanMasuk', compact('cetakprodukMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
