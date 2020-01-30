<aside class="main-sidebar sidebar-light bg-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard')?>" class="brand-link">
        <img src="<?= base_url('assets/dist/img/profit.png') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Point of sales</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('nama_admin')?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>
                            Master Data
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('toko') ?>" class="nav-link">
                                <i class="fa fa-store-alt nav-icon"></i>
                                <p>Toko</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('barang') ?>" class="nav-link">
                                <i class="fa fa-gifts nav-icon"></i>
                                <p>Barang Master</p>
                            </a>
                        </li>
                        <li class="nav-site">
                            <a href="<?= base_url('barang-toko')?>" class="nav-link">
                                <i class="fa fa-gift nav-icon"></i>
                                <p>Barang Toko</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kategori') ?>" class="nav-link">
                                <i class="fa fa-receipt nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pelanggan') ?>" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('supplier') ?>" class="nav-link">
                                <i class="fa fa-store nav-icon"></i>
                                <p>Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('user') ?>" class="nav-link">
                                <i class="fa fa-user-shield nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Transaksi</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                        <p>
                            Penjualan
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('penjualan/data-penjualan') ?>" class="nav-link">
                                <i class="fa fa-dollar-sign nav-icon"></i>
                                <p>Data Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('penjualan/detail-penjualan') ?>" class="nav-link">
                                <i class="fa fa-search-dollar nav-icon"></i>
                                <p>Detail Penjualan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-hand-holding-usd"></i>
                        <p>
                            Pembelian
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('pembelian/data-pembelian') ?>" class="nav-link">
                                <i class="fa fa-dollar-sign nav-icon"></i>
                                <p>Data Pembelian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('pembelian/detail-pembelian') ?>" class="nav-link">
                                <i class="fa fa-search-dollar nav-icon"></i>
                                <p>Detail Pembelian</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-history"></i>
                        <p>
                            History Piutang
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('history/piutang-pelanggan') ?>" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Piutang Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('history/piutang-supplier') ?>" class="nav-link">
                                <i class="fa fa-store nav-icon"></i>
                                <p>Piutang Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Log Pembayaran
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('log-pembayaran/hutang-pelanggan') ?>" class="nav-link">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Hutang Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('log-pembayaran/hutang-supplier') ?>" class="nav-link">
                                <i class="fa fa-store nav-icon"></i>
                                <p>Hutang Supplier</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>