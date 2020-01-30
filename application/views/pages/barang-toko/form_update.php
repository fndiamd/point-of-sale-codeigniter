<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('barang-toko') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('barang-toko/update/'.$barang->id_barang) ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="user">Toko <span class="label-required">*</span></label>
                <select name="user" class="form-control select-plugin" id="toko-user" required>
                  <?php foreach ($toko as $toko) : ?>
                    <?php if ($barang->user == $toko->user) : ?>
                      <option selected value="<?= $toko->user ?>"><?= $toko->nama_toko ?></option>
                    <?php else : ?>
                      <option value="<?= $toko->user ?>"><?= $toko->nama_toko ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_barang">Nama Barang <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?= $barang->nama_barang ?>" placeholder="Nama barang">
              </div>
              <div class="form-group">
                <label for="kodebarang">Kode Barang <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="kodebarang" name="kodebarang" required value="<?= $barang->kodebarang ?>" placeholder="Kode barang">
              </div>
              <div class="form-group">
                <label for="kategori">Kategori <span class="label-required">*</span></label>
                <select name="kategori" class="form-control select-plugin" id="kategori" required>
                  <option disabled selected>--- Pilih Kategori ---</option>
                  <?php foreach ($kategori as $kategori) : ?>
                    <?php if ($kategori->id_kategori == $barang->id_kategori) : ?>
                      <option selected value="<?= $barang->id_kategori ?>"><?= $barang->nama_kategori ?></option>
                    <?php else : ?>
                      <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="gambar">Gambar <span class="label-optional">( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control" aria-describedby="gambarHelp">
                <small id="gambarHelp" class="form-text text-muted">Biarkan kosong bila tidak ingin merubah gambar barang.</small>
              </div>
              <div class="row">
                <div class="col">
                  <label for="hargabeli">Harga Beli <span class="label-required">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hargabeli" name="hargabeli" required min="0" value="<?= $barang->hargabeli?>" placeholder="Harga beli barang">
                  </div>
                </div>
                <div class="col">
                  <label for="hargajual">Harga Jual <span class="label-required">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hargajual" name="hargajual" required min="0" value="<?= $barang->hargajual?>" placeholder="Harga jual barang">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <label for="stok">Stok <span class="label-required">*</span></label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="stok" name="stok" required min="1" min="0" value="<?= $barang->stok?>" placeholder="Stok barang tersedia">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1">pcs</span>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <label for="minimalstok">Minimal Stok <span class="label-required">*</span></label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="minimalstok" name="minimalstok" required min="0" value="<?= $barang->minimalstok?>" placeholder="Stok minimal barang">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1">pcs</span>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label for="diskon">Diskon <span class="label-optional">( Optional )</span></label>
                <div class="input-group">
                  <input type="number" class="form-control" id="diskon" name="diskon" value="<?= $barang->diskon?>" placeholder="Diskon barang" aria-describedby="diskonHelp">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1">%</span>
                  </div>
                </div>
                <small id="diskonHelp" class="form-text text-muted">Isikan 0 jika barang tidak diskon.</small>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi Barang <span class="label-optional">( Optional )</span></label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"><?= $barang->deskripsi?></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>