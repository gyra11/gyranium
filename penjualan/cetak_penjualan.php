<?php
include("../config.php");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container mt-3">
        <h2 class="text-center">Laporan Data Penjualan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Penjualan</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Nama Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM penjualan");
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                    $PelangganID = $row['PelangganID'];
                    $query_pelanggan = "SELECT NamaPelanggan FROM pelanggan WHERE PelangganID = '$PelangganID'";
                    $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);
                    $nama_pelanggan = mysqli_fetch_assoc($result_pelanggan);
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['PenjualanID']; ?></td>
                        <td><?php echo $row['TanggalPenjualan']; ?></td>
                        <td>Rp <?php echo number_format($row['TotalHarga'], 0, ',', '.'); ?></td>
                        <td><?php echo $nama_pelanggan ? $nama_pelanggan['NamaPelanggan'] : "Tidak Ditemukan"; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary btn-print" onclick="window.print()">Cetak</button>
        <a href="data_penjualan.php" class="btn btn-outline-secondary">Kembali</a>
    </div>

</body>

</html>
