<?php

namespace App\Http\Controllers;

use App\Models\satuanProduk;
use Illuminate\Http\Request;

class satuanProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuanProduk = satuanProduk::all();
        return view('crudSatuanProduk.satuanProduk',['satuan_produks' =>$satuanProduk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudSatuanProduk.createSatuan');
        // $satuanProduk = satuanProduk::all();
        // return view('crudProduk.dataProduk',compact('satuanProduk'));
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
            'satuan_produk' => 'required'
        ]);
        satuanProduk::create([
            'satuan_produk' =>$request->satuan_produk,
        ]);
        // return redirect()->back()->with('status','student added Successfully');
        return redirect('/satuanProduk')->with('status','Berhasil menambahkan satuan Produk');
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
    // public function edit($id)
    // {
    //     $satuanProduk = satuanProduk::find($id);
    //     return view('crudSatuanProduk.editSatuan',['satuan_produks'=>$satuanProduk]);
    // }
    public function edit($id)
    {
        $satuanProduk = satuanProduk::find($id);
        return view('crudSatuanProduk.satuanProduk',['satuan_produks'=>$satuanProduk]);
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
        $satuanProduk = satuanProduk::find($id);
        $satuanProduk->satuan_produk = $request->input('satuan_produk');
        $satuanProduk->update();
        return redirect('/satuanProduk')->with('status','Berhasil mengedit satuan Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuanProduk = satuanProduk::find($id);
        $satuanProduk->Produk()->delete();
        $satuanProduk->delete();
        return redirect()->back()->with('status','berhasil terhapus');
    }
}
