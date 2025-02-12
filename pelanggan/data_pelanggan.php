<?php

include("../nav/header.php");

include("../nav/navbar.php");
?>

<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID&nbsp;Pelanggan</th>
                        <th>Nama&nbsp;Pelanggan</th>
                        <th>Alamat</th>
                        <th>No&nbsp;Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "select * from pelanggan");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>

                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['PelangganID']; ?></td>
                            <td><?php echo $row['NamaPelanggan']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['NomorTelepon']; ?></td>
                            <td>

                                <a href="edit_pelanggan.php?id=<?php echo $row['PelangganID']; ?>" data-bs-toggle="modal" data-bs-target="#edit_Pelanggan<?php echo $row['PelangganID']; ?>" class="btn btn-outline-warning">Edit</a>

                                <a href="hapus_pelanggan.php?id=<?php echo $row['PelangganID']; ?>" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit_Pelanggan<?php echo $row['PelangganID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Pelanggan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-3">
                                                <label>Nama Pelanggan</label>
                                                <input type="hidden" class="form-control" name="PelangganID" value="<?php echo $row['PelangganID'] ?>">
                                                <input type="text" class="form-control" name="NamaPelanggan" value="<?php echo $row['NamaPelanggan'] ?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" value="<?php echo $row['Alamat'] ?>" name="alamat">
                                            </div>
                                            <div class="form-group my-3">
                                                <label>No Telepon</label>
                                                <input type="number" class="form-control" value="<?php echo $row['NomorTelepon'] ?>" name="notelp">
                                            </div>

                                            <div class="form-group mt-3 d-flex justify-content-center">
                                                <button class="btn btn-outline-warning form-control w-auto " type="submit">Edit Data</button>
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
            <a href="tambah_pelanggan.php" class="btn btn-outline-secondary">Tambah Pelanggan</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>