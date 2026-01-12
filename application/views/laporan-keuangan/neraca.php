<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Neraca</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">
    <h1>NAMA PT</h1>
    <h2>LAPORAN NERACA</h2>
    <h3>PER 31 DESEMBER 2025</h3>
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
                <th>31-Des-25</th>
                <th>Keterangan</th>
                <th>Cat.</th>
                <th>31-Des-25</th>
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
                <td class="amount">38.602.624</td>
                <td class="indent">Hutang Gaji</td>
                <td></td>
                <td class="amount">17.750.000</td>
            </tr>

            <tr>
                <td class="indent">Perlengkapan kantor</td>
                <td></td>
                <td class="amount">1.160.000</td>
                <td class="indent">Pendapatan diterima dimuka</td>
                <td></td>
                <td class="amount">4.400.000</td>
            </tr>

            <tr class="subtotal">
                <td>Jumlah Aset Lancar</td>
                <td></td>
                <td class="amount">39.762.624</td>
                <td>Jumlah Liabilitas Lancar</td>
                <td></td>
                <td class="amount">22.150.000</td>
            </tr>

            <tr>
                <td class="subsection">Aset Tetap</td>
                <td></td>
                <td></td>
                <td class="subsection">Ekuitas</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td class="indent">Inventaris</td>
                <td></td>
                <td class="amount">19.029.337</td>
                <td class="indent">Modal</td>
                <td></td>
                <td class="amount">36.235.284</td>
            </tr>

            <tr>
                <td class="indent">Akumulasi Penyusutan</td>
                <td></td>
                <td class="amount">(406.677)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr class="subtotal">
                <td>Jumlah Aset Tetap Bersih</td>
                <td></td>
                <td class="amount">18.622.660</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

            <tr class="total">
                <td>TOTAL ASET</td>
                <td></td>
                <td class="amount">58.385.284</td>
                <td>TOTAL LIABILITAS DAN EKUITAS</td>
                <td></td>
                <td class="amount">58.385.284</td>
            </tr>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>
</div>

</body>
</html>
