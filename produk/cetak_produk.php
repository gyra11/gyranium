<?php
include("../config.php");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Produk</title>
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
        <h2 class="text-center">Laporan Data Produk</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM produk");
                $no = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['ProdukID']; ?></td>
                        <td><?php echo $row['NamaProduk']; ?></td>
                        <td>Rp <?php echo number_format($row['Harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['Stok']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary btn-print" onclick="window.print()">Cetak</button>
        <a href="data_produk.php" class="btn btn-outline-secondary">Kembali</a>
    </div>

</body>

</html>
