<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Edit Data User </strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']?>">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Username</label></div>
                    <?php if (form_error('username')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Masukkan username" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('username')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Masukkan username" class="form-control" value="<?= $user['username']; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="kapasitas" class=" form-control-label">Password</label></div>
                    <?php if (form_error('password')) : ?>
                        <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Masukkan password" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('password')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Masukkan password" class="form-control" value="<?= $user['password']; ?>">
                            <small class=" form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="kapasitas" class=" form-control-label">Ulangi password</label></div>
                    <?php if (form_error('confirm_password')) : ?>
                        <div class="col-12 col-md-9"><input type="password" id="confirm_password" name="confirm_password" placeholder="Masukkan lagi password" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('confirm_password')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="password" id="confirm_password" name="confirm_password" placeholder="Masukkan lagi password" class="form-control" value="<?= $user['password']; ?>">
                            <small class=" form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-2"><label for="level" class=" form-control-label">Level</label></div>
                    <?php if (form_error('level')) : ?>
                        <div class="col-12 col-md-9">
                            <select name="level" id="level" class="is-invalid form-control">
                                <?php foreach ($level as $lv) : ?>
                                    <?php if ($lv == $user['level']) : ?>
                                        <option value="<?= $lv; ?>" selected><?= $lv; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $lv; ?>"><?= $lv; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= (form_error('level')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9">
                            <select name="level" id="level" class="form-control">
                                <?php foreach ($level as $lv) : ?>
                                    <?php if ($lv == $user['level']) : ?>
                                        <option value="<?= $lv; ?>" selected><?= $lv; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $lv; ?>"><?= $lv; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-pencil"></i> Ubah
            </button>
            </form>
            <a href="<?= base_url() ?>user">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>