@extends('layouts.master')
@section('content')

<div class="card-body shadow-lg">
    <div class="container">
        @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <h1>Laporan Produk Keluar</h1>
        <br />
        <br />
        <div class="row g-3">
            <div class="col-auto mt-4">
                <label for=""><b>Search</b></label>
            </div>
            <div class="col-md-3 ml-2">
                <form action="/laporanKeluar" method="GET">
                    <input type="search" input="latin-name" name="search" class="form-control">
                </form>
            </div>
            <div class="col-auto mt-3">
                <a href="/excellaporanKeluar" type="button" class="btn btn-success"><i
                        class="bi bi-file-earmark-excel"></i> Export Excel</a>
            </div>
            <div class="col-auto mt-3">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cetak">
                    <i class="bi bi-printer"></i> Cetak Data
                </button>
            </div>
        </div>
        <h1><br /></h1>
        <table class="table border table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama_produk</th>
                    <th scope="col">Satuan_produk</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Jumlah Keluar</th>
                    <th scope="col">Tanggal Keluar</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Keuntungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produkKeluar as $pk)
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
        <div class="pagination">
            {{ $produkKeluar->links() }}
        </div>
    </div>
</div>

{{-- modal pertanggal --}}

<div class="modal" id="cetak">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Tambah Data Produk</h1>
                <button type="button" class="close" data-dismiss="modal"><i class="bi bi-x"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir">
                </div>
                <a href=""
                    onclick="this.href='/cetaklaporanKeluar/'+ document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value"
                    target="_blank" class="btn btn-primary">Cetak Data</a>
            </div>
        </div>
    </div>
</div>
@endsection