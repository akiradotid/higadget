<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Laba Rugi</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">

    <h1>NAMA PT</h1>
    <h2>LAPORAN LABA RUGI</h2>
    <h3>PER 31 DESEMBER 2025</h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th>KETERANGAN</th>
                <th>Cat.</th>
                <th>31-Des-25</th>
            </tr>
        </thead>

        <tbody>
            <tr class="section">
                <td colspan="3">PENDAPATAN :</td>
            </tr>

            <tr>
                <td class="indent">Penjualan Produk</td>
                <td></td>
                <td class="amount">19.845.000</td>
            </tr>
            <tr>
                <td class="indent">Pendapatan Lain-Lain</td>
                <td></td>
                <td class="amount">11.250.000</td>
            </tr>

            <tr class="subtotal">
                <td>TOTAL PENDAPATAN</td>
                <td></td>
                <td class="amount">31.095.000</td>
            </tr>

            <!-- ================= BEBAN USAHA ================= -->
            <tr class="section">
                <td colspan="3">BEBAN USAHA :</td>
            </tr>

            <tr><td class="indent">Beban Gaji Bulanan</td><td></td><td class="amount">44.000.000</td></tr>
            <tr><td class="indent">Beban Sewa Kantor</td><td></td><td class="amount">1.500.000</td></tr>
            <tr><td class="indent">Beban Tagihan Listrik</td><td></td><td class="amount">834.214</td></tr>
            <tr><td class="indent">Beban Tagihan Internet</td><td></td><td class="amount">546.860</td></tr>
            <tr><td class="indent">Beban Tagihan PDAM</td><td></td><td class="amount">42.300</td></tr>
            <tr><td class="indent">Beban Konsumsi</td><td></td><td class="amount">40.000</td></tr>
            <tr><td class="indent">Beban Pemeliharaan</td><td></td><td class="amount">3.976.000</td></tr>
            <tr><td class="indent">Beban Pengeluaran Lain-Lain</td><td></td><td class="amount">351.500</td></tr>

            <tr class="subtotal">
                <td>TOTAL BEBAN USAHA</td>
                <td></td>
                <td class="amount">56.433.835</td>
            </tr>

            <!-- ================= RUGI USAHA ================= -->
            <tr>
                <td>Rugi usaha</td>
                <td></td>
                <td class="amount">(25.338.835)</td>
            </tr>

            <tr class="total">
                <td>Rugi usaha</td>
                <td></td>
                <td class="amount">(25.413.835)</td>
            </tr>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>

</div>

</body>
</html>
