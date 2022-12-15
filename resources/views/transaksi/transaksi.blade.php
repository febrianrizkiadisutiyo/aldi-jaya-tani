@extends('layouts.master')
@section('content')
    <div class="container">
        <form action="{{ url('store_transaksi') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="mb-3 mr-5">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <select class="form-control select2" style="width: 100%;" name="id_produk" id="id_produk">
                        <option>-- Pilih Produk --</option>
                        @foreach ($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="detail_produk"></div>
                <div class="mb-3 mr-5">
                    <label for="nama_produk" class="form-label">Harga</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual">
                </div>
                <div class="mb-3 mr-5">
                    <label for="nama_produk" class="form-label">Jumlah</label>
                    <input type="text" class="form-control" name="sisa_stok" id="sisa_stok">
                </div>
                <div class="mb-3 mr-5">
                    <label for="nama_produk" class="form-label">Subtotal</label>
                    <input type="text" class="form-control" name="nama_produk" id="total">
                </div>
                <div class="col-auto mt-2">
                    <button type="submit" class="btn btn-danger mt-4 mr-3">Reset</button>
                    <button type="submit" class="btn btn-primary mt-4 ">Simpan</button>
                </div>
            </div>
            {{-- ajax --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            {{-- <script src=" asset{{'https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous' }}"></script> --}}
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#sisa_stok").keyup(function(){
                        var stok_awal = $("#sisa_stok").val();
                        var harga_jual  = $("#harga_jual").val();

                        var total = parseInt(harga_jual)*parseInt(stok_awal);
                        $("#total").val(total)
                    });
                })
            </script>
            <script type="text/javascript">
               $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               });
            </script>
            <script type="text/javascript">
               $("#id_produk").change(function(){
                var kd_produk = $("#id_produk").val();
                $.ajax({
                    type: "GET",
                    url: "/transaksi/ajax",
                    data: "id_produk="+id_produk,
                    cache:false,
                    success: function(data){
                        $('#detail_produk').html(data);
                    }
                })
               })
             </script>
            {{-- form data --}}
            <h1><br /></h1>
        </form>
        <table class="table border table-hover">
            <thead>
                <tr>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $trans)
                <tr>
                    <td>{{ $trans->id }}</td>
                    <td>{{ $trans->nama_produk }}</td>
                    <td>{{ $trans->harga_jual }}</td>
                    <td>{{ $trans->stok_awal }}</td>
                    <td>{{ $trans->stok_akhir }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h1><br /></h1>

        <form action="">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                <div class="col-md-4">
                    <input type="number" class="form-control" id="inputEmail3">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Kembalian</label>
                <div class="col-md-4">
                    <input type="number" class="form-control" id="inputPassword3">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-danger mt-4 ">Hapus</button>
                    <button type="submit" class="btn btn-primary mt-4 ">Simpan</button>
                </div>
            </div>

        </form>
    </div>
@endsection
