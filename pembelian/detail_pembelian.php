<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<?php
$PembelianID = $_GET['id'];

$query_Pembelian =  "SELECT * FROM pembelian WHERE PembelianID = '$PembelianID'";
$result_Pembelian = mysqli_query($koneksi, $query_Pembelian);

if ($result_Pembelian) {
    $data_Pembelian = mysqli_fetch_assoc($result_Pembelian);
    $PembelianID = $data_Pembelian["PembelianID"];

    $SupplierID = $data_Pembelian['SupplierID'];
    $query_Supplier =  "SELECT * FROM Supplier WHERE SupplierID = '$SupplierID'";
    $result_Supplier = mysqli_query($koneksi, $query_Supplier);

    if ($result_Supplier) {
        $nama_Supplier = mysqli_fetch_assoc($result_Supplier);
    } else {

        echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
    }

    $query_detil =  "SELECT * FROM detilPembelian WHERE PembelianID = '$PembelianID'";
    $result_detil = mysqli_query($koneksi, $query_detil);

    if ($result_detil) {
        $data_detil = mysqli_fetch_assoc($result_detil);
        $produkID = $data_detil["ProdukID"];

        $query_produk =  "SELECT * FROM produk WHERE ProdukID = '$produkID'";
        $result_produk = mysqli_query($koneksi, $query_produk);

        if ($result_produk) {
            $data_produk = mysqli_fetch_assoc($result_produk);
        } else {

            echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
        }
    } else {

        echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
    }
} else {

    echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
}

?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th colspan="2">Detail Pembelian Barang: <?php echo $data_Pembelian['PembelianID'] ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tanggal Pembelian</td>
                        <td><?php echo $data_Pembelian['TanggalPembelian'] ?></td>
                    </tr>
                    <tr>
                        <td>ID Supplier</td>
                        <td><?php echo $data_Pembelian['SupplierID'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Supplier</td>
                        <td><?php echo $nama_Supplier['NamaSupplier']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $nama_Supplier['Alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td><?php echo $nama_Supplier['NomorTelepon'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td><?php echo $data_produk['NamaProduk'] ?></td>
                    </tr>
                    <tr>
                        <td>Total Pembelian</td>
                        <td>Rp. <?php echo $data_Pembelian['TotalHarga'] ?></td>
                    </tr>

                </tbody>
            </table>
            <a href="data_pembelian.php" class="btn btn-outline-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>