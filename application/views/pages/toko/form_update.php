<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <a href="<?= base_url('toko') ?>" class="btn btn-default">
          <i class="fa fa-arrow-left"></i>&nbsp; Kembali
        </a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form method="post" action="<?= base_url('toko/update/' . $data->id_toko) ?>">
              <div class="form-group">
                <label for="nama_toko">Nama Toko</label>
                <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?php echo $data->nama_toko ?>">
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data->alamat ?>">
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $data->email ?>">
              </div>

              <div class="form-group">
                <label for="nohp">Nomor HP</label>
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $data->nohp ?>">
              </div>

              <div class="form-group">
                <label for="user">User </label>
                <input type="text" class="form-control" id="user" name="user" value="<?php echo $data->user ?>">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>