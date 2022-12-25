@foreach($ajax_produk as $ajax)
<div class="mb-3">
    <label for="satuan_produk" class="form-label">Satuan Produk</label>
    <input type="text" class="form-control" name="satuan_produk" id="satuan_produk" value="{{ $ajax->satuanProduk_id }}">
</div>
<div class="mb-3">
    <label for="satuan_produk" class="form-label">Harga Beli</label>
    <input type="text" class="form-control" name="harga_beli" id="harga_beli" value="{{ $ajax->harga_beli }}">
</div>
<div class="mb-3">
    <label for="satuan_produk" class="form-label">Harga Jual</label>
    <input type="text" class="form-control" name="harga_jual" id="harga_jual" value="{{ $ajax->harga_jual }}">
</div>
</div>