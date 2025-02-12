<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
        <a href="cetak_penjualan.php" class="btn btn-outline-primary">Cetak PDF</a>
            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Penjualan</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Nama Pelanggan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "select * from penjualan");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>

                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['PenjualanID']; ?></td>
                            <td><?php echo $row['TanggalPenjualan']; ?></td>
                            <td><?php echo $row['TotalHarga']; ?></td>
                            <td>
                                <?php $PelanganID = $row['PelangganID'];
                                $query_pelanggan =  "SELECT * FROM pelanggan WHERE PelangganID = '$PelanganID'";
                                $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

                                if ($result_pelanggan) {
                                    $nama_pelanggan = mysqli_fetch_assoc($result_pelanggan);

                                    echo $nama_pelanggan['NamaPelanggan'];
                                } else {

                                    echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
                                }


                                ?>
                            </td>
                            <td>
    <a href="detail_penjualan.php?id=<?php echo $row['PenjualanID']; ?>" class="btn btn-outline-success">Detail</a>
    <a href="hapus_penjualan.php?id=<?php echo $row['PenjualanID']; ?>" class="btn btn-outline-danger">Hapus</a>
    <a href="cetak_struk.php?id=<?php echo $row['PenjualanID']; ?>" class="btn btn-outline-primary">Cetak Struk</a>
</td>

                        </tr>
                        <div class="modal fade" id="edit_Pelanggan<?php echo $row['PenjualanID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Pelanggan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-5">
                                                <label>Nama Pelanggan</label>
                                                <input type="hidden" class="form-control" name="PenjualanID" value="<?php echo $row['PenjualanID'] ?>">
                                                <input type="text" class="form-control" name="TanggalPenjualan" value="<?php echo $row['TanggalPenjualan'] ?>">
                                            </div>
                                            <div class="form-group my-5">
                                                <label>TotalHarga</label>
                                                <input type="text" class="form-control" value="<?php echo $row['TotalHarga'] ?>" name="TotalHarga">
                                            </div>
                                            <div class="form-group my-5">
                                                <label>Tanggal</label>
                                                <input type="number" class="form-control" value="<?php echo $row['TanggalPenjualan'] ?>" name="tgl">
                                            </div>

                                            <div class="form-group mt-3 d-flex justify-content-center">
                                                <button class="btn btn-primary form-control w-auto " type="submit">Edit Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="tambah_penjualan.php" class="btn btn-outline-secondary">Tambah Penjualan</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>