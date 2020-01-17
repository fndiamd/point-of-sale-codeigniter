<section class="content">
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('barang/') ?>">
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" readonly class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data->nama_barang ?>">
                    </div>

                    <div class="form-group">
                      <label for="kodebarang">Kode Barang</label>
                      <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $data->kodebarang ?>">
                    </div>

                    <div class="form-group">
                      <label for="hargabeli">Harga Beli</label>
                      <input type="text" readonly class="form-control" id="hargabeli" name="hargabeli" value="<?php echo $data->hargabeli ?>">
                    </div>

                    <div class="form-group">
                      <label for="hargajual">Harga Jual</label>
                      <input type="text" readonly class="form-control" id="hargajual" name="hargajual" value="<?php echo $data->hargajual ?>">
                    </div>

                    <div class="form-group">
                      <label for="stok">Stok</label>
                      <input type="text" readonly class="form-control" id="stok" name="stok" value="<?php echo $data->stok ?>">
                    </div>

                    <div class="form-group">
                      <label for="minimalstok">Minimal Stok</label>
                      <input type="text" readonly class="form-control" id="minimalstok" name="minimalstok" value="<?php echo $data->minimalstok ?>">
                    </div>

                    <div class="form-group">
                      <label for="diskon">Diskon</label>
                      <input type="text" readonly class="form-control" id="diskon" name="diskon" value="<?php echo $data->diskon ?>">
                    </div>

                    <div class="form-group">
                      <label for="deskripsi">Deskripsi Barang</label>
                      <input type="text" readonly class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data->deskripsi ?>">
                    </div>

                  <button type="submit" class="btn btn-primary">Kembali</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</section>