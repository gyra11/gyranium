<?php

include("../nav/header.php");

include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <a href="cetak_pembelian.php" class="btn btn-outline-primary">Cetak PDF</a>
            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID&nbsp;Pembelian</th>
                        <th>Tanggal&nbsp;Pembelian</th>
                        <th>Total&nbsp;Pembelian</th>
                        <th>Nama&nbsp;Supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM pembelian");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>

                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['PembelianID']; ?></td>
                            <td><?php echo $row['TanggalPembelian']; ?></td>
                            <td><?php echo $row['TotalHarga']; ?></td>
                            <td>
                                <?php $SupplierID = $row['SupplierID'];
                                $query_Supplier =  "SELECT * FROM Supplier WHERE SupplierID = '$SupplierID'";
                                $result_Supplier = mysqli_query($koneksi, $query_Supplier);

                                if ($result_Supplier) {
                                    $nama_Supplier = mysqli_fetch_assoc($result_Supplier);

                                    echo $nama_Supplier['NamaSupplier'];
                                } else {

                                    echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
                                }


                                ?>
                            </td>
                            <td>
                                <a href="detail_Pembelian.php?id=<?php echo $row['PembelianID']; ?>" class="btn btn-outline-success">Detail</a>
                                <a href="hapus_Pembelian.php?id=<?php echo $row['PembelianID']; ?>" class="btn btn-outline-danger mt-3 mt-lg-0">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit_Supplier<?php echo $row['PembelianID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Supplier</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-5">
                                                <label>Nama Supplier</label>
                                                <input type="hidden" class="form-control" name="PembelianID" value="<?php echo $row['PembelianID'] ?>">
                                                <input type="text" class="form-control" name="TanggalPembelian" value="<?php echo $row['TanggalPembelian'] ?>">
                                            </div>
                                            <div class="form-group my-5">
                                                <label>TotalHarga</label>
                                                <input type="text" class="form-control" value="<?php echo $row['TotalHarga'] ?>" name="TotalHarga">
                                            </div>
                                            <div class="form-group my-5">
                                                <label>Tanggal</label>
                                                <input type="number" class="form-control" value="<?php echo $row['TanggalPembelian'] ?>" name="tgl">
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
            <a href="tambah_pembelian.php" class="btn btn-outline-secondary">Tambah Pembelian</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>