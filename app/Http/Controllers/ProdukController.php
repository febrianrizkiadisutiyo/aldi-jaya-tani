<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\satuanProduk;
use Illuminate\Http\Request;


class ProdukController extends Controller
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
        return view('crudProduk.dataProduk', compact('produks','satuanProduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuanProduk = satuanProduk::all();
        return view('crudProduk.createProduk',compact('satuanProduk'));
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
            'nama_produk' => 'required',
            'satuanProduk_id' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        Produk::create([
            'nama_produk' =>$request->nama_produk,
            'satuanProduk_id' =>$request->satuanProduk_id,
            'harga_beli' =>$request->harga_beli,
            'harga_jual' =>$request->harga_jual,
        ]);
        return redirect('/produk')->with('status','Berhasil menambahkan data Produk');
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
        $satuanProduk = satuanProduk::all();
        $produk = Produk::with('satuanProduk')->findOrFail($id);
        return view('crudProduk.editProduk',compact('produk','satuanProduk'));
        // $satuanProduk = satuanProduk::all();
        // return view('crudProduk.editProduk',[])
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
        $produk = Produk::find($id);
        $produk->nama_produk = $request->input('nama_produk');
        $produk->satuanProduk_id = $request->input('satuanProduk_id');
        $produk->harga_beli = $request->input('harga_beli');
        $produk->harga_jual = $request->input('harga_jual');
        $produk->update();
        return redirect('/produk')->with('status','Berhasil mengedit data produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
            $produk = Produk::find($id);
            $produk->delete();
            return redirect()->back()->with('status','berhasil terhapus');
    }
}
