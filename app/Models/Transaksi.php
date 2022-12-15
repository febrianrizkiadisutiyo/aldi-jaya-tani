<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $table ='transaksis';
    protected $fillable = ['id_produk'];

    // public function Produk(){
    //     return $this->belongsTo(Produk::class,'id_produk');
    // }
}
