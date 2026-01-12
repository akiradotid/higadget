<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Aktiva Tetap</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">

    <h1>NAMA PT</h1>
    <h2>DAFTAR AKTIVA TETAP</h2>

    <table class="neraca">
        <thead>
            <tr>
                <th>No</th>
                <th>JENIS AKTIVA</th>
                <th>Tahun<br>Perolehan</th>
                <th>Unit</th>
                <th>Harga Beli</th>
                <th>%<br>Penyusutan</th>
                <th>Ak. Peny. <br>th sebelumnya</th>
                <th>Beban<br>Penyusutan</th>
                <th>Akum. Peny.<br>bulan ini</th>
                <th>Nilai Buku<br>akhir bulan ini</th>
            </tr>
        </thead>

        <tbody>
            <tr class="section">
                <td colspan="12">INVENTARIS</td>
            </tr>

            <tr>
                <td>1</td>
                <td>Printer Epson L3110</td>
                <td>Mar-20</td>
                <td>1</td>
                <td class="amount">2.005.000</td>
                <td>10%</td>
                <td class="amount">167.083</td>
                <td class="amount">16.708</td>
                <td class="amount">183.792</td>
                <td class="amount">1.821.208</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Komputer</td>
                <td>Sep-20</td>
                <td>1</td>
                <td class="amount">11.056.500</td>
                <td>10%</td>
                <td class="amount">368.550</td>
                <td class="amount">92.138</td>
                <td class="amount">460.688</td>
                <td class="amount">10.595.813</td>
            </tr>

            <tr>
                <td>3</td>
                <td>Laptop Dell Second</td>
                <td>Nov-20</td>
                <td>1</td>
                <td class="amount">3.006.500</td>
                <td>10%</td>
                <td class="amount">50.108</td>
                <td class="amount">25.054</td>
                <td class="amount">75.163</td>
                <td class="amount">2.931.338</td>
            </tr>

            <tr>
                <td>4</td>
                <td>Kipas Dinding Cosmos</td>
                <td>Nov-20</td>
                <td>1</td>
                <td class="amount">250.000</td>
                <td>10%</td>
                <td class="amount">4.167</td>
                <td class="amount">2.083</td>
                <td class="amount">6.250</td>
                <td class="amount">243.750</td>
            </tr>

            <tr>
                <td>5</td>
                <td>Meja</td>
                <td>Nov-20</td>
                <td>2</td>
                <td class="amount">756.200</td>
                <td>10%</td>
                <td class="amount">12.603</td>
                <td class="amount">6.302</td>
                <td class="amount">18.905</td>
                <td class="amount">737.295</td>
            </tr>

            <tr>
                <td>6</td>
                <td>Sofa</td>
                <td>Nov-20</td>
                <td>1</td>
                <td class="amount">1.500.000</td>
                <td>10%</td>
                <td class="amount">25.000</td>
                <td class="amount">12.500</td>
                <td class="amount">25.000</td>
                <td class="amount">1.475.000</td>
            </tr>

            <tr class="subtotal">
                <td colspan="4">Jumlah</td>
                <td class="amount">26.300.200</td>
                <td></td>
                <td class="amount">691.895</td>
                <td class="amount">228.891</td>
                <td class="amount">1.023.563</td>
                <td class="amount">26.443.394</td>
            </tr>

            <tr class="total">
                <td colspan="4">Jumlah Aktiva Tetap</td>
                <td class="amount">26.300.200</td>
                <td></td>
                <td class="amount">691.895</td>
                <td class="amount">228.891</td>
                <td class="amount">1.023.563</td>
                <td class="amount">26.443.394</td>
            </tr>
        </tbody>
    </table>

</div>

</body>
</html>
