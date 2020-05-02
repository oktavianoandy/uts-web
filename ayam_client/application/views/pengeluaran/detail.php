<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data Pengeluaran </strong>
        </div>
        <div class="card-body card-block">
            <table>
                <tr>
                    <td style="width: 150px"> Nama Pengeluaran </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $pengeluaran[0]->nama; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Keterangan </td>
                    <td style="width: 50px"> : </td>
                    <td style="width: 500px"> <?= $pengeluaran[0]->keterangan; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Nominal </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= 'Rp. ' . number_format($pengeluaran[0]->harga, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Tanggal </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $pengeluaran[0]->tanggal; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Waktu </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $pengeluaran[0]->waktu; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Oleh </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $pengeluaran[0]->oleh; ?></td>
                </tr>
                <tr>
                    <td style="width: 150px"> Foto Kwitansi </td>
                    <td style="width: 50px"> </td>
                    <td> </td>
                </tr>
                <tr>
                    <td style="width: 150px"> </td>
                    <td style="width: 50px"></td>
                    <td></td>
                </tr>
            </table>
            <?php if ($pengeluaran[0]->foto == null) : ?>
                <p>Tidak ada foto kwitansi</p>
            <?php else : ?>
                <img src="<?= base_url() ?>/uploads/pengeluaran/<?= $pengeluaran[0]->foto; ?>" alt="foto kwitansi" width="400px">
            <?php endif; ?>
        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>pengeluaran/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>