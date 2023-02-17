@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')
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
                    {{-- <a href="/create_produkKeluar" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                        Produk Keluar</a> --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
                        <i class="bi bi-plus-lg"></i> Tambah Produk Keluar
                    </button>
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
                        <th scope="col">Kode Produk Keluar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Satuan Produk</th>
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
                            <th scope="row">{{ $pk->kode_pk }}</th>
                            <td>{{ $pk->Produk->nama_produk }}</td>
                            <td>{{ $pk->Produk->satuanProduk->satuan_produk }}</td>
                            <td>Rp.{{ number_format($pk->harga) }}</td>
                            <td>{{ $pk->jumlah_keluar }}</td>
                            <td>{{ date('d F Y', strtotime($pk->tanggal_keluar)) }}</td>
                            {{-- <td>Rp.{{ number_format($pk->total_harga) }}</td> --}}
                            {{-- <td>{{ $pk->created_at }}</td> --}}
                            <td>Rp.{{ number_format($pk->total_harga) }}</td>
                            {{-- <td>Rp.{{ ($pk->harga_jual - $pk->harga_beli) * $pk->jumlah_keluar }}</td> --}}
                            @if (auth()->user()->role == 'pemilikToko')
                                <td>
                                    <form action="{{ 'delete_produkKeluar/' . $pk->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin Ingin Menghapus {{ $pk->Produk->nama_produk }}')"><i
                                                class="bi bi-trash3"></i> Delete</button>
                                    </form>
                                </td>
                            @endif

                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="pagination">
                {{ $produkKeluar->links() }}
            </div>
        </div>
    </div>

    <!-- Modal create -->
    <div class="modal" id="modalcreate">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title">Tambah Data Produk Keluar</h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ url('store_produkKeluar') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Kode Produk Keluar</label>
                            <input type="text" class="form-control" readonly value=" {{ 'PK-'.$kode }}" name="kode_pk" id="kode_pk">
                        </div>
                        <div class="mb-3">
                            <div class="mb-3 mr-5">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <select class="form-control select2" style="width: 100%;" name="id_produk" id="id_produk">
                                    <option>-- Pilih Produk --</option>
                                    @foreach ($produk as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="satuan_produk" class="form-label">Jumlah Keluar</label>
                            <input type="text" class="form-control" name="jumlah_keluar" id="jumlah_keluar">
                        </div>
                        <div class="mb-3">
                            <label for="satuan_produk" class="form-label">Tanggal Keluar</label>
                            <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
