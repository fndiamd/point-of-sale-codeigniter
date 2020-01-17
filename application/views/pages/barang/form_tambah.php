<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('barang/store') ?>">
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>

                    <div class="form-group">
                      <label for="kodebarang">Kode Barang</label>
                      <input type="text" class="form-control" id="kodebarang" name="kodebarang">
                    </div>

                    <div class="form-group">
                      <label for="hargabeli">Harga Beli</label>
                      <input type="text" class="form-control" id="hargabeli" name="hargabeli">
                    </div>

                    <div class="form-group">
                      <label for="hargajual">Harga Jual</label>
                      <input type="text" class="form-control" id="hargajual" name="hargajual">
                    </div>

                    <div class="form-group">
                      <label for="stok">Stok</label>
                      <input type="text" class="form-control" id="stok" name="stok">
                    </div>

                    <div class="form-group">
                      <label for="minimalstok">Minimal Stok</label>
                      <input type="text" class="form-control" id="minimalstok" name="minimalstok">
                    </div>

                    <div class="form-group">
                      <label for="diskon">Diskon</label>
                      <input type="text" class="form-control" id="diskon" name="diskon">
                    </div>

                    <div class="form-group">
                      <label for="deskripsi">Deskripsi Barang</label>
                      <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</section>