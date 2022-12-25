@extends('layouts.app')

@section('content')
    <h1 align="center">Laporan Produk Masuk</h1>

    <p align="center"> Periode Tanggal {{ $tgl_awal }}  s/d  {{ $tgl_akhir }}</p>

    <h1><br /></h1>
    <table class="table border table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Produk Masuk</th>
                <th scope="col">Nama Poduk</th>
                <th scope="col">Satuan Produk</th>
                <th scope="col">Harga Beli</th>
                <th scope="col">Jumlah Masuk</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if(!$tgl_awal and !$tgl_akhir)
            <tr>
                <td colspan="7"><center><b> Tidak Ada data</b></center></td>
            </tr>
            @else --}}
            @foreach ($cetakprodukMasuk as $pm)
                <tr>
                    <th scope="row">{{ $pm->kode_pm }}</th>
                    <td>{{ $pm->Produk->nama_produk }}</td>
                    <td>{{ $pm->Produk->satuanProduk->satuan_produk }}</td>
                    <td>Rp.{{ number_format($pm->Produk->harga_beli) }}</td>
                    <td>{{ $pm->jumlah_masuk }}</td>
                    <td>{{ date('d F Y', strtotime($pm->tanggal_masuk)) }}</td>
                    {{-- <td> {{ $pm->tanggal_masuk}}</td> --}}
                    {{-- <td>{{ showDateTime($pm->created_at,'d F Y') }}</td> --}}
                    <td>Rp.{{ number_format($pm->jumlah_masuk * $pm->Produk->harga_beli) }}</td>
                </tr>
            @endforeach
            {{-- <tr colspan="6">Total Harga
                <td>Rp.{{ number_format($sum_total) }}</td>
            </tr> --}}
            {{-- @endif --}}
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
@endsection
