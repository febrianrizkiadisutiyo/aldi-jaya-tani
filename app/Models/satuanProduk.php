<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuanProduk extends Model
{
    use HasFactory;
    protected $table ='satuan_produks';
    // protected $guarded = ['id'];
    protected $fillable = ['satuan_produk'];

    public function Produk(){
        return $this->hasMany(Produk::class);
    }
    // public function satuanProduk(){
    //     return $this->hasMany(satuanProduk::class);
    // }
}
