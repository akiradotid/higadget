<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Laba Rugi</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">
    <h1>HIGADGET</h1>
    <h2>LAPORAN LABA RUGI</h2>
    <h3>Tanggal <?= date_format(date_create($date_start), 'd M Y') ?> s.d <?= date_format(date_create($date_end), 'd M Y') ?></h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th>KETERANGAN</th>
                <th>Cat.</th>
                <th><?= date_format(date_create($date_end), 'd M Y') ?></th>
            </tr>
        </thead>

        <tbody>
            <tr class="section">
                <td colspan="3">PENDAPATAN :</td>
            </tr>
            <?php 
                $total_semua_pemasukan = 0; 
                $total_semua_pemasukan += $total_penjualan;
                $total_semua_pengeluaran = 0; 
                $total_semua_pengeluaran += $total_pembelian; 
            ?>
            <tr>
                <td class="indent">Penjualan</td>
                <td></td>
                <td class="amount"><?= number_format($total_penjualan, 0, ',', '.') ?></td>
            </tr>
            <?php 
                foreach ($total_pemasukan_per_kategori as $kategori => $total_pemasukan) { 
                    $total_semua_pemasukan+=$total_pemasukan;
                ?>
            <tr>
                <td class="indent"><?= $kategori ?></td>
                <td></td>
                <td class="amount"><?= number_format($total_pemasukan, 0, ',', '.') ?></td>
            </tr>
            <?php } ?>

            <tr class="subtotal">
                <td>TOTAL PENDAPATAN</td>
                <td></td>
                <td class="amount"><?= number_format($total_semua_pemasukan, 0, ',', '.') ?></td>
            </tr>

            <tr class="section">
                <td colspan="3">BEBAN USAHA :</td>
            </tr>

            <tr><td class="indent">Pembelian stok</td><td></td><td class="amount"><?= number_format($total_pembelian, 0, ',', '.') ?></td></tr>

            <?php 
                foreach ($total_pengeluaran_per_kategori as $kategori => $total_pengeluaran) { 
                    $total_semua_pengeluaran+=$total_pengeluaran;
                ?>
            <tr><td class="indent"><?= $kategori ?></td><td></td><td class="amount"><?= number_format($total_pengeluaran, 0, ',', '.') ?></td></tr>

            <?php } ?>

            <tr class="subtotal">
                <td>TOTAL BEBAN USAHA</td>
                <td></td>
                <td class="amount"><?= number_format($total_semua_pengeluaran, 0, ',', '.') ?></td>
            </tr>

            <?php if($total_semua_pemasukan > $total_semua_pengeluaran) { ?>
            <tr class="total">
                <td>Laba usaha</td>
                <td></td>
                <td class="amount"><?= number_format($total_semua_pemasukan - $total_semua_pengeluaran, 0, ',', '.') ?></td>
            </tr>
            <?php } else { ?>
            <tr class="total">
                <td>Rugi usaha</td>
                <td></td>
                <td class="amount">(<?= number_format($total_semua_pemasukan - $total_semua_pengeluaran, 0, ',', '.') ?>)</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>

</div>

</body>
</html>
