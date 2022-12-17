<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;

class ProdukMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            // $produkMasuk = ProdukMasuk::where('nama_produk','like','%' .$request->search. '%')
            //             ->with('Produk')
            //             ->get();
            // $produkMasuk = ProdukMasuk::with('Produk')
            //             ->where('nama_produk','like','%' .$request->search.'%')
            //             ->get();
            $produkMasuk = ProdukMasuk::where('nama_produk','like','%' .$request->search.'%')
                            ->join('produks','produks.id','=','produk_masuks.id_produk')
                            ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
                            ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.tanggal_masuk')
                            ->get();
        }else{
            // $produkMasuk = ProdukMasuk::join('produks','produks.id','=','produk_masuks.id_produk')
            // ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
            // ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.tanggal_masuk')
            // ->get();
            $produkMasuk = ProdukMasuk::with('Produk')->paginate(5)
        ;
        }
        $produk = Produk::all();               
        return view('produkMasuk.produkMasuk',compact('produk','produkMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('produkMasuk.create_produkMasuk',compact('produk'));
    }
    // public function ajax( Request $request){
    //     $id_produk['id_produk'] = $request->id_produk;
    //     $ajax_produk = Produk::where('id',$id_produk)->get();
    //     return view('transaksi.ajax', compact('ajax_produk'));
    // }
      // ajax
      public function ajax( Request $request){
        $id_produk['id_produk'] = $request->id_produk;
        $ajax_produk = Produk::where('id',$id_produk)->get();
        return view('produkMasuk.ajax', compact('ajax_produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $requestData = $request->all();
        ProdukMasuk::create($requestData);
        $produk = Produk::findOrFail($request->id_produk);
        $produk->stok += $request->jumlah_masuk;
        $request->tanggal_masuk;
        $produk->save();
        return redirect('/produkMasuk')->with('status','Berhasil menambahkan Produk Masuk');

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
        $produkMasuk = ProdukMasuk::find($id);
        $produkMasuk->delete();
        return redirect()->back()->with('status','berhasil terhapus');
    }
}
