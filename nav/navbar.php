<?php
$current_page = basename($_SERVER['PHP_SELF']); // Ambil nama file halaman saat ini
?>

<section>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body row justify-content-evenly">
                <a href="../index.php" class="col-auto btn <?= ($current_page == 'index.php') ? 'btn-info text-white' : 'btn-outline-info'; ?>">Beranda</a>
                <a href="../produk/data_produk.php" class="col-auto btn <?= ($current_page == 'data_produk.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Produk</a>
                <a href="../pembelian/data_pembelian.php" class="col-auto btn <?= ($current_page == 'data_pembelian.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Pembelian</a>
                <a href="../penjualan/data_penjualan.php" class="col-auto btn <?= ($current_page == 'data_penjualan.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Penjualan</a>
                <a href="../pelanggan/data_pelanggan.php" class="col-auto btn <?= ($current_page == 'data_pelanggan.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Pelanggan</a>
                <a href="../supplier/data_supplier.php" class="col-auto btn <?= ($current_page == 'data_supplier.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Supplier</a>

                <?php if ($_SESSION['Level'] == 1): ?>
                    <a href="../petugas/data_petugas.php" class="col-auto btn <?= ($current_page == 'data_petugas.php') ? 'btn-success text-white' : 'btn-outline-success'; ?>">Petugas</a>
                <?php endif; ?>

                <a href="../logout.php" class="col-auto btn btn-outline-danger mt-3 mt-lg-0">Keluar</a>
            </div>
        </div>
    </div>
</section>
