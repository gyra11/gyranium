<?php
include '../config.php';

$tanggal = date("Y-m-d");
$SupplierID = $_POST['SupplierID'];
$ProdukID = $_POST['ProdukID'];
$jumlah = $_POST['jumlah'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];

mysqli_begin_transaction($koneksi);

try {

    $query_pembelian = "INSERT INTO pembelian (TanggalPembelian, SupplierID, TotalHarga) VALUES ('$tanggal', '$SupplierID', '$total')";
    $result_pembelian = mysqli_query($koneksi, $query_pembelian);

    $id_pembelian = mysqli_insert_id($koneksi);

    $query_detail_pembelian = "INSERT INTO detilpembelian (PembelianID, ProdukID, JumlahProduk, SubTotal) VALUES ('$id_pembelian', '$ProdukID', '$jumlah', '$subtotal')";
    $result_detail_pembelian = mysqli_query($koneksi, $query_detail_pembelian);

    $query_update_stok = "UPDATE produk SET Stok = Stok + '$jumlah' WHERE ProdukID = '$ProdukID'";
    $result_update_stok = mysqli_query($koneksi, $query_update_stok);

    if ($result_pembelian && $result_detail_pembelian && $result_update_stok) {
        // Commit transaksi
        mysqli_commit($koneksi);

        echo '<script>alert("Transaksi Berhasil!");
        document.location = "data_pembelian.php";</script>';
        exit();
    } else {
        // Rollback transaksi jika salah satu query gagal
        mysqli_rollback($koneksi);
        echo "Gagal menambahkan data atau mengurangi stok barang.";
    }
} catch (Exception $e) {
    // Rollback transaksi jika terjadi exception
    mysqli_rollback($koneksi);
    echo "Gagal menambahkan data. Exception: " . $e->getMessage();
}

mysqli_close($koneksi);
