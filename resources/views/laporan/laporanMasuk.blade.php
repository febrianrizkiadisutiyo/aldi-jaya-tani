@extends('layouts.master')
@section('content')
    <div class="card-body shadow-lg">
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <h1>laporan Produk Masuk</h1>
            <br />
            <br />
            <div class="row g-3">
                <div class="col-auto mt-4">
                    <label for=""><b>Search</b></label>
                </div>
                <div class="col-md-3 ml-2">
                    <form action="/laporanMasuk" method="GET">
                        <input type="search" input="latin-name" name="search" class="form-control">
                    </form>
                </div>
                <div class="col-auto mt-3">
                    <a href="/excellaporanMasuk" type="button" class="btn btn-success"><i
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
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Jumlah Masuk</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkMasuk as $pm)
                        <tr>
                            <th scope="row">{{ $pm->id }}</th>
                            <td>{{ $pm->nama_produk }}</td>
                            <td>{{ $pm->satuan_produk }}</td>
                            <td>Rp.{{ $pm->harga_beli }}</td>
                            <td>{{ $pm->jumlah_masuk }}</td>
                            <td>{{ date('d F Y', strtotime($pm->tanggal_masuk)) }}</td>
                            {{-- <td>{{ $pm->tanggal_masuk }}</td> --}}
                            {{-- <td>{{ showDateTime($pm->created_at,'d F Y') }}</td> --}}
                            <td>Rp.{{ $pm->jumlah_masuk * $pm->harga_beli }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
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
                        onclick="this.href='/cetaklaporanMasuk/'+ document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value"
                        target="_blank" class="btn btn-primary">Cetak Data</a>
                </div>
            </div>
        </div>
    </div>
@endsection
