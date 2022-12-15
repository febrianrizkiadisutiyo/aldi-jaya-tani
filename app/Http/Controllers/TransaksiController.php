<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::join('produks','produks.id', '=', 'transaksis.id_produk')
                    ->join('satuan_produks','satuan_produks.id', '=','produks.satuanProduk_id')
                    ->select('transaksis.*', 'produks.nama_produk','satuan_produks.satuan_produk','produks.harga_modal','produks.harga_jual','produks.sisa_stok')
                    ->get();
        return view('transaksi.transaksi',compact('produk','transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('transaksi.transaksi',compact('produk'));
    }
    // ajax
    public function ajax( Request $request){
        $id_produk['id_produk'] = $request->id_produk;
        $ajax_produk = Produk::where('id',$id_produk)->get();
        return view('transaksi.ajax', compact('ajax_produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_produk'=>'required',
        ]);
    Transaksi::create([
        'id_produk' =>$request->id_produk,
    ]);
    return redirect('/transaksi');
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
