<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Arus Kas</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">

    <h1>HIGADGET</h1>
    <h2>LAPORAN ARUS KAS</h2>
    <h3>Tanggal <?= date_format(date_create($date_start), 'd M Y') ?> s.d <?= date_format(date_create($date_end), 'd M Y') ?></h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th>KETERANGAN</th>
                <th><?= date_format(date_create($date_end), 'd M Y') ?></th>
            </tr>
        </thead>

        <tbody>
            <tr class="section">
                <td colspan="2">ARUS KAS DARI AKTIVITAS OPERASI</td>
            </tr>

            <tr>
                <?php if ($laba_rugi_berjalan >= 0): ?>
                <td class="indent">Laba Berjalan</td>
                <?php else: ?>
                <td class="indent">Laba (Rugi) Berjalan</td>
                <?php endif; ?>
                <td class="amount"><?= number_format($laba_rugi_berjalan, 0, ',', '.') ?></td>
            </tr>

            <tr class="subtotal">
                <td>Kas dari Aktivitas Operasi ( a )</td>
                <td class="amount"><?= number_format($laba_rugi_berjalan, 0, ',', '.') ?></td>
            </tr>

            <tr class="section">
                <td colspan="2">Lainnya</td>
            </tr>

            <tr>
                <td>Penyertaan Modal</td>
                <td class="amount">-</td>
            </tr>

            <tr>
                <td>Kas Awal</td>
                <td class="amount"><?= number_format($saldo_awal, 0, ',', '.') ?></td>
            </tr>

            <tr class="total">
                <td>Kas dan Setara Kas Akhir</td>
                <td class="amount"><?= number_format($saldo_awal + $laba_rugi_berjalan, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>

</div>

</body>
</html>
