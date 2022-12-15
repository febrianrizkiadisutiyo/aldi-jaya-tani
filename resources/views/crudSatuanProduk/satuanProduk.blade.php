@extends('layouts.master')
@section('content')
@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<div class="card-body shadow-lg">
    <div class="container">
        <h1>Tampilan Satuan Produk</h1>
        <br />
        <a href="/create_satuan" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Satuan Produk</a>
        <table class="table border table-hover mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Satuan Produk</th>
                    <th scope="col">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($satuan_produks as $satuanproduk)
                    <tr>
                        <th scope="row">{{ $satuanproduk->id }}</th>
                        <td>{{ $satuanproduk->satuan_produk }}</td>
                        <td>

                            <form action="{{ url('delete_satuan/'. $satuanproduk->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ url('edit_satuan/'.$satuanproduk->id) }}" class="btn btn-warning" ><i class="bi bi-pen"></i> Edit</a>    
                                |
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Anda yakin Ingin Menghapus {{ $satuanproduk->satuan_produk }}')"><i class="bi bi-trash3"></i> Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


 <!-- Button to Open the Modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createsatuan">
            + Tambah Satuan Produk Baru
        </button> --}}

        
{{-- buton ke modal 
data-toggle="modal" data-target="#editsatuan" --}}

{{-- <!-- Modal create satuan produk -->
<div class="modal" id="createsatuan">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Tambah Satuan Produk</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('store_satuan') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="satuan_produk" class="form-label">Satuan Produk</label>
                        <input type="text" class="form-control" name="satuan_produk" id="satuan_produk">
                    </div> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit satuan produk -->
<div class="modal" id="editsatuan">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title">Edit Satuan Produk</h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ url('/update_satuan/'.$satuanproduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="satuan_produk" class="form-label">Satuan Produk</label>
                        <input type="text" class="form-control" name="satuan_produk" id="satuan_produk" value="{{ $satuanproduk->satuan_produk }}">
                    </div> 
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection