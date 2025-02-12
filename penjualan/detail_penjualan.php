<?php
include("../nav/header.php");
include("../nav/navbar.php");

$PenjualanID = $_GET['id'];

$query_penjualan = "SELECT * FROM penjualan WHERE PenjualanID = '$PenjualanID'";
$result_penjualan = mysqli_query($koneksi, $query_penjualan);

if ($result_penjualan) {
    $data_penjualan = mysqli_fetch_assoc($result_penjualan);
    $penjualanID = $data_penjualan["PenjualanID"];
    $PelanganID = $data_penjualan['PelangganID'];

    $query_pelanggan = "SELECT * FROM pelanggan WHERE PelangganID = '$PelanganID'";
    $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

    if ($result_pelanggan) {
        $nama_pelanggan = mysqli_fetch_assoc($result_pelanggan);
    } else {
        echo "<script>alert('Data pelanggan tidak ditemukan!')</script>";
    }

    $query_detil = "SELECT * FROM detilpenjualan WHERE PenjualanID = '$penjualanID'";
    $result_detil = mysqli_query($koneksi, $query_detil);

    if ($result_detil) {
        $rows_detil = mysqli_fetch_all($result_detil, MYSQLI_ASSOC);
    } else {
        echo "<script>alert('Data detil penjualan tidak ditemukan!')</script>";
    }
} else {
    echo "<script>alert('Data penjualan tidak ditemukan!')</script>";
}
?>

<div class="container">
    <div class="card mt-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5>Detail Penjualan <?php echo $data_penjualan['PenjualanID'] ?></h5>
            </div>
            <hr>

            <table class="table table-bordered table-responsive align-middle">
                <tbody>
                    <tr>
                        <td><strong>ID Pelanggan</strong></td>
                        <td><?php echo $data_penjualan['PelangganID'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Pelanggan</strong></td>
                        <td><?php echo $nama_pelanggan['NamaPelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td><?php echo $nama_pelanggan['Alamat'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>No. Telepon</strong></td>
                        <td><?php echo $nama_pelanggan['NomorTelepon'] ?></td>
                    </tr>
                    <?php foreach ($rows_detil as $detil) : ?>
                        <tr>
                            <td><strong>Nama Produk</strong></td>
                            <td>
                                <?php
                                $IDnama_produk = $detil['ProdukID'];
                                $query_nama = "SELECT * FROM produk WHERE ProdukID = '$IDnama_produk'";
                                $result_nama = mysqli_query($koneksi, $query_nama);
                                if ($result_nama) {
                                    $nama = mysqli_fetch_assoc($result_nama);
                                } else {
                                    echo "<script>alert('Data nama produk tidak ditemukan!')</script>";
                                }
                                echo $nama['NamaProduk'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Jumlah Produk</strong></td>
                            <td><?php echo $detil['JumlahProduk']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Subtotal</strong></td>
                            <td>Rp. <?php echo number_format($detil['Subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><strong>Total Pembelian</strong></td>
                        <td>Rp. <?php echo number_format($data_penjualan['TotalHarga'], 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <a href="data_penjualan.php" class="btn btn-outline-secondary">Kembali</a>
                <a href="cetak_struk.php?id=<?php echo $data_penjualan['PenjualanID']; ?>" class="btn btn-primary" target="_blank">
                    Cetak Struk 🖨️
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include("../nav/footer.php");
?>
