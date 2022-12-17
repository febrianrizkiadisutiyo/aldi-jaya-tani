@extends('layouts.master')
@section('content')

{{-- @foreach($produkMasuk as $pm)
<p>{{ $pm->Produk->satuanProduk->satuan_produk }}</p>
@endforeach --}}
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif
    <div class="card-body shadow-lg">
        <div class="container">
            <h1>Tampilan Produk Masuk</h1>
            <br />
            <div class="row g-3">
                <div class="col">
                    <a href="/create_produkMasuk" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                        Produk Masuk</a>
                </div>
                <div class="col-auto mt-4">
                    <label for=""><b>Search</b></label>
                </div>
                <div class="col-md-4 ml-2">
                    <form action="/produkMasuk" method="GET">
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
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Jumlah Masuk</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Total Harga</th>
                        @if (auth()->user()->role == 'pemilikToko')
                        <th scope="col">Pilihan</th>
                        @endif

                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkMasuk as $pm)
                        <tr>
                            <th scope="row">{{ $pm->id }}</th>
                            <td>{{ $pm->Produk->nama_produk }}</td>
                            <td>{{ $pm->Produk->satuanProduk->satuan_produk }}</td>
                            <td>Rp.{{ $pm->Produk->harga_beli }}</td>
                            <td>{{ $pm->jumlah_masuk }}</td>
                            <td>{{ date('d F Y', strtotime($pm->tanggal_masuk)) }}</td>
                            <td>Rp.{{ $pm->jumlah_masuk * $pm->Produk->harga_beli }}</td>
                            @if (auth()->user()->role == 'pemilikToko')
                            <td>
                                <form action="{{ 'delete_produkMasuk/' . $pm->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Anda yakin Ingin Menghapus {{ $pm->nama_produk }}')"><i
                                            class="bi bi-trash3"></i> Delete</button>
                                </form>
                            </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="pagination ml-5">
                {{ $produkMasuk->links() }}
            </div>
        </div>
    </div>
@endsection
                            {{-- <td> {{ $pm->tanggal_masuk}}</td> --}}
                            {{-- <td>{{ showDateTime($pm->tanggal_masuk,'d F Y') }}</td> --}}
