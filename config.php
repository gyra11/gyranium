<?php
$koneksi = mysqli_connect("localhost", "root", "", "ukk_inventaris");

if (!$koneksi) {
      echo "Koneksi gagal" . mysqli_connect_error();
}else{
    //   echo "Koneksi berhasil";
}
