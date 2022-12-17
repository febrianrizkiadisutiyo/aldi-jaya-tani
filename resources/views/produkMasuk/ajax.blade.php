@foreach($ajax_produk as $ajax)
<div class="form-group">
    <label for="">Harga Beli</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>
        <input type="text" class="form-control" id="harga_beli" value="{{ $ajax->harga_beli }}" readonly required>
    </div>
</div>