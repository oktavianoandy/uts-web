<?php
$jml = 0;
foreach ($ayam as $aym) {
    if ($aym->id_kandang == $kandang[0]->id_kandang) {
        $jml++;
    }
}
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data Kandang </strong>
        </div>
        <div class="card-body card-block">
            <table>
                <tr>
                    <td style="width: 120px"> Nama kandang </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $kandang[0]->nama; ?></td>
                </tr>
                <tr>
                    <td style="width: 120px"> Kapasitas </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $kandang[0]->kapasitas . ' ekor'; ?></td>
                </tr>
                <tr>
                    <td style="width: 120px"> Jumlah ayam </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $jml . ' ekor'; ?></td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>kandang/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>