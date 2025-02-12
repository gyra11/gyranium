<?php

include("../nav/header.php");

include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="proses_produk.php">
                <h4 class="text-center">Tambah Produk</h4>
                <div class="form-group my-3">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="nama">
                </div>
                <div class="form-group my-3">
                    <label>Harga</label>
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="harga">
                </div>
                <div class="form-group my-3">
                    <label>Stok</label>
                    <input type="number" class="form-control" required placeholder="Ketik Disini.." name="stok">
                </div>
                <div clas s="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-outline-primary form-control w-auto " type="submit">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>