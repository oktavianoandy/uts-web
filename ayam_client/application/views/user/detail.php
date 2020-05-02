<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong> Detail Data User </strong>
        </div>
        <div class="card-body card-block">
            <table>
                <tr>
                    <td style="width: 120px"> Username </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $user['username']; ?></td>
                </tr>
                <tr>
                    <td style="width: 120px"> Level </td>
                    <td style="width: 50px"> : </td>
                    <td> <?= $user['level']; ?></td>
                </tr>
            </table>
        </div>

        <div class="card-footer">
            <a href="<?= base_url() ?>user/">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-arrow-circle-left"></i> Kembali
                </button>
            </a>
        </div>
    </div>