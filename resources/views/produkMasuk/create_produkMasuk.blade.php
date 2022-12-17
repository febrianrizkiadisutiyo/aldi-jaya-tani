@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card w-75 mt-2">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Produk Masuk</h2>
                <a href="/produkMasuk"type="button" class="close" style="text-decoration: none"><i class="bi bi-x-lg"></i></a>
            </div>
            <div class="card-body">
                <form action="{{ url('store_produkMasuk') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <div class="mb-3 mr-5">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <select class="form-control select2" style="width: 100%;" onchange="pilih()" name="id_produk" id="id_produk">
                                <option>-- Pilih Produk --</option>
                                @foreach ($produk as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="satuan_produk" class="form-label">Satuan Produk</label>
                        <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk">
                    </div>
                    <div class="mb-3">
                        <label for="satuan_produk" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk">
                    </div>
                    <div class="mb-3">
                        <label for="satuan_produk" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk">
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
    @section('js')
        <script type="text/javascript">
            $function pilih(){
                var id_produk = $("#id_produk").val();
                $.ajax({
                    type: "GET"
                    url: "/produkMasuk/ajax",
                    data: "id_produk=" + id_produk,
                    success: function(data){
                        $("#harga_beli").val(data.harga_beli);
                    }
                });
            }
        </script>
    @endsection
@endsection
    {{-- ajax --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#id_produk").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"id_produk="+id_produk,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#satuan_produk').val(obj.satuan_produk);
                    $('#jumlah_masuk').val(obj.jumlah_masuk);
                    $('#harga_beli').val(obj.harga_beli); 
                });
            }
        </script> --}}
