<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ProdukID = $_POST["ProdukID"];
    $nama = $_POST["NamaProduk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$nama', Harga='$harga', Stok='$stok' WHERE ProdukID = '$ProdukID'");

    header("Location: data_produk.php");
} else {
    echo '<script>alert("Edit gagal");
    document.location = "data_produk.php";</script>';
}

$koneksi->close();
