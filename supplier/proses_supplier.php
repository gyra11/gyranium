<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["notelp"];

    $query = "INSERT INTO supplier ( NamaSupplier, Alamat, NomorTelepon) VALUES ( '$nama', '$alamat', '$nomor')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Berhasil menambahkan supplier!");
        document.location = "data_supplier.php";</script>';
    } else {
        echo '<script>alert("gagal menambahkan supplier");
        document.location = "tambah_supplier.php";</script>';
    }
} else {
    echo '<script>alert("gagal menambahkan supplier");
    document.location = "tambah_supplier.php";</script>';
}

$koneksi->close();
