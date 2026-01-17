<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Neraca</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">
    <h1>HIGADGET</h1>
    <h2>LAPORAN NERACA</h2>
    <h3>Tanggal <?= date_format(date_create($date_start), 'd M Y') ?> s.d <?= date_format(date_create($date_end), 'd M Y') ?></h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th colspan="3">KETERANGAN</th>
                <th colspan="3">KETERANGAN</th>
            </tr>
            <tr>
                <th>Keterangan</th>
                <th>Cat.</th>
                <th><?= date_format(date_create($date_end), 'd M Y') ?></th>
                <th>Keterangan</th>
                <th>Cat.</th>
                <th><?= date_format(date_create($date_end), 'd M Y') ?></th>
            </tr>
        </thead>

        <tbody>
            <!-- ASET & LIABILITAS -->
            <tr class="section">
                <td colspan="3">ASET</td>
                <td colspan="3">LIABILITAS DAN EKUITAS</td>
            </tr>

            <tr>
                <td class="subsection">Aset Lancar</td>
                <td></td>
                <td></td>
                <td class="subsection">Liabilitas Lancar</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td class="indent">Kas dan Setara Kas</td>
                <td></td>
                <td class="amount"><?= number_format($saldo_awal, 0, ',', '.') ?></td>
                <td class="indent">Beban Operasional</td>
                <td></td>
                <td class="amount"><?= number_format($total_pengeluaran, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td class="indent">Penjualan barang</td>
                <td></td>
                <td class="amount"><?= number_format($total_penjualan, 0, ',', '.') ?></td>
                <td class="indent">Hutang Usaha</td>
                <td></td>
                <td class="amount"><?= number_format($total_pembelian, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td class="indent">Persediaan</td>
                <td></td>
                <td class="amount"><?= number_format($total_inventaris, 0, ',', '.') ?></td>
                <td class="indent"></td>
                <td></td>
                <td class="amount"></td>
            </tr>

            <tr class="subtotal">
                <td>Jumlah Aset Lancar</td>
                <td></td>
                <td class="amount"><?= number_format($saldo_awal + $total_penjualan + $total_inventaris, 0, ',', '.') ?></td>
                <td>Jumlah Liabilitas Lancar</td>
                <td></td>
                <td class="amount"><?= number_format($total_pengeluaran + $total_pembelian, 0, ',', '.') ?></td>
            </tr>

            <tr>
                <td class="subsection"></td>
                <td></td>
                <td></td>
                <td class="subsection">Ekuitas</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td class="indent"></td>
                <td></td>
                <td class="amount"></td>
                <td class="indent">Modal</td>
                <td></td>
                <td class="amount"><?= number_format($saldo_awal + $total_penjualan + $total_inventaris - $total_pengeluaran - $total_pembelian, 0, ',', '.') ?></td>
            </tr>

            <tr class="total">
                <td>TOTAL ASET</td>
                <td></td>
                <td class="amount"><?= number_format($saldo_awal + $total_penjualan + $total_inventaris, 0, ',', '.') ?></td>
                <td>TOTAL LIABILITAS DAN EKUITAS</td>
                <td></td>
                <td class="amount"><?= number_format($saldo_awal + $total_penjualan + $total_inventaris - $total_pengeluaran - $total_pembelian, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>
</div>

</body>
</html>
