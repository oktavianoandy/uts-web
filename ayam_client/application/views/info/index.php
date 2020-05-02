<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data <?= $nama ?> </strong>
        </div>
        <div class="card-body card-block">
            <div class="col-lg-2">
                <?php foreach ($pegawai as $peg) : ?>
                    <?php if ($peg->nama == $nama) : ?>
                        <?php if ($peg->foto == null) : ?>
                            <p>Tidak ada foto</p>
                        <?php else : ?>
                            <img class="rounded img-thumbnail" src="<?= base_url() ?>/uploads/pegawai/<?= $peg->foto; ?>" alt="foto pegawai" width="200px">
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6">
                <?php foreach ($pegawai as $peg) : ?>
                    <?php if ($peg->nama == $nama) : ?>
                        <table>
                            <tr>
                                <td style="width: 150px"> Nama pegawai </td>
                                <td style="width: 50px"> : </td>
                                <td> <?= $peg->nama; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 150px"> Jenis kelamin </td>
                                <td style="width: 50px"> : </td>
                                <td> <?= $peg->jenis_kelamin; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 150px"> Nomor HP </td>
                                <td style="width: 50px"> : </td>
                                <td> <?= $peg->no_hp; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 150px"> Alamat </td>
                                <td style="width: 50px"> : </td>
                                <td> <?= $peg->alamat; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 150px"> Status </td>
                                <td style="width: 50px"> : </td>
                                <td> <?= $peg->status; ?></td>
                            </tr>
                        </table>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="card-footer">
            
        </div>
    </div>