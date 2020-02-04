<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('barang') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('barang/store') ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_barang">Nama Barang <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama barang">
              </div>
              <div class="form-group">
                <label for="kodebarang">Kode Barang <span class="label-required">*</span></label>
                <input type="text" class="form-control" id="kodebarang" name="kodebarang" required placeholder="Kode barang">
              </div>
              <div class="form-group">
                <label for="kategori">Kategori <span class="label-required">*</span></label>
                <select name="kategori" class="form-control select-plugin" id="kategori" required>
                  <option selected disabled>--- Pilih Kategori ---</option>
                  <?php foreach ($kategori as $kategori) : ?>
                    <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="gambar">Gambar <span class="label-required">*</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
              </div>
              <div class="row">
                <div class="col">
                  <label for="hargabeli">Harga Beli <span class="label-required">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hargabeli" name="hargabeli" required min="0" placeholder="Harga beli barang">
                  </div>
                </div>
                <div class="col">
                  <label for="hargajual">Harga Jual <span class="label-required">*</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hargajual" name="hargajual" required min="0" placeholder="Harga jual barang">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <label for="stok">Stok <span class="label-required">*</span></label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="stok" name="stok" required min="1" min="0" placeholder="Stok barang tersedia">
                    <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1">pcs</span>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <label for="minimalstok">Minimal Stok <span class="label-required">*</span></label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="minimalstok" name="minimalstok" required min="0" placeholder="Stok minimal barang">
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
                  <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Diskon barang" aria-describedby="diskonHelp">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1">%</span>
                  </div>
                </div>
                <small id="diskonHelp" class="form-text text-muted">Isikan 0 jika barang tidak diskon.</small>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi Barang <span class="label-optional">( Optional )</span></label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control" placeholder="Deskripsi barang anda"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>