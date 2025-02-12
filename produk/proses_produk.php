<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST["nama"];
    $Harga = $_POST["harga"];
    $stok = $_POST["stok"];

    $query = "INSERT INTO produk ( NamaProduk, Harga, Stok) VALUES ( '$nama', '$Harga', '$stok')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Berhasil menambahkan produk!");
        document.location = "data_produk.php";</script>';
    } else {
        echo '<script>alert("gagal menambahkan produk");
        document.location = "tambah_produk.php";</script>';
    }
} else {
    echo '<script>alert("gagal menambahkan produk");
    document.location = "tambah_produk.php";</script>';
}

$koneksi->close();
