<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukMasuk;
use App\Models\satuanProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
            $produks = Produk::where('nama_produk','like','%' .$request->search.'%')->latest()->paginate(5);
        } else {
            $produks = Produk::with('satuanProduk')->latest()->paginate(5);
        }
        $q = DB::table('produks')->select(DB::raw('MAX(RIGHT(kode_produk,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        } else {
            $kd = "0001";
        }
        $satuanProduk = satuanProduk::all();
        return view('crudProduk.dataProduk', compact('produks','satuanProduk','kd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $produk = Produk::all();
        $q = DB::table('produks')->select(DB::raw('MAX(RIGHT(id,4)) as kode'));
        $kd = "";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        } else {
            $kd = "0001";
        }
        $satuanProduk = satuanProduk::all();
        return view('crudProduk.dataProduk',compact('satuanProduk','produk','kd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $requestData = $request->all();
        // Produk::create($requestData);
        // $produkM = ProdukMasuk::findOrFail($request->id);
        // $request->harga_beli = $produkM->harga;
        // $request->nama_produk;
        // $request->satuanProduk_id;
        // $request->harga_jual;
        // $produkM->save();
        // return redirect('/produk')->with('status','Berhasil menambahkan Produk');

        $this->validate($request, [
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'satuanProduk_id' => 'required',
            'harga_beli' => 'required',
            // 'harga' => 'required',
            'harga_jual' => 'required',
        ]);
         Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'satuanProduk_id' =>$request->satuanProduk_id,
            'harga_beli' => $request->harga_beli,
            'harga_jual' =>$request->harga_jual,
        ]);
        // ProdukMasuk::create([
            
        //     // 'harga' => $produk->harga_beli,
            
        // ]);
        
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
    // public function edit($id)
    // {
    //     $satuanProduk = satuanProduk::all();
    //     $produk = Produk::with('satuanProduk')->findOrFail($id);
    //     return view('crudProduk.editProduk',compact('produk','satuanProduk'));
    //     // $satuanProduk = satuanProduk::all();
    //     // return view('crudProduk.editProduk',[])
    // }
    public function edit($id)
    {
        $satuanProduk = satuanProduk::all();
        $produk = Produk::with('satuanProduk')->findOrFail($id);
        return view('crudProduk.dataproduk',compact('produk','satuanProduk'));
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
            $produk->ProdukMasuk()->delete();
            $produk->ProdukKeluar()->delete();
            $produk->delete();
            return redirect()->back()->with('status','berhasil terhapus');
    }
}
