<?php $no = 1; ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Pilih Pegawai</strong>
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
                                <a href="<?= base_url('user/tambahUser/' . $peg->id_pegawai) ?>">
                                    <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Buat user</button>
                                </a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?= base_url()?>user/">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>
</div>