<?php 
include("../config.php");

$PenjualanID = $_GET['id'];

$query = "DELETE FROM penjualan WHERE PenjualanID = '$PenjualanID'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo '<script>alert("Berhasil Menghapus!");
    document.location = "data_penjualan.php";</script>';
    
} else {
    echo '<script>alert("menghapus gagal");
    document.location = "data_penjualan.php";</script>';
}

$koneksi->close();
?>