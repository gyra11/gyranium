<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM petugas WHERE Username = '$Username'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $data_petugas = mysqli_fetch_assoc($result);

        if (password_verify($password, $data_petugas['Password'])) {
            session_start();

            $_SESSION["PetugasID"] = $data_petugas['PetugasID'];
            $_SESSION["Username"] = $data_petugas['Username'];
            $_SESSION['Level'] = $data_petugas['Level'];

            $_SESSION["success"] = true;

            header("Location: index.php");
        } else {
            header("Location: login.php?error=1");
        }
    } else {
        header("Location: login.php?error=2");
    }
} else {
    header("Location: login.php?error=3");
}

$koneksi->close();
