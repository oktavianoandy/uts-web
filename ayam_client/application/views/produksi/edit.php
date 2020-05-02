<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Edit Data Produksi </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>produksi/editProduksi/" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_produksi" value="<?= $produksi[0]->id_produksi ?>">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama ayam</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="form-control" value="<?= $produksi[0]->nama; ?>" disabled="">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="jumlah" class=" form-control-label">Jumlah telur</label></div>
                    <?php if (form_error('jumlah')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="jumlah" name="jumlah" placeholder="Masukkan jumlah telur" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('jumlah')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="jumlah" name="jumlah" placeholder="Masukkan jumlah telur" class="form-control" value="<?= $produksi[0]->jumlah; ?>">
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
                        <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal" placeholder="Masukkan tanggal pemasukan" class="form-control date-picker" value="<?= $produksi[0]->tanggal; ?>">
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
                        <div class="col-12 col-md-9"><input type="time" id="waktu" name="waktu" placeholder="Masukkan waktu pemasukan" class="form-control" value="<?= $produksi[0]->waktu; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="oleh" class=" form-control-label">Oleh</label></div>
                    <div class="col-12 col-md-9">
                        <select name="oleh" id="oleh" class="form-control">
                            <option value="">Pilih pegawai</option>
                            <?php foreach ($pegawai as $peg) : ?>
                                <?php if ($peg->nama == $produksi[0]->oleh) : ?>
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
                <i class="fa fa-plus-circle"></i> Ubah
            </button>
            </form>
            <a href="<?= base_url() ?>produksi/?>">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>