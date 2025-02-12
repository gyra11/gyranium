<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="proses_register.php">
                <h4 class="text-center">Register</h4>
                <div class="form-group my-3">
                    <label>Username</label>
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="username">
                </div>
                <div class="form-group my-3">
                    <label>Password</label>
                    <input type="password" class="form-control" required placeholder="Ketik Disini.." name="password">
                </div>
                <div class="form-group my-3">
                    <label>Level</label>
                    <select class="form-select" name="level">
                        <option>Pilih Level</option>
                        <option value="1">Administrator</option>
                        <option value="2">Petugas</option>
                    </select>
                </div>
                <div clas s="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-primary form-control w-auto " type="submit">Tambah Petugas</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>