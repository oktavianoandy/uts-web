<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data Produksi </strong>
        </div>
        <div class="card-body card-block">
            <table>
                <tr>
                    <td style="width: 150px"> Nama ayam </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $produksi[0]->nama; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Jumlah </td>
                    <td style="width: 50px"> : </td>
                    <td style="width: 500px"> <?= $produksi[0]->jumlah . ' butir'; ?></td>
                </tr>

                <tr>
                    <td style="width: 150px"> Tanggal </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $produksi[0]->tanggal; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Waktu </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $produksi[0]->waktu; ?></td>
                </tr>
            </table>

            <hr>
            <h6 class="mb-2">Produksi hari ini, <b><?= $produksi[0]->tanggal ?></b></h6>
            <table class="table table-bordered">
                <tr>
                    <th style="width:200px">Waktu</th>
                    <th>Jumlah telur</th>
                </tr>
                <?php foreach ($produksiAll as $all) : ?>
                    <?php if ($produksi[0]->tanggal == $all->tanggal && $produksi[0]->nama == $all->nama):?>
                    <tr>
                        <td><?= $all->waktu?></td>
                        <td><?= $all->jumlah?></td>
                    </tr>
                    <?php endif;?>
                <?php endforeach; ?>
                <tr></tr>
            </table>

        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>produksi/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>