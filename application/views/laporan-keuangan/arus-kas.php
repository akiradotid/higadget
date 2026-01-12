<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Arus Kas</title>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/new-report.css">
</head>
<body>

<div class="container">

    <h1>NAMA PT</h1>
    <h2>LAPORAN ARUS KAS</h2>
    <h3>PER 31 DESEMBER 2025</h3>
    <p class="subtitle">(dalam rupiah)</p>

    <table class="neraca">
        <thead>
            <tr>
                <th>KETERANGAN</th>
                <th>31-Des-25</th>
            </tr>
        </thead>

        <tbody>
            <!-- ================= OPERASI ================= -->
            <tr class="section">
                <td colspan="2">ARUS KAS DARI AKTIVITAS OPERASI</td>
            </tr>

            <tr>
                <td class="indent">Laba (Rugi) Tahun Berjalan</td>
                <td class="amount">(25.413.835)</td>
            </tr>

            <tr>
                <td class="indent">Penyesuaian :</td>
                <td></td>
            </tr>

            <tr>
                <td class="double-indent">Penyusutan Aset Tetap dan Amortisasi</td>
                <td class="amount">-</td>
            </tr>

            <tr class="subtotal">
                <td></td>
                <td class="amount">(25.413.835)</td>
            </tr>

            <tr>
                <td class="indent">(Kenaikan) Penurunan Perlengkapan Kantor</td>
                <td class="amount">-</td>
            </tr>
            <tr>
                <td class="indent">(Kenaikan) Penurunan Piutang lain-lain</td>
                <td class="amount">-</td>
            </tr>
            <tr>
                <td class="indent">(Kenaikan) Penurunan Hutang Gaji</td>
                <td class="amount">-</td>
            </tr>
            <tr>
                <td class="indent">(Kenaikan) Penurunan Hutang Lain-lain</td>
                <td class="amount">(2.200.000)</td>
            </tr>

            <tr class="subtotal">
                <td>Kas dari Aktivitas Operasi ( a )</td>
                <td class="amount">(27.613.835)</td>
            </tr>

            <!-- ================= INVESTASI ================= -->
            <tr class="section">
                <td colspan="2">ARUS KAS DARI AKTIVITAS INVESTASI</td>
            </tr>

            <tr>
                <td class="indent">(Kenaikan) Penurunan Aset Tetap</td>
                <td class="amount">-</td>
            </tr>
            <tr>
                <td class="indent">(Kenaikan) Penurunan Aset Tetap Lainnya</td>
                <td class="amount">-</td>
            </tr>

            <tr class="subtotal">
                <td>Kas dari Aktivitas Investasi ( b )</td>
                <td class="amount">-</td>
            </tr>

            <!-- ================= PENDANAAN ================= -->
            <tr class="section">
                <td colspan="2">ARUS KAS DARI AKTIVITAS PENDANAAN</td>
            </tr>

            <tr>
                <td class="indent">Kenaikan (Penurunan) Hutang Bank</td>
                <td class="amount">-</td>
            </tr>

            <tr class="subtotal">
                <td>Kas dari Aktivitas Pendanaan ( c )</td>
                <td class="amount">-</td>
            </tr>

            <!-- ================= REKONSILIASI ================= -->
            <tr>
                <td>Kenaikan (Penurunan)</td>
                <td class="amount">(27.613.835)</td>
            </tr>

            <tr>
                <td>Penyertaan Modal</td>
                <td class="amount">-</td>
            </tr>

            <tr>
                <td>Kas Awal</td>
                <td class="amount">50.436.539</td>
            </tr>

            <tr class="total">
                <td>Kas dan Setara Kas Akhir</td>
                <td class="amount">22.822.704</td>
            </tr>
        </tbody>
    </table>

    <p class="footer">
        Catatan
    </p>

</div>

</body>
</html>
