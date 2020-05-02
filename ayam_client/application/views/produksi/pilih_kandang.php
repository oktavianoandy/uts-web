<?php $no = 1; ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Pilih Kandang</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kandang</th>
                        <th>Jumlah ayam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kandang as $kdg) : ?>
                        <?php if ($kdg->jumlah != 0) :?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $kdg->nama; ?></td>
                            <td><?= $kdg->jumlah; ?></td>
                            <td class="align-left">
                                <a href="<?= base_url('produksi/pilihAyam/' . $kdg->id_kandang) ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-chevron-circle-right"></i> Masuk</button>
                                </a>
                            </td>
                        </tr>
                        <?php endif;?>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?= base_url()?>produksi/">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>
</div>