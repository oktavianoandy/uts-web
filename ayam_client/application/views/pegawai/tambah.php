<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Tambah Data Pegawai </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>pegawai/tambahPegawai" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama pegawai</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pegawai" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama pegawai" class="form-control">
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
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" class="form-check-input" checked>Laki-laki
                                </label>
                            </div>
                            <div class="radio">
                                <label for="perempuan" class="form-check-label ">
                                    <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" class="form-check-input">Perempuan
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
                        <div class="col-12 col-md-9"><input type="text" id="no_hp" name="no_hp" placeholder="Masukkan nomor handphone" class="form-control">
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
                        <div class="col-12 col-md-9"><textarea name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat" class="form-control"></textarea>
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
                                <option value="">Pilih status</option>
                                <option value="Manajer">Manajer</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (form_error('foto')) : ?>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="foto" class=" form-control-label">Foto pegawai</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="is-invalid form-control-file">
                            <small class="form-text text-danger"> <?= (form_error('foto')) ?></small>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="foto" class=" form-control-label">Foto pegawai</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="foto" name="foto" class="form-control-file"></div>
                    </div>
                <?php endif; ?>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-plus-circle"></i> Tambah
            </button>
            </form>
            <button type="reset" class="btn btn-danger btn-sm" name="reset">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
    </div>