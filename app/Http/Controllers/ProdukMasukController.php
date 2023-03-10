<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukMasukController extends Controller
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
                ->select('produk_masuks.*', 'produks.nama_produk', 'satuan_produks.satuan_produk', 'produks.harga_beli', 'produks.harga_jual', 'produks.stok', 'produk_masuks.jumlah_masuk', 'produk_masuks.tanggal_masuk', 'produk_masuks.harga')
                ->latest()
                ->paginate(5);
        } else {
            
            $produkMasuk = ProdukMasuk::with('Produk')->latest()->paginate(5);
        }
        $p = DB::table('produk_masuks')->select(DB::raw('MAX(RIGHT(kode_pm,4)) as kode'));
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
        return view('produkMasuk.produkMasuk', compact('produk', 'produkMasuk','kode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $produk = Produk::all();
    //     return view('produkMasuk.create_produkMasuk',compact('produk'));
    // }
    // public function ajax( Request $request){
    //     $id_produk['id_produk'] = $request->id_produk;
    //     $ajax_produk = Produk::where('id',$id_produk)->get();
    //     return view('transaksi.ajax', compact('ajax_produk'));
    // }
    // ajax
    //   public function ajax( Request $request){
    //     $id_produk['id_produk'] = $request->id_produk;
    //     $ajax_produk = Produk::where('id',$id_produk)->get();
    //     return view('produkMasuk.ajax', compact('ajax_produk'));
    //     $nama_produk['nama_produk'] = $request->id_produk;
    //     $ajax_produk = Produk::where('id',$nama_produk)->get();
    //     return view('produkMasuk.produkMasuk', compact('ajax_produk'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        $prodMasuk = ProdukMasuk::create($requestData);
        $produk = Produk::findOrFail($request->id_produk);
        $produk->stok += $request->jumlah_masuk;
        $prodMasuk->harga = $produk->harga_beli;
        $prodMasuk->total_harga = $request->jumlah_masuk * $prodMasuk->harga;
        
        $prodMasuk->save();
        // $request->tanggal_masuk;
        $produk->save();

        return redirect('/produkMasuk')->with('success', 'Berhasil menambahkan Produk Masuk');
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
        return redirect()
            ->back()
            ->with('success', 'berhasil terhapus');
    }
}
// $produkMasuk = ProdukMasuk::join('produks','produks.id','=','produk_masuks.id_produk')
            // ->join('satuan_produks','satuan_produks.id', '=', 'produks.satuanProduk_id')
            // ->select('produk_masuks.*','produks.nama_produk','satuan_produks.satuan_produk','produks.harga_beli','produks.harga_jual','produks.stok','produk_masuks.jumlah_masuk','produk_masuks.tanggal_masuk')
            // ->get();
    // $produkMasuk = ProdukMasuk::where('nama_produk','like','%' .$request->search. '%')
            //             ->with('Produk')
            //             ->get();
            // $produkMasuk = ProdukMasuk::with('Produk')
            //             ->where('nama_produk','like','%' .$request->search.'%')
            //             ->get();
