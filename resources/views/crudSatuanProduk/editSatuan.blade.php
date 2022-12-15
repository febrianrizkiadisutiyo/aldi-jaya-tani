@extends('layouts.master')
@section('content')


<div class="container">
    <div class="card w-75 mt-5">
        <div class="modal-header">
            <h2 class="modal-title">Edit Satuan Produk</h2>
            <a href="/satuanProduk"type="button" class="close" style="text-decoration: none"><i class="bi bi-x-lg"></i></a>
        </div>
        <div class="card-body">
            <form action="{{ url('/update_satuan/'.$satuan_produks->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="satuan_produk" class="form-label">Satuan Produk</label>
                    <input type="text" class="form-control" name="satuan_produk" id="satuan_produk" value="{{ old('satuan_produks', $satuan_produks->satuan_produk) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection