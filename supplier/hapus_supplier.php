<?php
include("../config.php");

$SupplierID = $_GET['id'];

$query = "DELETE FROM Supplier WHERE SupplierID = '$SupplierID'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo '<script>alert("Berhasil Menghapus!");
    document.location = "data_petugas.php";</script>';
} else {
    echo '<script>alert("menghapus gagal");
    document.location = "data_petugas.php";</script>';
}

$koneksi->close();
