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
            <form method="post" action="<?= base_url('pelanggan/update/' . $data->id_pelanggan) ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="user">User <span class="label-required">*</span></label>
                <select name="user" class="form-control select-plugin" id="user" required>
                  <option value="0">Master</option>
                  <?php foreach ($user as $user) : ?>
                    <?php if ($data->user == $user->no_telp) : ?>
                      <option selected value="<?= $data->user ?>"><?= $data->user ?></option>
                    <?php else : ?>
                      <option value="<?= $user->no_telp ?>"><?= $user->no_telp ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan<span class="label-required"> *</span></label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required value="<?php echo $data->nama_pelanggan ?>">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat<span class="label-required"> *</span></label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" required cols="30" rows="5"><?php echo $data->alamat ?></textarea>
              </div>

              <div class="form-group">
                <label for="email">Email<span class="label-optional"> ( Optional )</span></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
              </div>

              <div class="form-group">
                <label for="telpon">Telepon<span class="label-optional"> ( Optional )</span></label>
                <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo $data->telpon ?>">
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="status">Status<span class="label-optional"> ( Optional )</span></label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $data->status ?>">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="aktiv">Active<span class="label-optional"> ( Optional )</span></label>
                    <input type="text" class="form-control" id="aktiv" name="aktiv" value="<?php echo $data->aktiv ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <label for="hutang">Hutang <span class="label-optional">( Optional )</span></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">Rp</span>
                    </div>
                    <input type="number" class="form-control" id="hutang" name="hutang" value="<?php echo $data->hutang ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="gambar">Gambar <span class="label-optional">( Optional )</span></label>
                <input type="file" name="gambar" id="gambar" class="form-control" aria-describedby="gambarHelp">
                <small id="gambarHelp" class="form-text text-muted">Biarkan kosong bila tidak ingin merubah gambar Pelanggan.</small>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>