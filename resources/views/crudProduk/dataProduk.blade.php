    @extends('layouts.master')

    @section('content')
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card-body shadow-lg">
            <div class="container">
                <h1>Tampilan Data Produk</h1>
                <br />
                <div class="row g-3">
                    <div class="col">
                        <a href="/create_produk" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                            Produk</a>
                    </div>
                    <div class="col-auto mt-4">
                        <label for=""><b>Search</b></label>
                    </div>
                    <div class="col-md-4 ml-2">
                        <form action="/produk" method="GET">
                            <input type="search" input="latin-name" name="search" class="form-control">
                        </form>
                    </div>
                </div>
                <table class="table border table-hover mt-4">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Satuan Produk</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Stok Produk</th>
                            <th scope="col">Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                            <tr>
                                <th scope="row">{{ $produk->id }}</th>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->satuanProduk->satuan_produk }}</td>
                                <td>Rp.{{ $produk->harga_beli }}</td>
                                <td>Rp.{{ $produk->harga_jual }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>

                                    <form action="{{ url('delete_produk/' . $produk->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ url('edit_produk/' . $produk->id) }}" class="btn btn-warning"><i
                                                class="bi bi-pen"></i> Edit</a>
                                        |
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin Ingin Menghapus {{ $produk->nama_produk }}')"><i
                                                class="bi bi-trash3"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination ml-5">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
        
            
        
       


        <!-- Button to Open the Modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
                + Tambah Produk Baru
            </button> --}}

        <!-- Modal create -->
        {{-- <div class="modal" id="modalcreate">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title">Tambah Data Produk</h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ url('store_produk') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="satuanProduk_id"
                                id="satuanProduk_id">
                                <option>-- Pilih Barang --</option>
                                @foreach ($produks as $satuan)
                                    <option value="{{ $satuan->satuanProduk->id }}">
                                        {{ $satuan->satuanProduk->satuan_produk }}</option>
                                @endforeach
								@foreach ($satuanProduk as $satuan)
            						<option value="{{ $satuan->id }}">{{ $satuan->satuan_produk }}</option>
            					@endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" name="harga_produk" id="harga_produk">
                        </div>
                        <div class="mb-3">
                            <label for="total_stok" class="form-label">Total Stok</label>
                            <input type="number" class="form-control" name="total_stok" id="total_stok">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

        <!-- Modal edit -->
        {{-- <div class="modal" id="editproduk">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title">Edit Data Produk</h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ url('/update_produk/'.$produk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama) }}">
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" style="width: 100%;" name="satuanProduk_id"
                                id="satuanProduk_id">
                                <option>-- Pilih Barang --</option>
                                @foreach ($produks as $satuan)
                                    <option value="{{ $satuan->satuanProduk->id }}">
                                        {{ $satuan->satuanProduk->satuan_produk }}</option>
                                @endforeach
								
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="form-label">Harga Produk</label>
                            <input type="number" class="form-control" name="harga_produk" id="harga_produk">
                        </div>
                        <div class="mb-3">
                            <label for="total_stok" class="form-label">Total Stok</label>
                            <input type="number" class="form-control" name="total_stok" id="total_stok">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
    {{-- @foreach ($satuan_produks as $satuan)
            						<option value="{{ $satuan->id }}">{{ $satuan->satuan_produk }}</option>
            					@endforeach --}}
