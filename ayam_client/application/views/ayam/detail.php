<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data Ayam </strong>
        </div>
        <div class="card-body card-block">
            <table>
                <tr>
                    <td style="width: 150px"> Nama ayam </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $ayam[0]->nama; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Usia </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $ayam[0]->usia . ' bulan'; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Rata-rata produksi </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $ayam[0]->produksi . ' butir/hari'; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Kandang </td>
                    <td style="width: 50px"> : </td>
                    <td>
                        <?php foreach ($kandang as $kdg) {
                            if ($kdg->id_kandang == $ayam[0]->id_kandang) {
                                echo $kdg->nama;
                            }
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 150px"> Kondisi ayam </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $ayam[0]->kondisi; ?></td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>ayam/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>