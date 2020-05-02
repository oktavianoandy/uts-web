<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Tambah Data Pegawai </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>pegawai/editPegawai" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_pegawai" value="<?= $pegawai[0]->id_pegawai; ?>">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama pegawai</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pegawai" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pegawai" class="form-control" value="<?= $pegawai[0]->nama; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label class=" form-control-label">Jenis kelamin</label></div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="radio">
                                <label for="laki-laki" class="form-check-label ">
                                    <?php if ($pegawai[0]->jenis_kelamin == "Laki-laki") : ?>
                                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" class="form-check-input" checked>Laki-laki
                                    <?php else : ?>
                                        <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" class="form-check-input">Laki-laki
                                    <?php endif ?>
                                </label>
                            </div>
                            <div class="radio">
                                <label for="perempuan" class="form-check-label ">
                                    <?php if ($pegawai[0]->jenis_kelamin == "Perempuan") : ?>
                                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" class="form-check-input" checked>Perempuan
                                    <?php else : ?>
                                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" class="form-check-input">Perempuan
                                    <?php endif ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="no_hp" class=" form-control-label">Nomor Handphone</label></div>
                    <?php if (form_error('no_hp')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="no_hp" name="no_hp" placeholder="Masukkan nomor handphone" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('no_hp')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="no_hp" name="no_hp" placeholder="Masukkan nama pegawai" class="form-control" value="<?= $pegawai[0]->no_hp; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="alamat" class=" form-control-label">Alamat</label></div>
                    <?php if (form_error('alamat')) : ?>
                        <div class="col-12 col-md-9"><textarea name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat" class="is-invalid form-control"></textarea>
                            <small class="form-text text-danger"> <?= (form_error('alamat')) ?></small></div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><textarea name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat" class="form-control"><?= $pegawai[0]->alamat; ?></textarea>
                            <small class="form-text text-danger"></small></div>
                    <?php endif; ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="status" class=" form-control-label">Status</label></div>
                    <?php if (form_error('status')) : ?>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="is-invalid form-control">
                                <option value="">Pilih status</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                            <small class="form-text text-danger"> <?= (form_error('status')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9">
                            <select name="status" id="status" class="form-control">
                                <?php foreach ($status as $s) : ?>
                                    <?php if ($s == $pegawai[0]->status) : ?>
                                        <option value="<?= $s ?>" selected><?= $s ?></option>
                                    <?php else : ?>
                                        <option value="<?= $s ?>"><?= $s ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
                

                <div class="row form-group">
                    <div class="col col-md-2"><label for=foto" class=" form-control-label">Foto pegawai</label></div>
                    <div class="col-12 col-md-9">
                        <?php if ($pegawai[0]->foto == null) : ?>
                            <p>Tidak ada foto</p>
                        <?php else : ?>
                            <img class="rounded img-thumbnail" src="<?= base_url() ?>/uploads/pegawai/<?= $pegawai[0]->foto; ?>" alt="foto kwitansi" width="120">
                        <?php endif ?>
                        <small class="form-text text-danger"></small>
                        <input type="hidden" name="fotoLama" value="<?= $pegawai[0]->foto; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="foto" class=" form-control-label">Ubah foto</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="form-control-file"></div>
                </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-plus-circle"></i> Ubah
            </button>
            </form>
            <a href="<?= base_url() ?>pegawai/">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>