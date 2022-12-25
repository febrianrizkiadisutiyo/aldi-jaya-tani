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
                                <!-- Button to Open the Modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
                            <i class="bi bi-plus-lg"></i>  Tambah Produk Baru
                        </button> --}}
                        <a href="/create_produk" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate"><i class="bi bi-plus-lg"></i> Tambah
                            Produk Baru</a>
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
                            <th scope="col">Kode Produk</th>
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
                                <th>{{ $produk->kode_produk }}</th>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->satuanProduk->satuan_produk }}</td>
                                <td>Rp.{{ number_format( $produk->harga_beli) }}</td>
                                <td>Rp.{{ number_format($produk->harga_jual) }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td>

                                    <form action="{{ url('delete_produk/' . $produk->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        {{-- <a href="{{ url('edit_produk/' . $produk->id) }}" class="btn btn-warning"><i
                                                class="bi bi-pen"></i> Edit</a> --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editproduk{{ $produk->id }}">
                                        <i class="bi bi-pen"></i> Edit
                                        </button>
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



        <!-- Modal create -->
        <div class="modal" id="modalcreate">
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
                                <label for="nama_produk" class="form-label">Kode Produk</label>
                                <input type="text" class="form-control" readonly value=" {{ 'P-'.$kd }}" name="kode_produk" id="kode_produk">
                            </div>
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
        </div>

        <!-- Modal edit -->
        @foreach ($produks as $produk)
        <div class="modal" id="editproduk{{ $produk->id }}">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h1 class="modal-title">Edit Data Produk</h1>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ url('/update_produk/' . $produk->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                    value="{{ $produk->nama_produk }}">
                            </div>
                            <div class="form-group">
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
                                <input type="number" class="form-control" name="harga_beli" id="harga_beli" value="{{ $produk->harga_beli }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga_jual" class="form-label">Harga Jual</label>
                                <input type="number" class="form-control" name="harga_jual" id="harga_jual" value="{{ $produk->harga_jual }}">
                            </div>
                            <div class="mb-3">
                                <label for="total_stok" class="form-label">Stok Awal</label>
                                <input type="number" class="form-control" name="sisa_stok" id="sisa_stok" value="{{ $produk->stok }}" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endsection
    {{-- @foreach ($satuan_produks as $satuan)
            						<option value="{{ $satuan->id }}">{{ $satuan->satuan_produk }}</option>
            					@endforeach --}}
