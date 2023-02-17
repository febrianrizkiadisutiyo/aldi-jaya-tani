@extends('layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="card-body shadow-lg">
        <div class="container">
            <h1>Tampilan Produk Masuk</h1>
            <br />
            <div class="row g-3">
                <div class="col">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
                        <i class="bi bi-plus-lg"></i> Tambah Produk Masuk
                    </button>
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
                        <th scope="col">Kode Produk Masuk</th>
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
                            <th scope="row">{{ $pm->kode_pm }}</th>
                            <td>{{ $pm->Produk->nama_produk }}</td>
                            <td>{{ $pm->Produk->satuanProduk->satuan_produk }}</td>
                            <td>Rp.{{ number_format($pm->harga) }}</td>
                            <td>{{ $pm->jumlah_masuk }}</td>
                            <td>{{ date('d F Y', strtotime($pm->tanggal_masuk)) }}</td>
                            <td>Rp.{{ number_format($pm->total_harga) }}</td>
                            {{-- <td>Rp.{{ number_format($pm->jumlah_masuk * $pm->Produk->harga_beli) }}</td> --}}
                            @if (auth()->user()->role == 'pemilikToko')
                                <td>
                                    <form action="{{ 'delete_produkMasuk/' . $pm->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Anda yakin Ingin Menghapus {{ $pm->Produk->nama_produk }}')"><i
                                                class="bi bi-trash3"></i> Delete</button>
                                    </form>
                                </td>
                            @endif

                        </tr>
                    @endforeach


                </tbody>
            </table>
            <div class="pagination">
                {{ $produkMasuk->links() }}
            </div>
        </div>
    </div>

    <!-- Modal create -->
    <div class="modal" id="modalcreate">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title">Tambah Data Produk Masuk</h1>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ url('store_produkMasuk') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Kode Produk Masuk</label>
                            <input type="text" class="form-control" readonly value=" {{ 'PM-' . $kode }}" name="kode_pm"
                                id="kode_pm">
                        </div>

                        {{-- <div class="mb-3">
                            <div class="mb-3 mr-5">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <select class="form-control select2" style="width: 100%;" name="id_produk" id="id_produk">
                                    
                                </select>
                            </div>
                        </div> --}}
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
                            <label for="satuan_produk" class="form-label">Jumlah Masuk</label>
                            <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk">
                        </div>
                        <div class="mb-3">
                            <label for="satuan_produk" class="form-label">tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- select2 --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            $('#id_produk').select2();
            
        });
    </script> --}}
@endsection




{{-- <td colspan="6">
                        <td>Rp.{{ number_format($pm->jumlah_masuk * $pm->Produk->harga_beli) }}</td>
                        
                    </td> --}}

{{-- <td>Rp.{{ number_format($pm->total_harga) }}</td> --}}
{{-- <a href="/create_produkMasuk" type="button" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah
                        Produk Masuk</a> --}}

{{-- <div class="mb-3">
                                <label for="satuan_produk" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk" onkeyup="autofill()">
                            </div> --}}
{{-- <div class="mb-3">
                                <label for="satuan_produk" class="form-label">Satuan Produk</label>
                                <input type="text" class="form-control" name="satuan_produk" id="satuan_produk">
                            </div> --}}

{{-- <div class="mb-3">
                                <label for="satuan_produk" class="form-label">Harga Beli</label>
                                <input type="text" class="form-control" name="harga_beli" id="harga_beli" value="{{ $pm->harga_beli }}">
                            </div>
                            <div class="mb-3">
                                <label for="satuan_produk" class="form-label">Harga Jual</label>
                                <input type="text" class="form-control" name="harga_jual" id="harga_jual"  value="{{ $pm->harga_jual }}">
                            </div> --}}

{{-- <script type="text/javascript">
function autofill(){
    var nama_produk = $('#nama_produk').val();
    $.ajax({
        type: 'GET'
        url: 'ajax'
        data:"nama_produk="+nama_produk
    }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#harga_beli').val(obj.harga_beli);
        $('#harga_jual').val(obj.harga_jual);
    });
} --}}
{{-- // $("id_produk").change(function(){
//     var id_produk = $("#id_produk").val();
//     $.ajax({
//         type: "GET",
//         url : "/produkMasuk/ajax",
//         data: "id_produk="+id_produk,
//         cache:false,
//         success: function(data){
//             $('#detail').html(data);
//         }
//     })
// }) --}}
{{-- </script> --}}






{{-- <td> {{ $pm->tanggal_masuk}}</td> --}}
{{-- <td>{{ showDateTime($pm->tanggal_masuk,'d F Y') }}</td> --}}
