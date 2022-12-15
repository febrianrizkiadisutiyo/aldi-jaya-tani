@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card w-75 mt-5">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Satuan Produk</h2>
                <a href="/produkMasuk"type="button" class="close" style="text-decoration: none"><i class="bi bi-x-lg"></i></a>
            </div>
            <div class="card-body">
                <h3 class="card-title mb-5">Tambahkan Satuan Produk</h3>
                <form action="{{ url('store_produkKeluar') }}" method="POST">
                    @csrf
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
                        <label for="satuan_produk" class="form-label">tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection
