<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Edit Data Kandang </strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url() ?>kandang/editKandang" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_kandang" value="<?= $kandang[0]->id_kandang ?>">
                <div class="row form-group">
                    <div class="col col-md-2"><label for="nama" class=" form-control-label">Nama Kandang</label></div>
                    <?php if (form_error('nama')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama kandang" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('nama')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Masukkan nama kandang" class="form-control" value="<?= $kandang[0]->nama; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
                <div class="row form-group">
                    <div class="col col-md-2"><label for="kapasitas" class=" form-control-label">Kapasitas</label></div>
                    <?php if (form_error('kapasitas')) : ?>
                        <div class="col-12 col-md-9"><input type="text" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas kandang" class="is-invalid form-control">
                            <small class="form-text text-danger"> <?= (form_error('kapasitas')) ?></small>
                        </div>
                    <?php else : ?>
                        <div class="col-12 col-md-9"><input type="text" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas kandang" class="form-control" value="<?= $kandang[0]->kapasitas; ?>">
                            <small class="form-text text-danger"> </small>
                        </div>
                    <?php endif ?>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" name="submit">
                <i class="fa fa-pencil"></i> Ubah
            </button>
            </form>
            <a href="<?= base_url() ?>kandang/">
                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>