<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="proses_supplier.php">
                <h4 class="text-center">Tambah Supplier</h4>
                <div class="form-group my-3">
                    <label>Nama Supplier</label>
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="nama">
                </div>
                <div class="form-group my-3">
                    <label>Alamat</label>
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="alamat">
                </div>
                <div class="form-group my-3">
                    <label>No Telepon</label>
                    <input type="number" class="form-control" required placeholder="Ketik Disini.." name="notelp">
                </div>
                <div clas s="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-primary form-control w-auto " type="submit">Tambah Supplier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>