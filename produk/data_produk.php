<?php

include("../nav/header.php");

include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
        <a href="cetak_produk.php" class="btn btn-outline-primary">Cetak PDF</a>

            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "select * from produk");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>

                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['ProdukID']; ?></td>
                            <td><?php echo $row['NamaProduk']; ?></td>
                            <td><?php echo $row['Harga']; ?></td>
                            <td><?php echo $row['Stok']; ?></td>
                            <td>

                                <a href="edit_produk.php?id=<?php echo $row['ProdukID']; ?>" data-bs-toggle="modal" data-bs-target="#edit_Produk<?php echo $row['ProdukID']; ?>" class="btn btn-outline-warning">Edit</a>

                                <a href="hapus_produk.php?id=<?php echo $row['ProdukID']; ?>" class="btn btn-outline-danger ">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit_Produk<?php echo $row['ProdukID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-3">
                                                <label>Nama Produk</label>
                                                <input type="hidden" class="form-control" name="ProdukID" value="<?php echo $row['ProdukID'] ?>">
                                                <input type="text" class="form-control" name="NamaProduk" value="<?php echo $row['NamaProduk'] ?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <label>Harga</label>
                                                <input type="text" class="form-control" value="<?php echo $row['Harga'] ?>" name="harga">
                                            </div>
                                            <div class="form-group my-3">
                                                <label>Stok</label>
                                                <input type="number" class="form-control" readonly value="<?php echo $row['Stok'] ?>" name="stok">
                                                <div id="emailHelp" class="form-text">Lakukan pembelian barang.</div>
                                            </div>

                                            <div class="form-group mt-3 d-flex justify-content-center">
                                                <button class="btn btn-outline-warning form-control w-auto " type="submit">Edit Produk</button>
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
            <a href="tambah_produk.php" class="btn btn-outline-secondary">Tambah Produk</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>