<?php
include("../nav/header.php");

include("../nav/navbar.php");

$PenjualanID = $_GET['id'];

$query_penjualan = "SELECT * FROM penjualan WHERE PenjualanID = '$PenjualanID'";
$result_penjualan = mysqli_query($koneksi, $query_penjualan);

if ($result_penjualan) {
    $data_penjualan = mysqli_fetch_assoc($result_penjualan);

    $penjualanID = $data_penjualan["PenjualanID"];
    $PelanganID = $data_penjualan['PelangganID'];

    $query_pelanggan = "SELECT * FROM pelanggan WHERE PelangganID = '$PelanganID'";
    $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

    if ($result_pelanggan) {
        $nama_pelanggan = mysqli_fetch_assoc($result_pelanggan);
    } else {
        echo "<script>alert('Data pelanggan tidak ditemukan!')</script>";
    }

    $query_detil = "SELECT * FROM detilpenjualan WHERE PenjualanID = '$penjualanID'";
    $result_detil = mysqli_query($koneksi, $query_detil);

    if ($result_detil) {
        $rows_detil = mysqli_fetch_all($result_detil, MYSQLI_ASSOC);
    } else {
        echo "<script>alert('Data detil penjualan tidak ditemukan!')</script>";
    }
} else {
    echo "<script>alert('Data penjualan tidak ditemukan!')</script>";
}

?>
<div class="container">
    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-bordered table-responsive align-middle">
                <thead>
                    <tr>
                        <th colspan="2">Detail Penjualan <?php echo $data_penjualan['PenjualanID'] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID Pelanggan</td>
                        <td><?php echo $data_penjualan['PelangganID'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><?php echo $nama_pelanggan['NamaPelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $nama_pelanggan['Alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td><?php echo $nama_pelanggan['NomorTelepon'] ?></td>
                    </tr>
                    <?php foreach ($rows_detil as $detil) : ?>
                        <tr>
                            <td>Nama Produk</td>
                            <td><?php

                                $IDnama_produk = $detil['ProdukID'];
                                $query_nama = "SELECT * FROM produk WHERE ProdukID = '$IDnama_produk'";
                                $result_nama = mysqli_query($koneksi, $query_nama);

                                if ($result_nama) {
                                    $nama = mysqli_fetch_assoc($result_nama);
                                } else {
                                    echo "<script>alert('Data nama produk tidak ditemukan!')</script>";
                                }
                                echo $nama['NamaProduk']; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Produk</td>
                            <td><?php echo $detil['JumlahProduk']; ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td>Rp. <?php echo $detil['Subtotal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Total Pembelian</td>
                        <td>Rp. <?php echo $data_penjualan['TotalHarga'] ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="data_penjualan.php" class="btn btn-outline-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>