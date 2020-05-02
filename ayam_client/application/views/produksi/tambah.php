<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Tambah Data Produksi </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>produksi/tambahProduksi/<?= $ayam[0]->id_kandang; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_ayam" value="<?= $ayam[0]->id_ayam; ?>">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama ayam</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="form-control" value="<?= $ayam[0]->nama; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="jumlah" class=" form-control-label">Jumlah telur</label></div>
                        <div class="col-12 col-md-9"><input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah telur" class="form-control" required>
                            <small class="form-text text-danger"> </small>
                        </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-2"><label for=tanggal" class=" form-control-label">Tanggal pemasukan</label></div>
                    <?php if (form_error('tanggal')) : ?>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('tanggal')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" class="form-control date-picker" value="<?= $tanggal; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for=waktu" class=" form-control-label">Waktu pemasukan</label></div>
                    <?php if (form_error('waktu')) : ?>
                        <div class="col-12 col-md-9"><input type="time" id="waktu" name="waktu" placeholder="Masukkan waktu pemasukan" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('waktu')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="time" id="waktu" name="waktu" placeholder="Masukkan waktu pemasukan" class="form-control" value="<?= $waktu; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="oleh" class=" form-control-label">Oleh</label></div>
                    <div class="col-12 col-md-9">
                        <select name="oleh" id="oleh" class="form-control">
                            <?php foreach ($pegawai as $peg) : ?>
                                <?php if ($peg->nama == $nama) : ?>
                                    <option value="<?= $peg->nama ?>" selected><?= $peg->nama ?></option>
                                <?php else : ?>
                                    <option value="<?= $peg->nama ?>"><?= $peg->nama ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-plus-circle"></i> Tambah
            </button>
            </form>
            <a href="<?= base_url() ?>produksi/pilihAyam/<?= $ayam[0]->id_kandang ?>">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>