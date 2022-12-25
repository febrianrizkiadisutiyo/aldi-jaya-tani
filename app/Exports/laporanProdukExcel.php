<?php

namespace App\Exports;

use App\Models\Produk;
use App\Models\satuanProduk;
use Maatwebsite\Excel\Concerns\FromCollection;

class laporanProdukExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $satuanProduk = satuanProduk::get();
        // $produk = Produk::join('satuan_produks','satuan_produks.id','=','produks.satuanProduk_id')
        // ->select('satuan_produks.*','satuan_produks.satuan_produk')
        // ->get();
        $produk = Produk::with('satuanProduk')->get();
        return $produk;
      
    }
}
