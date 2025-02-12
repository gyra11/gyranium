<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Username = $_POST["username"];
    $level = $_POST["level"];
    $password = $_POST["password"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO petugas (Username, Password, Level) VALUES ('$Username', '$password_hash', '$level')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("register petugas berhasil!");
        document.location = "data_petugas.php";</script>';
    } else {
        echo '<script>alert("register gagal");
        document.location = "register.php";</script>';
    }
} else {
    echo '<script>alert("register gagal");
    document.location = "register.php";</script>';
}

$koneksi->close();
