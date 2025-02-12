<section>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body row justify-content-evenly">
                <a href="../index.php" class="col-auto btn btn-outline-info">Beranda</a>
                <a href="../produk/data_produk.php" class="col-auto btn btn-outline-success">Produk</a>
                <a href="../pembelian/data_pembelian.php" class="col-auto btn btn-outline-success">Pembelian</a>
                <a href="../penjualan/data_penjualan.php" class="col-auto btn btn-outline-success">Penjualan </a>
                <a href="../pelanggan/data_pelanggan.php" class="col-auto btn btn-outline-success">Pelanggan </a>
                <a href="../supplier/data_supplier.php" class="col-auto btn btn-outline-success">Supplier </a>

                <?php
                if ($_SESSION['Level'] == 1) {
                    echo '<a href="../petugas/data_petugas.php" class="col-auto btn btn-outline-success">Petugas</a>';
                }
                ?>
                <a href="../logout.php" class="col-auto btn btn-outline-danger mt-3 mt-lg-0">Keluar</a>
            </div>
        </div>
    </div>
</section>