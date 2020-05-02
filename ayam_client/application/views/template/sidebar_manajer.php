<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?= base_url()?>dashboard/">SIMP <b>AYAM</b></a>
            <a class="navbar-brand hidden" href="<?= base_url()?>dashboard/"><b>S</b></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>dashboard/"> <i class="menu-icon fa fa-home"></i>Halaman Utama</a>
                </li>
                <h3 class="menu-title">Data Peternakan</h3><!-- /.menu-title -->
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>ayam/" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-star"></i>Ayam</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>kandang/" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Kandang </a>
                </li>

                <h3 class="menu-title">Aktivitas Peternakan</h3><!-- /.menu-title -->
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>produksi/" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Produksi</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>pemasukan/" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Pemasukan</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>pengeluaran/" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Pengeluaran</a>
                </li>

                <h3 class="menu-title">Data Pegawai</h3><!-- /.menu-title -->
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>pegawai/" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Pegawai</a>
                </li>
                <li class="menu-item dropdown">
                    <a href="<?= base_url()?>user/" class="dropdown-toggle" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User</a>
                </li>

                <h3 class="menu-title">Aksi</h3><!-- /.menu-title -->
                <li class="menu-item">
                    <a href="<?= base_url()?>login/logout" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sign-out"></i>Keluar</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->