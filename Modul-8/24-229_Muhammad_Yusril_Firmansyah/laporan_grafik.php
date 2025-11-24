<?php
include "koneksi.php";

// Ambil total transaksi per tanggal
$stmt = $pdo->query("
    SELECT DATE(waktu_transaksi) AS tgl, SUM(total) AS total_harian
    FROM transaksi
    GROUP BY DATE(waktu_transaksi)
    ORDER BY DATE(waktu_transaksi) ASC
");

$tanggal = [];
$total = [];

while ($row = $stmt->fetch()) {
    $tanggal[] = $row['tgl'];
    $total[]   = $row['total_harian'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Laporan Transaksi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background: #eef3ff;
        }
        h2 {
            color: #003c8f;
        }
        a {
            text-decoration: none;
            color: #003c8f;
        }
    </style>
</head>
<body>

<h2>Grafik Total Transaksi per Tanggal</h2>

<canvas id="grafikTransaksi" height="120"></canvas>

<script>
var ctx = document.getElementById("grafikTransaksi").getContext("2d");

new Chart(ctx, {
    type: "bar",
    data: {
        labels: <?= json_encode($tanggal) ?>,
        datasets: [{
            label: "Total Transaksi (Rp)",
            data: <?= json_encode($total) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<br>
<a href="laporan.php">← Kembali</a>

</body>
</html>