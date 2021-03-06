<?php $no1 = 1;
$no2 = 1; ?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Pengeluaran"></div>
<div class="col-lg-12 mt-2">
    <ol class="breadcrumb">
        <div class="col-lg-12">
            <a href="<?= base_url() ?>pengeluaran/tambahPengeluaran/">
                <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Tambah data</button>
            </a>
            <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                <a href="<?= base_url() ?>pengeluaran/laporan_pdf/">
                    <button type="submit" class="btn btn-secondary btn-sm float-right"> <i class="fa fa-print"></i> Cetak laporan keseluruhan</button>
                </a>
            <?php endif ?>
            <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                <a href="<?= base_url() ?>pengeluaran/laporan_pdf2/">
                    <button type="submit" class="btn btn-secondary btn-sm float-right mr-2"> <i class="fa fa-print"></i> Cetak laporan hari ini</button>
                </a>
            <?php endif ?>
        </div>
    </ol>
</div>

<?php if ($this->session->userdata('level') == "Pegawai") : ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengeluaran oleh <?= $nama ?> </strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengeluaran as $pkeluar) : ?>
                            <?php if ($pkeluar->oleh == $nama) : ?>
                                <tr>
                                    <td><?= $no1 ?></td>
                                    <td><?= $pkeluar->nama; ?></td>
                                    <td><?= 'Rp. ' . number_format($pkeluar->harga, 2, ',', '.'); ?></td>
                                    <td><?= $pkeluar->tanggal ?></td>
                                    <td class="align-left">
                                        <a href="<?= base_url('pengeluaran/detailPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                            <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                        </a>
                                        <a href="<?= base_url('pengeluaran/editPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                        </a>
                                        <a class="btn-hapus" href="<?= base_url('pengeluaran/hapusPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no1++ ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengeluaran Keseluruhan </strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengeluaran as $pkeluar) : ?>
                            <tr>
                                <td><?= $no2 ?></td>
                                <td><?= $pkeluar->nama; ?></td>
                                <td><?= 'Rp. ' . number_format($pkeluar->harga, 2, ',', '.'); ?></td>
                                <td><?= $pkeluar->tanggal; ?></td>
                                <td><?= $pkeluar->oleh; ?></td>
                                <td class="align-left">
                                    <a href="<?= base_url('pengeluaran/detailPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                    </a>
                                </td>
                            </tr>
                            <?php $no2++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Pengeluaran</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            <th>Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengeluaran as $pkeluar) : ?>
                            <tr>
                                <td><?= $no1 ?></td>
                                <td><?= $pkeluar->nama; ?></td>
                                <td><?= 'Rp. ' . number_format($pkeluar->harga, 2, ',', '.'); ?></td>
                                <td><?= $pkeluar->tanggal; ?></td>
                                <td><?= $pkeluar->oleh; ?></td>
                                <td class="align-left">
                                    <a href="<?= base_url('pengeluaran/detailPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                    </a>
                                    <a href="<?= base_url('pengeluaran/editPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                    </a>
                                    <a class="btn-hapus" href="<?= base_url('pengeluaran/hapusPengeluaran/' . $pkeluar->id_pengeluaran) ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                    </a>
                                </td>
                            </tr>
                            <?php $no1++ ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>