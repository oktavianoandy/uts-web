<?php $no = 1; ?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Ayam"></div>
<?php if ($this->session->userdata('level') != "Pegawai") : ?>
    <div class="col-lg-12 mt-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <a href="<?= base_url() ?>ayam/tambahAyam/">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Tambah data</button>
                </a>
            </ol>
        </nav>
    </div>
<?php endif; ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Ayam</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kandang</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ayam as $aym) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $aym->nama; ?></td>
                            <td><?= $aym->kandang; ?></td>
                            <td><?= $aym->kondisi; ?></td>
                            <td class="align-left">
                                <a href="<?= base_url('ayam/detailAyam/' . $aym->id_ayam) ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                </a>
                                <a href="<?= base_url('ayam/editAyam/' . $aym->id_ayam) ?>">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                </a>
                                <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                                    <a class="btn-hapus-ayam" href="<?= base_url('ayam/hapusAyam/' . $aym->id_ayam) ?>">
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