<?php
include("../config.php");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pembelian</title>
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
        <h2 class="text-center">Laporan Data Pembelian</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pembelian</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Pembelian</th>
                    <th>Nama Supplier</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM pembelian");
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                    $SupplierID = $row['SupplierID'];
                    $query_Supplier = "SELECT NamaSupplier FROM Supplier WHERE SupplierID = '$SupplierID'";
                    $result_Supplier = mysqli_query($koneksi, $query_Supplier);
                    $nama_Supplier = mysqli_fetch_assoc($result_Supplier);
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['PembelianID']; ?></td>
                        <td><?php echo $row['TanggalPembelian']; ?></td>
                        <td>Rp <?php echo number_format($row['TotalHarga'], 0, ',', '.'); ?></td>
                        <td><?php echo $nama_Supplier ? $nama_Supplier['NamaSupplier'] : "Tidak Ditemukan"; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary btn-print" onclick="window.print()">Cetak</button>
        <a href="data_pembelian.php" class="btn btn-outline-secondary">Kembali</a>
    </div>

</body>

</html>
