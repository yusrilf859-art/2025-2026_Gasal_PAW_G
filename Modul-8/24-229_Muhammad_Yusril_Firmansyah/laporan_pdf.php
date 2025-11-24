<?php
include "koneksi.php";
require "fpdf/fpdf.php"; // pastikan nama folder benar

// Ambil data transaksi
$stmt = $pdo->query("
    SELECT 
        t.id, t.waktu_transaksi, t.keterangan, t.total,
        p.nama AS pelanggan
    FROM transaksi t
    LEFT JOIN pelanggan p ON p.id = t.pelanggan_id
    ORDER BY t.id DESC
");

$data = $stmt->fetchAll();

// Buat PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->Cell(0,10,'Laporan Transaksi',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'ID',1);
$pdf->Cell(35,10,'Tanggal',1);
$pdf->Cell(40,10,'Pelanggan',1);
$pdf->Cell(60,10,'Keterangan',1);
$pdf->Cell(30,10,'Total',1);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
foreach ($data as $row) {
    $pdf->Cell(20,10,$row['id'],1);
    $pdf->Cell(35,10,$row['waktu_transaksi'],1);
    $pdf->Cell(40,10,$row['pelanggan'],1);
    $pdf->Cell(60,10,$row['keterangan'],1);
    $pdf->Cell(30,10,'Rp '.number_format($row['total']),1);
    $pdf->Ln();
}

$pdf->Output('D', 'laporan_penjualan.pdf');
?>