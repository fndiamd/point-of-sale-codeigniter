<section class="content">
<div class="container-fluid">
<div class="row">
      <div class="col-12">
        <a href="<?= base_url('supplier') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
</div>
<br>
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <form method="post" action="<?= base_url('supplier/update/'.$data->id_supplier) ?>" enctype="multipart/form-data">
                    
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
                      <label for="nama_supplier">Nama Supplier<span class="label-required">*</span></label>
                      <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?php echo $data->nama_supplier ?>">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea type="text" class="form-control" id="alamat" cols="30" rows="5" name="alamat"><?php echo $data->alamat ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-optional"> ( Optional )</span></label>
                      <input type="text" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="telpon" name="telpon" value="<?php echo $data->telpon ?>">
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="profinsi">Provinsi<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="profinsi" name="profinsi" value="<?php echo $data->profinsi ?>">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="kota">Kota<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $data->kota ?>">
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
                          <input type="number" class="form-control" id="hutang" name="hutang" min="0" value="<?php echo $data->hutang ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar <span class="label-optional">( Optional )</span></label>
                      <input type="file" name="gambar" id="gambar" class="form-control" aria-describedby="gambarHelp">
                      <small id="gambarHelp" class="form-text text-muted">Biarkan kosong bila tidak ingin merubah gambar Supplier.</small>
                    </div>

                    <div class="form-group">
                      <label for="aktiv">Active<span class="label-optional"> ( Optional )</span></label>
                      <input type="text" class="form-control" id="aktiv" name="aktiv" value="<?php echo $data->aktiv ?>">
                    </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>