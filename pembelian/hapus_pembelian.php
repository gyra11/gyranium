<?php
include("../config.php");

$PembelianID = $_GET['id'];

$query = "DELETE FROM pembelian WHERE PembelianID = '$PembelianID'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo '<script>alert("Berhasil Menghapus!");
    document.location = "data_pembelian.php";</script>';
} else {
    echo '<script>alert("menghapus gagal");
    document.location = "data_pembelian.php";</script>';
}

$koneksi->close();
