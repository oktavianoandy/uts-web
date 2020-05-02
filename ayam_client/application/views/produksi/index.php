<?php $no = 1; ?>
<div class="berhasil" data-flashdata="<?php echo $this->session->flashdata('berhasil'); ?>"></div>
<div class="gagal" data-flashdata="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div class="nama" data-flashdata="Produksi"></div>
<div class="col-lg-12 mt-2">
    <ol class="breadcrumb">
        <div class="col-lg-12">
            <a href="<?= base_url() ?>produksi/pilihKandang/">
                <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-plus-circle"></i> Tambah data</button>
            </a>
            <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                <a href="<?= base_url() ?>produksi/laporan_pdf/">
                    <button type="submit" class="btn btn-secondary btn-sm float-right"> <i class="fa fa-print"></i> Cetak laporan keseluruhan</button>
                </a>
            <?php endif ?>
            <?php if ($this->session->userdata('level') != "Pegawai") : ?>
                <a href="<?= base_url() ?>produksi/laporan_pdf2/">
                    <button type="submit" class="btn btn-secondary btn-sm float-right mr-2"> <i class="fa fa-print"></i> Cetak laporan hari ini</button>
                </a>
            <?php endif ?>
        </div>
    </ol>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Produksi</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered" id="produksi">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tgl : Waktu</th>
                        <th>Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php if ($this->session->userdata('level') == "Pegawai") : ?>
                    <tbody>
                        <?php foreach ($produksi as $pr) : ?>
                            <?php if ($pr->oleh == $nama) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $pr->nama; ?></td>
                                    <td><?= $pr->jumlah . ' butir'; ?></td>
                                    <td><?= $pr->tanggal . ' : ' . $pr->waktu; ?></td>
                                    <td><?= $pr->oleh; ?></td>
                                    <td class="align-left">
                                        <a href="<?= base_url('produksi/detailProduksi/' . $pr->id_produksi) ?>">
                                            <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                        </a>
                                        <a href="<?= base_url('produksi/editProduksi/' . $pr->id_produksi) ?>">
                                            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                        </a>
                                        <a class="btn-hapus" href="<?= base_url('produksi/hapusProduksi/' . $pr->id_produksi) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                <?php else : ?>
                    <tbody>
                        <?php foreach ($produksi as $pr) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $pr->nama; ?></td>
                                <td><?= $pr->jumlah . ' butir'; ?></td>
                                <td><?= $pr->tanggal . ' : ' . $pr->waktu; ?></td>
                                <td><?= $pr->oleh; ?></td>
                                <td class="align-left">
                                    <a href="<?= base_url('produksi/detailProduksi/' . $pr->id_produksi) ?>">
                                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Detail</button>
                                    </a>
                                    <a href="<?= base_url('produksi/editProduksi/' . $pr->id_produksi) ?>">
                                        <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-pencil"></i> Edit</button>
                                    </a>
                                    <a class="btn-hapus" href="<?= base_url('produksi/hapusProduksi/' . $pr->id_produksi) ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash-o"> </i> Hapus</button>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif ?>
            </table>
        </div>
    </div>
</div>