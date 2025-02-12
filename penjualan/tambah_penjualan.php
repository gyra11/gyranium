<?php

include("../nav/header.php");

include("../nav/navbar.php");
?>
<div class="container">
    <div class="card mt-2">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="proses_penjualan.php" id="penjualanForm" style="position: relative;">
                <h4 class="text-center">Transaksi Penjualan</h4>

                <div class="ta" id="ta">
                    <div id="produkSection1" class="produk-section">
                        <div class="form-group my-3">
                            <label>Nama Barang</label>
                            <select class="form-select" name="ProdukID[]">
                                <option>Pilih Barang</option>
                                <?php
                                $query_produk = "SELECT * FROM produk";
                                $result_produk = mysqli_query($koneksi, $query_produk);

                                if ($result_produk) {
                                    while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                                        echo "<option value='{$row_produk['ProdukID']}' data-harga='{$row_produk['Harga']}' data-stok='{$row_produk['Stok']}'>{$row_produk['NamaProduk']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>Error</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group my-3">
                            <label>Jumlah</label>
                            <input type="text" class="form-control jumlah" required placeholder="Ketik Disini.." name="jumlah[]">
                        </div>
                        <div class="form-group my-3">
                            <label>Subtotal</label>
                            <input readonly class="form-control subtotal" required placeholder="Ketik Disini.." name="subtotal[]">
                        </div>
                        <div class="form-group my-3">
                            <label>Total Harga</label>
                            <input readonly type="number" class="form-control total" required placeholder="Ketik Disini.." name="total[]">
                        </div>
                    </div>

                </div>

                <div class="form-group my-3" id="nama_pembeli" style="position: absolute; top: 0;">
                    <label>Nama Pembeli</label>
                    <select class="form-select" name="PelangganID">
                        <option>Pilih Pembeli</option>
                        <?php
                        $query_pelanggan = "SELECT * FROM pelanggan";
                        $result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

                        if ($result_pelanggan) {
                            while ($row_pelanggan = mysqli_fetch_assoc($result_pelanggan)) {
                                echo "<option value='{$row_pelanggan['PelangganID']}'>{$row_pelanggan['NamaPelanggan']}</option>";
                            }
                        } else {
                            echo "<option value=''>Error</option>";
                        }

                        mysqli_close($koneksi);
                        ?>
                    </select>
                </div>
                <div class="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-outline-primary form-control w-auto" type="submit">Tambah Penjualan</button>
                </div>
                <div class="form-group mt-3 d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-success" onclick="tambahBarang()">Tambah Barang</button>
                </div>
            </form>

            <script>
                var counter = 1;

                function tambahBarang() {
                    counter++;
                    var newSection = document.getElementById('produkSection1').cloneNode(true);
                    newSection.id = 'produkSection' + counter;

                    newSection.querySelector('.form-select').selectedIndex = 0;
                    newSection.querySelector('.jumlah').value = '';
                    newSection.querySelector('.subtotal').value = '';
                    newSection.querySelector('.total').value = '';

                    newSection.querySelector('.form-select').name = 'ProdukID[]';
                    newSection.querySelector('.jumlah').name = 'jumlah[]';
                    newSection.querySelector('.subtotal').name = 'subtotal[]';
                    newSection.querySelector('.total').name = 'total[]';

                    document.getElementById('ta').appendChild(newSection);
                    updateTotals();
                }

                document.getElementById('penjualanForm').addEventListener('change', function(e) {
                    if (e.target.className.includes('form-select') || e.target.className.includes('jumlah')) {
                        updateTotals();
                    }
                });

                function updateTotals() {
                    var productSections = document.querySelectorAll('.produk-section');
                    var grandTotal = 0;

                    productSections.forEach(function(section) {
                        var harga = section.querySelector('.form-select').options[section.querySelector('.form-select').selectedIndex].getAttribute('data-harga');
                        var jumlah = section.querySelector('.jumlah').value;
                        var subtotal = harga * jumlah;

                        section.querySelector('.subtotal').value = subtotal;
                        section.querySelector('.total').value = subtotal;

                        grandTotal += subtotal;
                    });

                    document.getElementById('total').value = grandTotal;
                }
            </script>


        </div>
    </div>
</div>

<?php
include("../nav/footer.php");
?>