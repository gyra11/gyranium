<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<?php

if ($_SESSION['Level'] != 1) {
    echo '<script>alert("Anda tidak diizinkan mengakses halaman ini.");
    window.location.href="../index.php";</script>';
    die();
}
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <table class="table table-bordered table-responsive align-midle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Petugas</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM petugas");
                    $no = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        $no++;
                    ?>
                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $row['PetugasID']; ?></td>
                            <td><?php echo $row['Username']; ?></td>
                            <td><?php if ($row['Level'] == 1) { echo 'Administrator'; } else { echo 'Petugas'; } ?></td>
                            <td>
                                <a href="edit_petugas.php?id=<?php echo $row['PetugasID']; ?>" data-bs-toggle="modal" data-bs-target="#edit_petugas<?php echo $row['PetugasID']; ?>" class="btn btn-outline-warning">Edit</a>

                                <a href="hapus_petugas.php?id=<?php echo $row['PetugasID']; ?>" class="btn btn-outline-danger">Hapus</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit_petugas<?php echo $row['PetugasID']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Petugas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data" action="proses_edit.php">

                                            <div class="form-group my-3">
                                                <label>Username</label>
                                                <input type="hidden" class="form-control" name="PetugasID" value="<?php echo $row['PetugasID'] ?>">
                                                <input type="text" class="form-control" name="username" value="<?php echo $row['Username'] ?>">
                                            </div>
                                            <div class="form-group my-3">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                                <small class="text-danger">* Kosongkan kalau tidak ingin merubah</small>
                                            </div>


                                            <div class="form-group my-3">
                                                <label>Level</label>
                                                <select class="form-select" name="level">
                                                    <option>Pilih Level</option>
                                                    <option value="1" <?php if ($row['Level'] == '1') { echo "selected"; } ?>>Administrator</option>
                                                    <option value="2" <?php if ($row['Level'] == '2') { echo "selected"; } ?>>Petugas</option>
                                                </select>
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
            <a href="register.php" class="btn btn-outline-secondary">Tambah Petugas</a>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>