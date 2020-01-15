<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, blanditiis tenetur ratione quia porro deserunt eius provident corporis consequatur sint assumenda laudantium corrupti mollitia molestias? Voluptatem inventore assumenda rem quibusdam?
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover dataTable" id="data-tables" role="grid">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategories->result() as $kategori) : ?>
                                    <tr>
                                        <td><?= $kategori->nama_kategori ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>