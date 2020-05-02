<?php
$no = 1;
?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Produksi"></div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Pilih Ayam</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Ayam</th>
                        <th>Kondisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ayam as $aym) : ?>
                        <?php if ($aym->kandang == $kandang[0]->nama) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $aym->nama; ?></td>
                                <td><?= $aym->kondisi; ?></td>
                                <td class="align-left">
                                    <a href="<?= base_url('produksi/tambahProduksi/' . $aym->id_ayam) ?>">
                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> Tambah data</button>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?= base_url() ?>produksi/pilihKandang">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>
</div>