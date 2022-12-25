<?php

namespace App\Models;

use App\Models\Transaksi;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table ='produks';
    // protected $guarded = ['id'];
    protected $fillable = ['nama_produk','kode_produk','satuanProduk_id','harga_beli','harga_jual',];

    public function satuanProduk(){
        return $this->belongsTo(satuanProduk::class,'satuanProduk_id','id');
    }
    // public function Transaksi(){
    //     return $this->hasMany(Transaksi::class);
    // }
    public function produkMasuk(){
        return $this->hasMany(produkMasuk::class,'id_produk','id');
    }
    public function produkKeluar(){
        return $this->hasMany(produkKeluar::class,'id_produk','id');
    }
}
