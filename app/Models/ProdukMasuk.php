<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMasuk extends Model
{
    use HasFactory;

    protected $fillable =['id_produk','kode_pm','jumlah_masuk','tanggal_masuk','harga'];
    public function Produk(){
        return $this->belongsTo(Produk::class,'id_produk','id');
    }
    
    // public function satuanProduk(){
    //     return $this->belongsTo(satuanProduk::class,'id_satuanProduk');
    // }
}
