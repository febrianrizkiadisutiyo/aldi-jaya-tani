@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="modal-header">
            <h2 class="modal-title">Tambah Data Produk</h2>
            <a href="/produk"type="button" class="close" style="text-decoration: none"><i class="bi bi-x-lg"></i></a>
        </div>
        <div class="card-body">
            <form action="{{ url('store_produk') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                </div>
                <div class="form-group">
                    <label for="nama_produk" class="form-label">Satuan Produk</label>
                    <select class="form-control select2" style="width: 100%;" name="satuanProduk_id" id="satuanProduk_id">
                        <option>-- Pilih Satuan Produk --</option>
                        @foreach ($satuanProduk as $satuan)
                        <option value="{{ $satuan->id }}">{{ $satuan->satuan_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga_modal" class="form-label">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input type="number" class="form-control" name="harga_beli" id="harga_beli">
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input type="number" class="form-control" name="harga_jual" id="harga_jual">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="stok_awal" class="form-label">Stok Awal</label>
                    <input type="number" class="form-control" placeholder="0" name="stok" id="stok" readonly >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection