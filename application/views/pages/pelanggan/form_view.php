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
                    <form method="post" action="<?= base_url('pelanggan/view/'.$data->id_pelanggan) ?>">
                    <div class="form-group">
                      <label for="user">User <span class="label-required">*</span></label>
                      <input type="text" name="user" class="form-control" id="user" required readonly value="<?=$data->user?>">
                    </div>

                    <div class="form-group">
                      <label for="nama_pelanggan">Nama Pelanggan<span class="label-required"> *</span></label>
                      <input readonly type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?=$data->nama_pelanggan ?>">
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea readonly type="text" class="form-control" id="alamat" name="alamat" cols="30" rows="5" ><?=$data->alamat ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-optional"> ( Optional )</span></label>
                      <input readonly type="text" class="form-control" id="email" name="email" value="<?=$data->email ?>">
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon<span class="label-optional"> ( Optional )</span></label>
                      <input readonly type="text" class="form-control" id="telpon" name="telpon" value="<?=$data->telpon ?>">
                    </div>
                    
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="status">Status<span class="label-optional"> ( Optional )</span></label>
                          <input readonly type="text" class="form-control" id="status" name="status" value="<?=$data->status ?>">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="aktiv">Active<span class="label-optional"> ( Optional )</span></label>
                          <input readonly type="text" class="form-control" id="aktiv" name="aktiv" value="<?php echo $data->aktiv ?>">
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
                          <input readonly type="number" class="form-control" id="hutang" name="hutang" required min="0" value="<?php echo $data->hutang ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar <span class="label-optional"> ( Optional )</span></label>
                      <input readonly type="text" name="gambar" id="gambar" class="form-control" value="<?php echo $data->gbr ?>">
                    </div>
                  </form>
                    </div>
                </div>
            </div>
          </div>
</div>

</section>