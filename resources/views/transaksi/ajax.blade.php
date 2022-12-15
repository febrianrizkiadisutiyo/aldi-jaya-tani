@foreach($ajax_produk as $ajax)
<div class="form-group">
    <label for="">Harga</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>
        <input type="text" class="form-control" id="harga_produk" value="{{ $ajax->harga_produk }}" readonly required>
    </div>
</div>