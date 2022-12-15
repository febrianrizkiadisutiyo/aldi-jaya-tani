@extends('layouts.master')
@section('content')
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card-body shadow-lg">
        <div class="container">
            <h1>Tampilan Produk Keluar</h1>
            <br />
            <br />
            <div class="row g-3">
                <div class="col">
                    <a href="/create_produkKeluar" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                        Produk Keluar</a>
                </div>
                <div class="col-auto mt-4">
                    <label for=""><b>Search</b></label>
                </div>
                <div class="col-md-4 ml-2">
                    <form action="/produkKeluar" method="GET">
                        <input type="search" input="latin-name" name="search" class="form-control">
                    </form>
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
                        {{-- <th scope="col">Keuntungan</th> --}}
                        @if (auth()->user()->role == 'pemilikToko')
                        <th scope="col">Pilihan</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkKeluar as $pk)
                        <tr>
                            <th scope="row">{{ $pk->id }}</th>
                            <td>{{ $pk->nama_produk }}</td>
                            <td>{{ $pk->satuan_produk }}</td>
                            <td>Rp.{{ $pk->harga_jual }}</td>
                            <td>{{ $pk->jumlah_keluar }}</td>
                            <td>{{ date('d F Y', strtotime($pk->tanggal_keluar)) }}</td>
                            {{-- <td>{{ $pk->created_at }}</td> --}}
                            <td>Rp.{{ $pk->harga_jual * $pk->jumlah_keluar }}</td>
                            {{-- <td>Rp.{{ ($pk->harga_jual - $pk->harga_beli) * $pk->jumlah_keluar }}</td> --}}
                            @if (auth()->user()->role == 'pemilikToko')
                            <td>
                                <form action="{{ 'delete_produkKeluar/' . $pk->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Anda yakin Ingin Menghapus {{ $pk->nama_produk }}')"><i
                                            class="bi bi-trash3"></i> Delete</button>
                                </form>
                            </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
