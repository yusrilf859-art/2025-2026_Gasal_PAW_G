<?php
include "koneksi.php";

// Default rentang tanggal
$start = isset($_GET['start']) ? $_GET['start'] : date("Y-m-01");
$end   = isset($_GET['end']) ? $_GET['end'] : date("Y-m-t");

// Ambil data transaksi
$sql = "SELECT waktu_transaksi, total
        FROM transaksi
        WHERE waktu_transaksi BETWEEN '$start' AND '$end'
        ORDER BY waktu_transaksi ASC";
$query = mysqli_query($conn, $sql);

$tanggal = [];
$jumlah  = [];
$total_pelanggan = 0;
$total_pendapatan = 0;

while ($d = mysqli_fetch_assoc($query)) {
    $tanggal[] = $d['waktu_transaksi'];
    $jumlah[]  = $d['total'];
    $total_pelanggan++;
    $total_pendapatan += $d['total'];
}

// =============== EXPORT EXCEL ===============
if (isset($_GET['excel'])) {
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=laporan_penjualan.xls");
    
    echo "<table border='1'>";
    echo "<tr><th>Tanggal</th><th>Total</th></tr>";
    for ($i = 0; $i < count($tanggal); $i++) {
        echo "<tr>
                <td>{$tanggal[$i]}</td>
                <td>{$jumlah[$i]}</td>
              </tr>";
    }
    echo "</table>";
    exit;
}

// =============== EXPORT PDF ===============
if (isset($_GET['pdf'])) {
    require("fpdf/fpdf.php");

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",14);
    $pdf->Cell(0,10,"Laporan Penjualan",0,1,"C");

    $pdf->SetFont("Arial","",10);
    $pdf->Cell(40,8,"Tanggal",1);
    $pdf->Cell(40,8,"Total",1);
    $pdf->Ln();

    for ($i = 0; $i < count($tanggal); $i++) {
        $pdf->Cell(40,8,$tanggal[$i],1);
        $pdf->Cell(40,8,$jumlah[$i],1);
        $pdf->Ln();
    }

    $pdf->Ln();
    $pdf->Cell(40,8,"Total Pelanggan",1);
    $pdf->Cell(40,8,$total_pelanggan,1);
    $pdf->Ln();

    $pdf->Cell(40,8,"Total Pendapatan",1);
    $pdf->Cell(40,8,number_format($total_pendapatan),1);

    $pdf->Output("D","laporan_penjualan.pdf");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h2>Laporan Penjualan</h2>

<form method="GET">
    Dari Tanggal :
    <input type="date" name="start" value="<?= $start ?>">
    &nbsp;
    Sampai :
    <input type="date" name="end" value="<?= $end ?>">
    &nbsp;
    <button type="submit">Tampilkan</button>
</form>

<br>

<!-- Tombol Export -->
<a href="report_transaksi.php?start=<?= $start ?>&end=<?= $end ?>&pdf=1">
    <button>Cetak PDF</button>
</a>

<a href="report_transaksi.php?start=<?= $start ?>&end=<?= $end ?>&excel=1">
    <button>Export Excel</button>
</a>

<hr>

<h3>Grafik Penjualan</h3>
<canvas id="grafik" width="600" height="250"></canvas>

<script>
var ctx = document.getElementById('grafik');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($tanggal) ?>,
        datasets: [{
            label: 'Total Penjualan',
            data: <?= json_encode($jumlah) ?>,
            borderWidth: 1
        }]
    }
});
</script>

<hr>

<h3>Rekap Penjualan</h3>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Tanggal</th>
        <th>Total</th>
    </tr>
    <?php
    for ($i = 0; $i < count($tanggal); $i++) {
        echo "<tr>
                <td>".$tanggal[$i]."</td>
                <td>".$jumlah[$i]."</td>
              </tr>";
    }
    ?>
</table>

<hr>

<h3>Total</h3>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td>Total Pelanggan</td>
        <td><?= $total_pelanggan ?></td>
    </tr>
    <tr>
        <td>Total Pendapatan</td>
        <td><?= number_format($total_pendapatan) ?></td>
    </tr>
</table>

</body>
</html>
