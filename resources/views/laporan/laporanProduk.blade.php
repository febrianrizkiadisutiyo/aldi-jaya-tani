@extends('layouts.master')

@section('content')
    <div class="card-body shadow-lg">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <h1>Laporan  Data Produk</h1>
            <br />

            <div class="row g-3">
                <div class="col-auto mt-4">
                    <label for=""><b>Search</b></label>
                </div>
                <div class="col-md-3 ml-2">
                    <form action="/laporanProduk" method="GET">
                        <input type="search" input="latin-name" name="search" class="form-control">
                    </form>
                </div>
                <div class="col-auto mt-3">
                    <a href="/excellaporanProduk" type="button" class="btn btn-success"><i class="bi bi-file-earmark-excel"></i> Export Excel</a>
                </div>
                <div class="col-auto mt-3">
                    <a href="/cetaklaporanProduk" type="button" target="_blank" class="btn btn-danger"><i class="bi bi-printer"></i> Cetak Data</a>
                </div>
            </div>

            <h1><br /></h1>
            <table class="table border table-hover">
                <thead>
                    <tr>
                        <th scope="col">Kode Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Satuan Produk</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Jumlah Produk</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <th>{{ $produk->kode_produk }}</th>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->satuanProduk->satuan_produk }}</td>
                            <td>Rp.{{ number_format($produk->harga_beli)  }}</td>
                            <td>Rp.{{ number_format($produk->harga_jual) }}</td>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
                {{ $produks->links() }}
            </div>
        </div>
    </div>
    
    @endsection
