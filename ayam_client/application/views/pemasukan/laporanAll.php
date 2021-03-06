<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <style type="text/css">
        #outtable {
            padding: 5px;
            border: 1px solid #e3e3e3;
            width: 700px;
            border-radius: 5px;
        }

        .short {
            width: 30px;
        }

        .normal {
            width: 140px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5e5b5c;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #f6f5fa;
        }

        tbody tr:hover {
            background: #eae9f5;
        }
    </style>
</head>

<body>
    <h4>Laporan Pemasukan Keseluruhan</h4>
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">#</th>
                    <th class="normal">Nama Pemasukan</th>
                    <th class="normal">Nominal</th>
                    <th class="normal">Tgl : Waktu</th>
                    <th class="normal">Oleh</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $jml = 0; ?>
                <?php foreach ($pemasukan as $pm) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $pm->nama; ?></td>
                        <td><?php echo 'Rp. ' . number_format($pm->harga, 2, ',', '.'); ?></td>
                        <td><?php echo $pm->tanggal . ' : ' . $pm->waktu; ?></td>
                        <td><?php echo $pm->oleh; ?></td>
                    </tr>
                    <?php $no++ ?>
                    <?php $jml += $pm->harga ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <h5>Total pemasukan : <?= 'Rp. ' . number_format($jml, 2, ',', '.') ?></h5>

</body>

</html>