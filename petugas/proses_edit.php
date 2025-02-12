<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $PetugasID = $_POST['PetugasID'];
    $Username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (!$password) {
        mysqli_query($koneksi, "UPDATE petugas SET Username='$Username', Level='$level' WHERE PetugasID = '$PetugasID'");
    } else {
        mysqli_query($koneksi, "UPDATE petugas SET Username='$Username', Password='$password', Level='$level' WHERE PetugasID = '$PetugasID'");
    }

    header("Location: data_petugas.php");
} else {
    echo '<script>alert("Edit gagal");
    document.location = "data_petugas.php";</script>';
}

$koneksi->close();
