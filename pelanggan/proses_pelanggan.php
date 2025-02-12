<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $PelangganID = $_POST["PelangganID"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["notelp"];

    $query = "INSERT INTO pelanggan (PelangganID, NamaPelanggan, Alamat, NomorTelepon) VALUES ('$PelangganID', '$nama', '$alamat', '$nomor')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Register Pelanggan Berhasil!");
        document.location = "data_pelanggan.php";</script>';
    } else {
        echo '<script>alert("egister Pelanggan Gagal!");
        document.location = "tambah_pelanggan.php";</script>';
    }
} else {
    echo '<script>alert("egister Pelanggan Gagal!");
    document.location = "tambah_pelanggan.php";</script>';
}

$koneksi->close();
