<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Tambah Data Ayam </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>ayam/tambahAyam" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama ayam</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama ayam" class="form-control">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>


                <div class="row form-group">
                    <div class="col col-md-2"><label for=usia" class=" form-control-label">Usia ayam</label></div>
                    <?php if (form_error('usia')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="usia" name="usia" placeholder="Masukkan usia ayam (bulan)" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('usia')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="usia" name="usia" placeholder="Masukkan usia ayam (bulan)" class="form-control">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="produksi" class=" form-control-label">Produksi telur</label></div>
                    <?php if (form_error('produksi')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="produksi" name="produksi" placeholder="Masukkan rata-rata produksi telur/hari" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('produksi')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="produksi" name="produksi" placeholder="Masukkan rata-rata produksi telur/hari" class="form-control">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="id_kandang" class=" form-control-label">Kandang</label></div>
                    <?php if (form_error('id_kandang')) : ?>
                        <div class="col-12 col-md-9">
                            <select name="id_kandang" id="id_kandang" class="is-invalid form-control">
                                <option value="">Pilih kandang</option>
                                <?php foreach ($kandang as $kdg) : ?>
                                    <?php if ($kdg->kapasitas != $kdg->jumlah) : ?>
                                        <option value="<?= $kdg->id_kandang ?>"><?= $kdg->nama ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"> <?= (form_error('id_kandang')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9">
                            <select name="id_kandang" id="id_kandang" class="form-control">
                                <option value="">Pilih kandang</option>
                                <?php foreach ($kandang as $kdg) : ?>
                                    <?php if ($kdg->kapasitas != $kdg->jumlah) : ?>
                                        <option value="<?= $kdg->id_kandang ?>"><?= $kdg->nama ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row form-group">
                    <div class="col col-md-2"><label for="kondisi" class=" form-control-label">Kondisi ayam</label></div>
                    <?php if (form_error('kondisi')) : ?>
                        <div class="col-12 col-md-9">
                            <select name="kondisi" id="kondisi" class="is-invalid form-control">
                                <option value="">Pilih kondisi ayam</option>
                                <option value="sehat">Sehat</option>
                                <option value="sakit">Sakit</option>
                            </select>
                            <small class="form-text text-danger"> <?= (form_error('kondisi')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9">
                            <select name="kondisi" id="kondisi" class="form-control">
                                <option value="">Pilih kondisi ayam</option>
                                <option value="sehat">Sehat</option>
                                <option value="sakit">Sakit</option>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-plus-circle"></i> Tambah
            </button>
            <button type="reset" class="btn btn-danger btn-sm" name="reset">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
        </form>
    </div>