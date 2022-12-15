<?php

namespace App\Exports;

use App\Models\ProdukMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class laporanMasukExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProdukMasuk::all();
    }
}
