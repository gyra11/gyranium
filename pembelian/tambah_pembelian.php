<?php

include("../nav/header.php");

?>
<?php
include("../nav/navbar.php");
?>
<div class="container ">
    <div class="card mt-2">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="proses_pembelian.php">
                <h4 class="text-center">
                    Transaksi Pembelian
                </h4>
                <div class="form-group my-3">
                    <label>Nama Barang</label>
                    <select class="form-select" name="ProdukID">
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
                    <input type="text" class="form-control" required placeholder="Ketik Disini.." name="jumlah" id="jumlah">
                </div>
                <div class="form-group my-3">
                    <label>Subtotal</label>
                    <input readonly id="subtotal" type="text" class="form-control" required placeholder="Ketik Disini.." name="subtotal">
                </div>
                <div class="form-group my-3">
                    <label>Total Harga</label>
                    <input readonly id="total" type="number" class="form-control" required placeholder="Ketik Disini.." name="total">
                </div>
                <div class="form-group my-3">
                    <label>Nama Supplier</label>
                    <select class="form-select" name="SupplierID">
                        <option>Pilih Supplier</option>
                        <?php
                        $query_Supplier = "SELECT * FROM Supplier";
                        $result_Supplier = mysqli_query($koneksi, $query_Supplier);

                        if ($result_Supplier) {
                            while ($row_Supplier = mysqli_fetch_assoc($result_Supplier)) {
                                echo "<option value='{$row_Supplier['SupplierID']}'>{$row_Supplier['NamaSupplier']}</option>";
                            }
                        } else {
                            echo "<option value=''>Error</option>";
                        }

                        mysqli_close($koneksi);
                        ?>
                    </select>
                </div>

                <div clas s="form-group mt-3 d-flex justify-content-center">
                    <button class="btn btn-outline-primary form-control w-auto " type="submit">Tambah Pembelian</button>
                </div>

            </form>
            <script>
                document.querySelector('select[name="ProdukID"]').addEventListener('change', function() {
                    var selectedOption = this.options[this.selectedIndex];
                    var harga = selectedOption.getAttribute('data-harga');
                    var stok = selectedOption.getAttribute('data-stok');
                    document.getElementById('subtotal').value = harga * document.getElementById('jumlah').value;
                    document.getElementById('total').value = harga * document.getElementById('jumlah').value;
                });

                document.getElementById('jumlah').addEventListener('input', function() {
                    var selectedOption = document.querySelector('select[name="ProdukID"] option:checked');
                    var harga = selectedOption.getAttribute('data-harga');
                    var stok = selectedOption.getAttribute('data-stok');
                    // if (parseInt(this.value) > parseInt(stok)) {
                    //     alert("Jumlah melebihi stok!");
                    //     this.value = stok; // Atur kembali jumlah ke nilai stok maksimal
                    // }
                    document.getElementById('subtotal').value = harga * this.value;
                    document.getElementById('total').value = harga * this.value;
                });
            </script>
        </div>
    </div>
</div>
<?php
include("../nav/footer.php");
?>