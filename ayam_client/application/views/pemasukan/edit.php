<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Ubah Data Pemasukan </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>pemasukan/editPemasukan" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_pemasukan" value="<?= $pemasukan[0]->id_pemasukan; ?>">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama pemasukan</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pemasukan" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pemasukan" class="form-control" value="<?= $pemasukan[0]->nama; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
                <?php if (form_error('keterangan')) : ?>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                        <div class="col-12 col-md-9"><textarea name="keterangan" id="keterangan" rows="3" placeholder="Masukkan keterangan pemasukan" class="is-invalid form-control"></textarea>
                            <small class="form-text text-danger"> <?= (form_error('keterangan')) ?></small></div>
                    </div>
                <?php else : ?>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                        <div class="col-12 col-md-9"><textarea name="keterangan" id="keterangan" rows="3" placeholder="Masukkan keterangan pemasukan" class="form-control"> <?= $pemasukan[0]->keterangan; ?> </textarea>
                            <small class="form-text text-danger"></small></div>
                    </div>
                <?php endif; ?>

                <div class="row form-group">
                    <div class="col col-md-2"><label for=harga" class=" form-control-label">Nominal pemasukan</label></div>
                    <?php if (form_error('harga')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="harga" name="harga" placeholder="Masukkan besar pemasukan (angka)" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('harga')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="harga" name="harga" placeholder="Masukkan besar pemasukan (angka)" class="form-control" value="<?= $pemasukan[0]->harga; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for=tanggal" class=" form-control-label">Tanggal pemasukan</label></div>
                    <?php if (form_error('tanggal')) : ?>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('tanggal')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" class="form-control date-picker" value="<?= $pemasukan[0]->tanggal; ?>">
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
                        <div class="col-12 col-md-9"><input type="time" id="waktu" name="waktu" placeholder="Masukkan waktu pemasukan" class="form-control" value="<?= $pemasukan[0]->waktu; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="oleh" class=" form-control-label">Oleh</label></div>
                    <?php if (form_error('oleh')) : ?>
                        <div class="col-12 col-md-9">
                            <select name="oleh" id="oleh" class="is-invalid form-control">
                                <option value="">Pilih pegawai</option>
                                <?php foreach ($pegawai as $peg) : ?>
                                    <option value="<?= $peg->nama ?>"><?= $peg->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= (form_error('oleh')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9">
                            <select name="oleh" id="oleh" class="form-control">
                                <option value="">Pilih pegawai</option>
                                <?php foreach ($pegawai as $peg) : ?>
                                    <?php if ($peg->nama == $pemasukan[0]->oleh) : ?>
                                        <option value="<?= $peg->nama ?>" selected><?= $peg->nama ?></option>
                                    <?php else : ?>
                                        <option value="<?= $peg->nama ?>"><?= $peg->nama ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for=foto" class=" form-control-label">Foto kwitansi</label></div>
                    <div class="col-12 col-md-9">
                        <?php if ($pemasukan[0]->foto == null) :?>
                            <p>Tidak ada foto</p>
                        <?php else:?>
                            <img src="<?= base_url() ?>/uploads/pemasukan/<?= $pemasukan[0]->foto; ?>" alt="foto kwitansi" width="200">
                        <?php endif?>
                        <small class="form-text text-danger"></small>
                        <input type="hidden" name="fotoLama" value="<?= $pemasukan[0]->foto; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="foto" class=" form-control-label">Foto kwitansi baru</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="form-control-file"></div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-pencil"></i> Ubah
            </button>
            </form>
            <a href="<?= base_url() ?>pemasukan/">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>

    </div>