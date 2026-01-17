<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Aktiva Tetap</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">

    <h1>HIGADGET</h1>
    <h2>DAFTAR AKTIVA TETAP</h2>
    <h2>Per akhir <?= date_format(date_create($date_end), 'd M Y') ?></h2>

    <table class="neraca">
        <thead>
            <tr>
                <th>No</th>
                <th>JENIS AKTIVA</th>
                <th>Tahun<br>Perolehan</th>
                <th>Unit</th>
                <th>Harga Beli</th>
            </tr>
        </thead>

        <tbody>
            <tr class="section">
                <td colspan="12">INVENTARIS</td>
            </tr>

            <?php 
            $no = 0;
            $total_inventaris = 0;
            foreach ($data_inventaris as $inventaris): 
            $no++;
            $total_inventaris += $inventaris->hrg_hpp;
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $inventaris->nama_brg ?></td>
                <td><?= date_format(date_create($inventaris->tgl_masuk), 'M-y') ?></td>
                <td>1</td>
                <td class="amount"><?= number_format($inventaris->hrg_hpp, 0, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>

            <tr class="subtotal">
                <td colspan="4">Jumlah</td>
                <td class="amount"><?= number_format($total_inventaris, 0, ',', '.') ?></td>
            </tr>

            <tr class="total">
                <td colspan="4">Jumlah Aktiva Tetap</td>
                <td class="amount"><?= number_format($total_inventaris, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>
