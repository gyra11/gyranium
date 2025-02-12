<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $SupplierID = $_POST["SupplierID"];
    $nama = $_POST["NamaSupplier"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["notelp"];

    mysqli_query($koneksi, "UPDATE supplier SET NamaSupplier='$nama', Alamat='$alamat', NomorTelepon='$nomor' WHERE SupplierID = '$SupplierID'");

    header("Location: data_supplier.php");
} else {
    echo '<script>alert("Edit gagal");
    document.location = "data_supplier.php";</script>';
}

$koneksi->close();
