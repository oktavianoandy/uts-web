<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data Pegawai </strong>
        </div>
        <div class="card-body card-block">
            <div class="col-lg-2">
                <?php if ($pegawai[0]->foto == null) : ?>
                    <p>Tidak ada foto</p>
                <?php else : ?>
                    <img class="rounded img-thumbnail" src="<?= base_url() ?>/uploads/pegawai/<?= $pegawai[0]->foto; ?>" alt="foto pegawai" width="200px">
                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <table>
                    <tr>
                        <td style="width: 150px"> Nama pegawai </td>
                        <td style="width: 50px"> : </td>
                        <td> <?= $pegawai[0]->nama; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"> Jenis kelamin </td>
                        <td style="width: 50px"> : </td>
                        <td> <?= $pegawai[0]->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"> Nomor HP </td>
                        <td style="width: 50px"> : </td>
                        <td> <?= $pegawai[0]->no_hp; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"> Alamat </td>
                        <td style="width: 50px"> : </td>
                        <td> <?= $pegawai[0]->alamat; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 150px"> Status </td>
                        <td style="width: 50px"> : </td>
                        <td> <?= $pegawai[0]->status; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>pegawai/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>