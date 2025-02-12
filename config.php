<?php
$koneksi = mysqli_connect("localhost", "root", "", "coba_inventaris");

if (!$koneksi) {
      echo "Koneksi gagal" . mysqli_connect_error();
}else{
    //   echo "Koneksi berhasil";
}
