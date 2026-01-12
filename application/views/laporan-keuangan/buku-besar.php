<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Besar</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">
    <h1>NAMA PT</h1>
    <h2>LAPORAN BUKU BESAR</h2>
    <h3>PER 31 DESEMBER 2025</h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th colspan="6" style="text-align:left;">KATEGORI 1</th>
            </tr>
            <tr>
                <th>TGL</th>
                <th>BANK</th>
                <th>KETERANGAN</th>
                <th>DEBET</th>
                <th>KREDIT</th>
                <th>SALDO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>29/01/25</td>
                <td>BCA PT Utama</td>
                <td>Pengeluaran Jan 2025</td>
                <td class="amount"></td>
                <td class="amount">145.000</td>
                <td class="amount">145.000</td>
            </tr>
            <tr>
                <td>29/01/25</td>
                <td>BCA PT Utama</td>
                <td>Fee Jan 2025</td>
                <td class="amount"></td>
                <td class="amount">1.500.000</td>
                <td class="amount">1.645.000</td>
            </tr>

            <tr class="total">
                <td colspan="3">TOTAL</td>
                <td class="amount">-</td>
                <td class="amount">1.645.000</td>
                <td class="amount">1.645.000</td>
            </tr>
        </tbody>
    </table>

    <br><br>

    <table class="neraca">
        <thead>
            <tr>
                <th colspan="6" style="text-align:left;">KATEGORI 2</th>
            </tr>
            <tr>
                <th>TGL</th>
                <th>BANK</th>
                <th>KETERANGAN</th>
                <th>DEBET</th>
                <th>KREDIT</th>
                <th>SALDO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01/01/25</td>
                <td>BCA PT Utama</td>
                <td>Pemasukan Jan 2021</td>
                <td class="amount"></td>
                <td class="amount">2.700.000</td>
                <td class="amount">2.700.000</td>
            </tr>
            <tr>
                <td>13/01/25</td>
                <td>BCA PT Utama</td>
                <td>Pemasukan Jan 2021</td>
                <td class="amount"></td>
                <td class="amount">1.300.000</td>
                <td class="amount">4.000.000</td>
            </tr>

            <tr class="total">
                <td colspan="3">TOTAL</td>
                <td class="amount">-</td>
                <td class="amount">4.000.000</td>
                <td class="amount">4.000.000</td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>
