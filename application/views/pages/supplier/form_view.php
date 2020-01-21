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
                      <input readonly name="user" class="form-control select-plugin" id="user" required value="<?=$data->user?>" readonly>
                    </div>
                    
                    <div class="form-group">
                      <label for="nama_supplier">Nama Supplier<span class="label-required">*</span></label>
                      <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?=$data->nama_supplier?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="alamat">Alamat<span class="label-required"> *</span></label>
                      <textarea type="text" class="form-control" id="alamat" cols="30" rows="5" name="alamat" readonly><?=$data->alamat ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="email">Email<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="email" name="email" value="<?=$data->email ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="telpon">Telepon<span class="label-required"> *</span></label>
                      <input type="text" class="form-control" id="telpon" name="telpon" value="<?=$data->telpon ?>" readonly>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="profinsi">Provinsi<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="profinsi" name="profinsi" value="<?=$data->profinsi ?>" readonly>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="kota">Kota<span class="label-required"> *</span></label>
                          <input type="text" class="form-control" id="kota" name="kota" value="<?=$data->kota ?>" readonly>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col">
                        <label for="hutang">Hutang<span class="label-required"> *</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                          </div>
                          <input readonly type="number" class="form-control" id="hutang" name="hutang" required min="0" value="<?=$data->hutang ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gambar">Gambar <span class="label-required"> *</span></label>
                      <input type="text" name="gambar" id="gambar" class="form-control" readonly value="<?=$data->gbr ?>">
                    </div>

                    <div class="form-group">
                      <label for="aktiv">Active<span class="label-required"> *</span></label>
                      <input type="text" readonly class="form-control" id="aktiv" name="aktiv" value="<?php echo $data->aktiv ?>">
                    </div>
                  </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>