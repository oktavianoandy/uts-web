<?php $no = 1; ?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Kandang"></div>
<?php if ($this->session->userdata('level') != "Pegawai") : ?>
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="<?= base_url() ?>kandang/tambahKandang">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Tambah data</button>
                </a>
            </ol>
        </nav>
    </div>
<?php endif; ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Kandang</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kapasitas</th>
                        <th>Jumlah ayam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kandang as $kndg) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $kndg->nama; ?></td>
                            <td><?= $kndg->kapasitas . ' ekor'; ?></td>
                            <td><?= $kndg->jumlah . ' ekor'; ?></td>
                            <td class="align-left">
                                <a href="<?= base_url('kandang/detailKandang/' . $kndg->id_kandang) ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                </a>
                                <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                                    <a href="<?= base_url('kandang/editKandang/' . $kndg->id_kandang) ?>">
                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                    </a>
                                    <a class="btn-hapus-kandang" href="<?= base_url('kandang/hapusKandang/' . $kndg->id_kandang) ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>