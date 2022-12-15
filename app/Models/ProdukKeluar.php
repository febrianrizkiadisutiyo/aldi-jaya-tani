<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKeluar extends Model
{
    use HasFactory;
    
    protected $fillable =['id_produk','jumlah_keluar','tanggal_keluar'];
}
