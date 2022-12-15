@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="modal-header">
            <h2 class="modal-title">Edit Satuan Produk</h2>
            <a href="/produk"type="button" class="close" style="text-decoration: none"><i class="bi bi-x-lg"></i></a>
        </div>
        <div class="card-body">
            <form action="{{url('/update_produk/'.$produk->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
                </div>
                <div class="form-group">
                    <label for="nama_produk" class="form-label">Satuan Produk</label>
                    <select class="form-control select2" style="width: 100%;" name="satuanProduk_id" id="satuanProduk_id">
                        {{-- <option value="{{ $produk->satuanProduk_id }}">{{ $produk->satuanProduk->satuan_produk }}</option> --}}
                        <option disabled value>-- Pilih Satuan Produk --</option>
                        @foreach ($satuanProduk as $satuan)
                        <option value="{{ $satuan->id }}">{{ $satuan->satuan_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga_modal" class="form-label">Harga Beli</label>
                    <input type="number" class="form-control" name="harga_beli" id="harga_beli" value="{{ old('harga_modal', $produk->harga_beli) }}">
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" id="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}">
                </div>
                <div class="mb-3">
                    <label for="total_stok" class="form-label">Stok Awal</label>
                    <input type="number" class="form-control" name="sisa_stok" id="sisa_stok" value="{{ old('stok', $produk->stok) }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>



@endsection