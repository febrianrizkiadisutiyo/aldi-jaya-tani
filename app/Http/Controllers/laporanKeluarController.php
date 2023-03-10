<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKeluar;
use Illuminate\Http\Request;
use App\Exports\laporanKeluarExcel;
use Maatwebsite\Excel\Facades\Excel;

class laporanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $produkKeluar = ProdukKeluar::where('nama_produk','like','%' .$request->search.'%')
                                            ->join('produks','produks.id','=','produk_keluars.id_produk')
                                            ->join('satuan_produks','satuan_produks.id','=','produks.satuanProduk_id')
                                            ->select('produk_keluars.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_keluars.jumlah_keluar','produk_keluars.tanggal_keluar')
                                            ->paginate(5);
        } else {
            // $produkKeluar = ProdukKeluar::join('produks','produks.id','=','produk_keluars.id_produk')
            //                         ->join('satuan_produks','satuan_produks.id','=','produks.satuanProduk_id')
            //                         ->select('produk_keluars.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_keluars.jumlah_keluar','produk_keluars.tanggal_keluar')
            //                         ->get();
            $produkKeluar = ProdukKeluar::with('Produk')->paginate(5);
        }
        $total = ProdukKeluar::sum('total_harga');
        $totalPendapatan = ProdukKeluar::sum('pendapatan');
        $produk = Produk::all();
        return view('laporan.laporanKeluar',compact('produk','produkKeluar','total','totalPendapatan'));
    }
    public function cetakPertanggal($tgl_awal, $tgl_akhir){

        // $cetakprodukKeluar = ProdukKeluar::join('produks','produks.id','=','produk_keluars.id_produk')
        //                             ->join('satuan_produks','satuan_produks.id','=','produks.satuanProduk_id')
        //                             ->select('produk_keluars.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_keluars.jumlah_keluar','produk_keluars.tanggal_keluar')
        //                             ->whereBetween('tanggal_keluar',[$tgl_awal, $tgl_akhir])
        //                             ->get();
        $cetakprodukKeluar = ProdukKeluar::with('Produk')
        ->whereBetween('tanggal_keluar',[$tgl_awal, $tgl_akhir])
        ->get();
        // $totalPendapatan = ProdukKeluar::sum('pendapatan',[$tgl_awal, $tgl_akhir]);      
        return view('laporan.cetaklaporanKeluar', compact('cetakprodukKeluar'));              
    }
    public function excel(){
        return Excel::download(new laporanKeluarExcel, 'laporan-produk-keluar.xlsx');
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
