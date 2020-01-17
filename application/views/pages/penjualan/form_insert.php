<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="col-10 offset-md-1">
                    <form method="post" action="<?= base_url('penjualan/store') ?>">
                        <div class="form-group">
                            <label for="pelanggan">Nama Pelanggan</label>
                            <select name="id_pelanggan" id="pelanggan" class="form-control select-plugin" required>
                                <option selected disabled>Pilih pelanggan</option>
                                <?php foreach ($pelanggan as $pelanggan) : ?>
                                    <option value="<?= $pelanggan->id_pelanggan ?>"><?= $pelanggan->nama_pelanggan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <select name="id_barang" id="barang" class="form-control select-plugin" required>
                                <option selected disabled>Pilih barang</option>
                                <?php foreach ($barang as $barang) : ?>
                                    <option value="<?= $barang->id_barang ?>"><?= $barang->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invoice">Nomor Invoice</label>
                            <input type="text" name="invoice" id="invoice" class="form-control" required placeholder="No. Invoice">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="jumlah">Jumlah</label>
                                <div class="input-group">
                                    <input type="number" name="jumlah" class="form-control" id="jumlah" min="1" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon1">pcs</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="text" name="harga" class="form-control" min="1" id="harga" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="totalharga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="number" name="totalharga" id="totalharga" class="form-control" min="1" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="totalmodal">Dibayarkan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="text" name="totalmodal" id="totalmodal" class="form-control" min="1" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="datepicker">Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" id="datepicker" data-date-format="yyyy-mm-dd" placeholder="<?= date("yy-m-d") ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option selected value="hutang">Hutang</option>
                                <option value="lunas">Lunas</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Catatan (Optional)</label>
                            <textarea name="catatan" id="catatan" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $('#barang').on('change', function() {
            $.ajax({
                url: "<?= base_url('barang/search') ?>",
                data: {
                    id_barang: this.value
                },
                method: "post",
                success: function(data) {
                    const harga = document.getElementById('harga');
                    const jumlah = document.getElementById('jumlah');
                    const totalHarga = document.getElementById('totalharga');

                    harga.value = data.hargajual
                    jumlah.value = 1
                    totalHarga.value = harga.value * jumlah.value

                }
            })
        })

        $('#jumlah').on('change', function() {
            const harga = document.getElementById('harga');
            const totalHarga = document.getElementById('totalharga');
            totalHarga.value = harga.value * this.value
        })
    })
</script>