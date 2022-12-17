<?php

namespace App\Exports;

use App\Models\ProdukKeluar;
use Maatwebsite\Excel\Concerns\FromCollection;

class laporanKeluarExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProdukKeluar::with('Produk')->get();
    }
}
