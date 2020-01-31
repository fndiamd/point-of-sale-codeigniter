<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('pelanggan') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('pelanggan/store') ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="user">Toko <span class="label-required"> *</span></label>
                <select name="user" class="form-control select-plugin select2-toko" id="user" required>
                  <option value="" selected>--- Pilih Toko ---</option>
                  <option value="0">Master</option>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required placeholder="Nama Pelanggan">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat<span class="label-required"> *</span></label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" cols="30" rows="5" required placeholder="Alamat Pelanggan"></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email<span class="label-optional"> ( Optional )</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Pelanggan">
              </div>

              <div class="form-group">
                <label for="telpon">Telepon<span class="label-optional"> ( Optional )</span></label>
                <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telepon Pelanggan">
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="status">Status<span class="label-optional"> ( Optional )</span></label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Status Pelanggan">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="aktiv">Active<span class="label-optional"> ( Optional )</span></label>
                    <input type="text" class="form-control" id="aktiv" name="aktiv" placeholder="Active Pelanggan">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="hutang">Hutang<span class="label-optional"> ( Optional )</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hutang" name="hutang" placeholder="Hutang Pelanggan">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="gambar">Gambar<span class="label-optional"> ( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>