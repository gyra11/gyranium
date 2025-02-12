<?php
include("../config.php"); // Pastikan koneksi ke database
if (!isset($_GET['id'])) {
    die("ID Penjualan tidak ditemukan.");
}

$penjualan_id = $_GET['id'];

// Ambil data penjualan
$query_penjualan = "SELECT p.*, pl.NamaPelanggan FROM penjualan p
                    JOIN pelanggan pl ON p.PelangganID = pl.PelangganID
                    WHERE p.PenjualanID = '$penjualan_id'";
$result_penjualan = mysqli_query($koneksi, $query_penjualan);

if (!$result_penjualan || mysqli_num_rows($result_penjualan) == 0) {
    die("Data penjualan tidak ditemukan.");
}

$penjualan = mysqli_fetch_assoc($result_penjualan);

// Ambil detail penjualan (barang yang dibeli)
$query_detail = "SELECT dp.*, pr.NamaProduk, pr.Harga FROM detilpenjualan dp
                 JOIN produk pr ON dp.ProdukID = pr.ProdukID
                 WHERE dp.PenjualanID = '$penjualan_id'";
$result_detail = mysqli_query($koneksi, $query_detail);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk - ID <?php echo $penjualan_id; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; max-width: 400px; margin: auto; }
        .struk { border: 1px solid #ddd; padding: 20px; margin-top: 20px; }
        .btn-cetak { margin-top: 20px; display: block; width: 100%; }
        @media print { .btn-cetak { display: none; } }
    </style>
</head>
<body>
    <div class="struk text-center">
        <h4>TOKO RAHSYA GANTENG</h4>
        <p>Jl. Pattimura  No. 14, Pekanbaru</p>
        <hr>
        <p><strong>ID Penjualan:</strong> <?php echo $penjualan['PenjualanID']; ?></p>
        <p><strong>Tanggal:</strong> <?php echo $penjualan['TanggalPenjualan']; ?></p>
        <p><strong>Pelanggan:</strong> <?php echo $penjualan['NamaPelanggan']; ?></p>
        <hr>
        
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                while ($row = mysqli_fetch_assoc($result_detail)) {
                    $subtotal = $row['Harga'] * $row['JumlahProduk'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $row['NamaProduk']; ?></td>
                    <td>Rp<?php echo number_format($row['Harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $row['JumlahProduk']; ?></td>
                    <td>Rp<?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <hr>
        <h5><strong>Total: Rp<?php echo number_format($total, 0, ',', '.'); ?></strong></h5>
        <p>Terima kasih telah berbelanja!</p>
        <button class="btn btn-primary btn-cetak" onclick="window.print()">Cetak Struk</button>
    </div>
</body>
</html>
