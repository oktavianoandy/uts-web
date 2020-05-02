<?php $no = 1; ?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Pegawai"></div>

<div class="col-lg-12 mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <div class="col-lg-12">
                <a href="<?= base_url() ?>pegawai/tambahPegawai/">
                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Tambah data</button>
                </a>
            </div>
        </ol>
    </nav>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Pegawai</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $peg) : ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $peg->nama; ?></td>
                            <td><?= $peg->jenis_kelamin; ?></td>
                            <td><?= $peg->status; ?></td>
                            <td class="align-left">
                                <a href="<?= base_url('pegawai/detailPegawai/' . $peg->id_pegawai) ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                </a>
                                <a href="<?= base_url('pegawai/editPegawai/' . $peg->id_pegawai) ?>">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                </a>
                                <a class="btn-hapus" href="<?= base_url('pegawai/hapusPegawai/' . $peg->id_pegawai) ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>