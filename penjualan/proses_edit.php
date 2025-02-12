<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $PelangganID = $_POST["PelangganID"];
    $nama = $_POST["NamaPelanggan"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["notelp"];

    mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$nama', Alamat='$alamat', NomorTelepon='$nomor' WHERE PelangganID = '$PelangganID'");

    header("Location: data_pelanggan.php");
} else {
    echo '<script>alert("Edit gagal");
    document.location = "data_pelanggan.php";</script>';
}

$koneksi->close();
