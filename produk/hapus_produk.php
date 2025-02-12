<?php
include("../config.php");

$ProdukID = $_GET['id'];

$query = "DELETE FROM produk WHERE ProdukID = '$ProdukID'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo '<script>alert("Berhasil Menghapus!");
    document.location = "data_produk.php";</script>';
} else {
    echo '<script>alert("menghapus gagal");
    document.location = "data_produk.php";</script>';
}

$koneksi->close();
