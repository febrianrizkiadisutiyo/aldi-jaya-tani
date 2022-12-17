@extends('layouts.app')

@section('content')
    <h1>Laporan Produk Keluar</h1>

    <h1><br /></h1>
    <table class="table border table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama <br/> Produk</th>
                <th scope="col">Satuan <br/> Produk</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Jumlah Keluar</th>
                <th scope="col">Tanggal Keluar</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Keuntungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetakprodukKeluar as $pk)
                <tr>
                    <th scope="row">{{ $pk->id }}</th>
                    <td>{{ $pk->Produk->nama_produk }}</td>
                        <td>{{ $pk->Produk->satuanProduk->satuan_produk }}</td>
                        <td>Rp.{{ $pk->Produk->harga_jual }}</td>
                        <td>{{ $pk->jumlah_keluar }}</td>
                        <td>{{ date('d F Y', strtotime($pk->tanggal_keluar)) }}</td>
                        {{-- <td>{{ $pk->created_at }}</td> --}}
                        <td>Rp.{{ $pk->Produk->harga_jual*$pk->jumlah_keluar }}</td>
                        <td>Rp.{{ ($pk->Produk->harga_jual-$pk->Produk->harga_beli)*$pk->jumlah_keluar }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
@endsection
