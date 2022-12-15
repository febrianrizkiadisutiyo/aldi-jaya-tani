<?php

namespace App\Http\Controllers;

use App\Exports\laporanProdukExcel;
use App\Models\Produk;
use App\Models\satuanProduk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class laporanProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        if($request->has('search')){
            $produks = Produk::where('nama_produk','like','%' .$request->search.'%')->paginate();
        } else {
            $produks = Produk::with('satuanProduk')->paginate(5);
        }
        $satuanProduk = satuanProduk::all();
        return view('laporan.laporanProduk', compact('produks','satuanProduk'));
        
    }
    public function cetak(){
        $satuanProduk = satuanProduk::all();
        $cetakproduk = Produk::with('satuanProduk')->get();
        return view('laporan.cetaklaporanProduk', compact('cetakproduk','satuanProduk'));
    }
    public function excel(){
        return Excel::download(new laporanProdukExcel, 'laporandataProduk.xlsx');
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
