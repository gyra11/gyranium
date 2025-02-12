<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = date("Y-m-d");
    $PelangganID = $_POST['PelangganID'];
    $ProdukID = $_POST['ProdukID'];
    $jumlah = $_POST['jumlah'];
    $subtotal = $_POST['subtotal'];

    mysqli_begin_transaction($koneksi);

    try {

        $query_penjualan = "INSERT INTO penjualan (TanggalPenjualan, PelangganID, TotalHarga) VALUES ('$tanggal', '$PelangganID', 0)";
        $result_penjualan = mysqli_query($koneksi, $query_penjualan);

        $id_penjualan = mysqli_insert_id($koneksi);


        $total = 0;
        for ($i = 0; $i < count($ProdukID); $i++) {
            $currentProdukID = $ProdukID[$i];
            $currentJumlah = $jumlah[$i];
            $currentSubtotal = $subtotal[$i];


            $query_detail_penjualan = "INSERT INTO detilpenjualan (PenjualanID, ProdukID, JumlahProduk, SubTotal) VALUES ('$id_penjualan', '$currentProdukID', '$currentJumlah', '$currentSubtotal')";
            $result_detail_penjualan = mysqli_query($koneksi, $query_detail_penjualan);


            $query_update_stok = "UPDATE produk SET Stok = Stok - '$currentJumlah' WHERE ProdukID = '$currentProdukID'";
            $result_update_stok = mysqli_query($koneksi, $query_update_stok);


            $total += $currentSubtotal;


            if (!$result_detail_penjualan || !$result_update_stok) {
                throw new Exception("gagal menambahkan data ke detail atau mengupdate stok $currentProdukID.");
            }
        }


        $query_update_total = "UPDATE penjualan SET TotalHarga = '$total' WHERE PenjualanID = '$id_penjualan'";
        $result_update_total = mysqli_query($koneksi, $query_update_total);

        if (!$result_update_total) {
            throw new Exception("gagal mengupdate totalharga.");
        }


        mysqli_commit($koneksi);

        echo '<script>alert("Transaksi Berhasil!"); document.location = "data_penjualan.php";</script>';
        exit();
    } catch (Exception $e) {

        mysqli_rollback($koneksi);
        echo "<script> alert('Gagal menambahkan data. Exception" . $e->getMessage() . " '</script> ";
    } finally {
        mysqli_close($koneksi);
    }
} else {
    echo "Invalid request method";
}
