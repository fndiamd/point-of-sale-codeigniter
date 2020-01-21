<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
                <i class="fa fa-tachometer-alt"></i>&nbsp;
                Dashboard
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user-secret"></i> &nbsp; <?= $this->session->userdata('nama_admin') ?>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('user/setting') ?>" class="dropdown-item">
                    <i class="fa fa-sliders-h mr-2"></i> Pengaturan akun
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-key mr-2"></i> Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                    <i class="fa fa-power-off mr-2"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>