@extends('layouts.app')

@section('content')
    <h1>Laporan Data Produk</h1>
    <h1><br /></h1>
    <table class="table border table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Poduk</th>
                <th scope="col">Satuan Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Jumlah Masuk</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cetakprodukMasuk as $pm)
                <tr>
                    <th scope="row">{{ $pm->id }}</th>
                    <td>{{ $pm->Produk->nama_produk }}</td>
                    <td>{{ $pm->Produk->satuanProduk->satuan_produk }}</td>
                    <td>Rp.{{ $pm->Produk->harga_beli }}</td>
                    <td>{{ $pm->jumlah_masuk }}</td>
                    <td>{{ date('d F Y', strtotime($pm->tanggal_masuk)) }}</td>
                    {{-- <td> {{ $pm->tanggal_masuk}}</td> --}}
                    {{-- <td>{{ showDateTime($pm->created_at,'d F Y') }}</td> --}}
                    <td>Rp.{{ $pm->jumlah_masuk * $pm->Produk->harga_beli }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
@endsection
