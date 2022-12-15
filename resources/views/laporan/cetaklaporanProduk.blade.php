@extends('layouts.app')

@section('content')
    <h1>Laporan Data Produk</h1>

    <h1><br /></h1>
    <table class="table border">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Satuan Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Jumlah Produk</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cetakproduk as $produk)
                <tr>
                    <th scope="row">{{ $produk->id }}</th>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->satuanProduk->satuan_produk }}</td>
                    <td>Rp.{{ $produk->harga_beli }}</td>
                    <td>Rp.{{ $produk->harga_jual }}</td>
                    <td>{{ $produk->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
@endsection
