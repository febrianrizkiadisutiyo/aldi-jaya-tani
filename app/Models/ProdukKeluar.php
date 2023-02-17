<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKeluar extends Model
{
    use HasFactory;
    
    protected $fillable =['id_produk','id_prodMasuk','kode_pk','jumlah_keluar','tanggal_keluar'];
    public function Produk(){
        return $this->belongsTo(Produk::class,'id_produk','id');
    }

    // public function ProdukMasuk(){
    //     return $this->belongsTo(ProdukMasuk::class,'id_prodMasuk','id');
    // }
}
