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
                        <th scope="col">No</th>
                        <th scope="col">ID Supplier</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "select * from supplier");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>

                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['SupplierID']; ?></td>
                            <td><?php echo $row['NamaSupplier']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['NomorTelepon']; ?></td>
                            <td>

                                <a href="edit_Supplier.php?id=<?php echo $row['SupplierID']; ?>" data-bs-toggle="modal" data-bs-target="#edit_Supplier<?php echo $row['SupplierID']; ?>" class="btn btn-outline-warning">Edit</a>

                                <a href="hapus_Supplier.php?id=<?php echo $row['SupplierID']; ?>" class="btn btn-outline-danger ">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit_Supplier<?php echo $row['SupplierID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Supplier</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-3">
                                                <label>Nama Supplier</label>
                                                <input type="hidden" class="form-control" name="SupplierID" value="<?php echo $row['SupplierID'] ?>">
                                                <input type="text" class="form-control" name="NamaSupplier" value="<?php echo $row['NamaSupplier'] ?>">
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
            <a href="tambah_supplier.php" class="btn btn-outline-secondary">Tambah Supplier</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>