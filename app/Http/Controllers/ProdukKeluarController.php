<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukKeluar;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukKeluarController extends Controller
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
                                            ->latest()
                                            ->paginate(5);
        } else {
            // $produkKeluar = ProdukKeluar::join('produks','produks.id','=','produk_keluars.id_produk')
            //                         ->join('satuan_produks','satuan_produks.id','=','produks.satuanProduk_id')
            //                         ->select('produk_keluars.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_keluars.jumlah_keluar','produk_keluars.tanggal_keluar')
            //                         ->get();
            $produkKeluar = ProdukKeluar::with('Produk')
            ->latest()
            ->paginate(5);
        }

        $p = DB::table('produk_keluars')->select(DB::raw('MAX(RIGHT(kode_pk,4)) as kode'));
        $kode = '';
        if ($p->count() > 0) {
            foreach ($p->get() as $k) {
                $tmp = ((int) $k->kode) + 1;
                $kode = sprintf('%04s', $tmp);
            }
        } else {
            $kode = '0001';
        }
        $produk = Produk::all();
        return view('produkKeluar.produkKeluar',compact('produk','produkKeluar','kode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('produkKeluar.create_produkKeluar',compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $produk = Produk::findOrFail($request->id_produk);
        // $prodMasuk = ProdukMasuk::findOrFail($request->id);
        if($produk->stok < $request->jumlah_keluar){
            //  $this->session->set_flashdata('error','Jumlah Produk tidak Mencukupi');
            return redirect('/produkKeluar')->with('status','Stok Tidak Mencukupi');      
        } else {
            $requestData = $request->all();
            // $prodMasuk = ProdukMasuk::create('harga');
            $prodKeluar = ProdukKeluar::create($requestData);
            $produk->stok -= $request->jumlah_keluar;
            $prodKeluar->harga = $produk->harga_jual;
            $prodKeluar->total_harga = $request->jumlah_keluar * $prodKeluar->harga;
            $prodKeluar->pendapatan = ($prodKeluar->harga - $produk->harga_beli) * $request->jumlah_keluar;
            // $prodMasuk->save();
            $prodKeluar->save();
            $produk->save();
            return redirect('/produkKeluar')->with('success','Produk Keluar Berhasil Ditambahkan');
        }
        

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
        $produkKeluar = ProdukKeluar::find($id);
        $produkKeluar->delete();
        return redirect()->back()->with('success','berhasil terhapus');
    }
}
