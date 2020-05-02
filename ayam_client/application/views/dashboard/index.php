<!--ini buat bodinya-->
<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> Selamat datang <b> <?= $nama ?> </b>. Semoga hari ini
            menyenangkan. :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <!--/.col-->
    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Pemasukan</div>
                        <div class="stat-digit">
                            <?php foreach ($datapemasukan as $pemasukan) {
                                echo 'Rp.' . number_format($pemasukan->total, 2, ',', '.');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Pengeluaran</div>
                        <div class="stat-digit">
                            <?php foreach ($datapengeluaran as $pengeluaran) {
                                echo 'Rp.' . number_format($pengeluaran->total, 2, ',', '.');
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-briefcase text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Jumlah Ayam</div>
                        <div class="stat-digit">
                            <?php foreach ($dataayam as $ayam) {
                                echo $ayam->total . ' ekor';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-shopping-cart text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Produksi Telur</div>
                        <div class="stat-digit">
                            <?php foreach ($dataproduksitelur as $telur) {
                                echo $telur->total . ' butir';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Riwayat Pemasukan</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datariwayatpemasukan as $rmasuk) : ?>
                            <tr>
                                <td><?= $rmasuk->nama; ?></td>
                                <td><?= $rmasuk->tanggal; ?></td>
                                <td><?= 'RP. '.number_format($rmasuk->harga, 2, ',', '.');?></td>
                                <td><?= $rmasuk->oleh; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Riwayat Pengeluaran</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Pengeluaran</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datariwayatpengeluaran as $rkeluar) : ?>
                            <tr>
                                <td><?= $rkeluar->nama; ?></td>
                                <td><?= $rkeluar->tanggal; ?></td>
                                <td><?= 'RP. '.number_format($rkeluar->harga, 2, ',', '.');?></td>
                                <td><?= $rkeluar->oleh; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div> <!-- .content -->
</div><!-- /#right-panel -->