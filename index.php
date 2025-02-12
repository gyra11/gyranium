<?php
include 'config.php';
session_start();

if (!isset($_SESSION['Username'])) {
      header("Location: login.php");
      exit;
}

$PetugasID = $_SESSION['PetugasID'];

$querypetugas =  "SELECT * FROM petugas WHERE PetugasID='$PetugasID'";
$resultpetugas = $koneksi->query($querypetugas);

if ($resultpetugas) {
      $datapetugas = $resultpetugas->fetch_assoc();
} else {

      echo "<script>alert('Data petugas tidak ditemukan!' $koneksi->$error)</script>";
}

?>

<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Aplikasi Inventaris</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

      <style>
            #jlh,
            a p,
            a h5 {
                  transition: all 0.3s ease;
            }

            #jlh:hover {
                  transform: translateY(-10px);
            }

            a:hover p,
            a:hover h5 {

                  color: white !important;

            }

            :root {
                  --c1: #0e185f;
                  --c2: #0095a8;
                  --c3: #e8ffc2;

            }

            @keyframes background-pan {
                  from {
                        background-position: 0% center;
                  }

                  to {
                        background-position: -200% center;
                  }
            }

            @keyframes scale {

                  from,
                  to {
                        transform: scale(0);
                  }

                  50% {
                        transform: scale(1);
                  }
            }

            @keyframes rotate {
                  from {
                        transform: rotate(0deg);
                  }

                  to {
                        transform: rotate(180deg);
                  }
            }

            h4 {
                  color: white;
                  font-family: "Rubik", sans-serif;
                  font-size: clamp(2em, 2vw, 4em);
                  font-weight: 400;
                  margin: 0px;
                  padding: 20px;
                  text-align: center;
            }

            h4>.magic {
                  display: inline-block;
                  position: relative;
            }

            h4>.magic>.magic-star {
                  --size: clamp(20px, 1.5vw, 30px);

                  animation: scale 700ms ease forwards;
                  display: block;
                  height: var(--size);
                  left: var(--star-left);
                  position: absolute;
                  top: var(--star-top);
                  width: var(--size);
            }

            h4>.magic>.magic-star>svg {
                  animation: rotate 1000ms linear infinite;
                  display: block;
                  opacity: 0.7;
            }

            h4>.magic>.magic-star>svg>path {
                  fill: var(--c2);
            }

            h4>.magic>.magic-text {
                  animation: background-pan 3s linear infinite;
                  background: linear-gradient(to right,
                              var(--c1),
                              var(--c2),
                              var(--c3),
                              var(--c1));
                  background-size: 200%;
                  -webkit-background-clip: text;
                  -webkit-text-fill-color: transparent;
                  white-space: nowrap;
            }
      </style>
</head>

<body>
      <div class="index">
            <section>
                  <div class="container">
                        <div class="card mt-3">
                              <div class="card-body">
                                    <h4 class="text-center p-0 fw-bold">
                                          <span class="magic">
                                                <!-- <span class="magic-star ">
                                                      <svg viewBox="0 0 512 512">
                                                            <path d="M512 255.1c0 11.34-7.406 20.86-18.44 23.64l-171.3 42.78l-42.78 171.1C276.7 504.6 267.2 512 255.9 512s-20.84-7.406-23.62-18.44l-42.66-171.2L18.47 279.6C7.406 276.8 0 267.3 0 255.1c0-11.34 7.406-20.83 18.44-23.61l171.2-42.78l42.78-171.1C235.2 7.406 244.7 0 256 0s20.84 7.406 23.62 18.44l42.78 171.2l171.2 42.78C504.6 235.2 512 244.6 512 255.1z" />
                                                      </svg>
                                                </span>
                                                <span class="magic-star">
                                                      <svg viewBox="0 0 512 512">
                                                            <path d="M512 255.1c0 11.34-7.406 20.86-18.44 23.64l-171.3 42.78l-42.78 171.1C276.7 504.6 267.2 512 255.9 512s-20.84-7.406-23.62-18.44l-42.66-171.2L18.47 279.6C7.406 276.8 0 267.3 0 255.1c0-11.34 7.406-20.83 18.44-23.61l171.2-42.78l42.78-171.1C235.2 7.406 244.7 0 256 0s20.84 7.406 23.62 18.44l42.78 171.2l171.2 42.78C504.6 235.2 512 244.6 512 255.1z" />
                                                      </svg>
                                                </span>
                                                <span class="magic-star">
                                                      <svg viewBox="0 0 512 512">
                                                            <path d="M512 255.1c0 11.34-7.406 20.86-18.44 23.64l-171.3 42.78l-42.78 171.1C276.7 504.6 267.2 512 255.9 512s-20.84-7.406-23.62-18.44l-42.66-171.2L18.47 279.6C7.406 276.8 0 267.3 0 255.1c0-11.34 7.406-20.83 18.44-23.61l171.2-42.78l42.78-171.1C235.2 7.406 244.7 0 256 0s20.84 7.406 23.62 18.44l42.78 171.2l171.2 42.78C504.6 235.2 512 244.6 512 255.1z" />
                                                      </svg>
                                                </span> -->
                                                <span class="">Aplikasi Inventaris</span>
                                          </span>
                                    </h4>
                              </div>

                        </div>
                  </div>
                  <script>
                        let index = 0,
                              interval = 1000;

                        const rand = (min, max) =>
                              Math.floor(Math.random() * (max - min + 1)) + min;

                        const animate = star => {
                              star.style.setProperty("--star-left", `${rand(-10, 100)}%`);
                              star.style.setProperty("--star-top", `${rand(-40, 80)}%`);

                              star.style.animation = "none";
                              star.offsetHeight;
                              star.style.animation = "";
                        }

                        for (const star of document.getElementsByClassName("magic-star")) {
                              setTimeout(() => {
                                    animate(star);

                                    setInterval(() => animate(star), 1000);
                              }, index++ * (interval / 3))
                        }
                  </script>
            </section>

            <section>
                  <div class="container">
                        <div class="card mt-3">
                              <div class="card-body row justify-content-evenly">
                                    <a href="index.php" class="col-auto btn btn-outline-info">Beranda</a>
                                    <a href="produk/data_produk.php" class="col-auto btn btn-outline-success">Produk</a>
                                    <a href="pembelian/data_pembelian.php" class="col-auto btn btn-outline-success">Pembelian</a>
                                    <a href="penjualan/data_penjualan.php" class="col-auto btn btn-outline-success">Penjualan </a>
                                    <a href="pelanggan/data_pelanggan.php" class="col-auto btn btn-outline-success">Pelanggan </a>
                                    <a href="supplier/data_supplier.php" class="col-auto btn btn-outline-success">Supplier </a>

                                    <?php
                                    if ($_SESSION['Level'] == 1) {
                                          echo '<a href="petugas/data_petugas.php" class="col-auto btn btn-outline-success">Petugas</a>';
                                    }
                                    ?>
                                    <a href="logout.php" class="col-auto btn btn-outline-danger mt-lg-0 mt-3">Keluar</a>
                              </div>
                        </div>
                  </div>
            </section>

            <section class="mt-3">
                  <div class="container">
                        <div class="row">
                              <div class="col-3 col-md-4 mt-md-3">
                                    <div class="card" id="jlh">
                                          <div class="card-body">
                                                <a href="produk/data_produk.php"" class=" text-decoration-none">
                                                      <h5 class="text-info fw-bold">Data Produk</h5>
                                                      <?php

                                                      $data_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                                                      $jumlah_produk = mysqli_num_rows($data_produk);
                                                      ?>
                                                      <h1 class="text-secondary fw-bold"><?php echo $jumlah_produk; ?></h1>
                                                      <p class="text-end text-info">-></p>
                                                </a>
                                          </div>
                                    </div>

                              </div>

                              <div class="col-3 col-md-4 mt-md-3">
                                    <div class="card" id="jlh">
                                          <div class="card-body">
                                                <a href="penjualan/data_penjualan.php" class="text-decoration-none">
                                                      <h5 class="text-info fw-bold">Data penjualan</h5>
                                                      <?php

                                                      $data_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan");
                                                      $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                                                      ?>
                                                      <h1 class="text-secondary fw-bold"><?php echo $jumlah_penjualan; ?></h1>
                                                      <p class="text-end text-info">-></p>
                                                </a>
                                          </div>
                                    </div>

                              </div>

                              <div class="col-3 col-md-4 mt-md-3">
                                    <div class="card" id="jlh">
                                          <div class="card-body">
                                                <a href="pembelian/data_pembelian.php" class="text-decoration-none">
                                                      <h5 class="text-info fw-bold">Data pembelian</h5>
                                                      <?php

                                                      $data_pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian");
                                                      $jumlah_pembelian = mysqli_num_rows($data_pembelian);
                                                      ?>
                                                      <h1 class="text-secondary fw-bold"><?php echo $jumlah_pembelian; ?></h1>
                                                      <p class="text-end text-info">-></p>
                                                </a>
                                          </div>
                                    </div>

                              </div>
                        </div>

                        <div class="row justify-content-evenly">

                              <div class="col-3 col-md-4 mt-md-3">
                                    <div class="card" id="jlh">
                                          <div class="card-body">
                                                <a href="pelanggan/data_pelanggan.php" class="text-decoration-none">
                                                      <h5 class="text-info fw-bold">Data pelanggan</h5>
                                                      <?php

                                                      $data_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                                      $jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
                                                      ?>
                                                      <h1 class="text-secondary fw-bold"><?php echo $jumlah_pelanggan; ?></h1>
                                                      <p class="text-end text-info">-></p>
                                                </a>
                                          </div>
                                    </div>

                              </div>

                              <div class="col-3 col-md-4 mt-md-3">
                                    <div class="card" id="jlh">
                                          <div class="card-body">
                                                <a href="supplier/data_supplier.php" class="text-decoration-none">
                                                      <h5 class="text-info fw-bold">Data supplier</h5>
                                                      <?php

                                                      $data_supplier = mysqli_query($koneksi, "SELECT * FROM supplier");
                                                      $jumlah_supplier = mysqli_num_rows($data_supplier);
                                                      ?>
                                                      <h1 class="text-secondary fw-bold"><?php echo $jumlah_supplier; ?></h1>
                                                      <p class="text-end text-info">-></p>
                                                </a>
                                          </div>
                                    </div>

                              </div>

                              <?php
                              if ($_SESSION['Level'] == 1) {

                              ?>

                                    <div class="col-3 col-md-4 mt-md-3">

                                          <div class="card" id="jlh">
                                                <div class="card-body">
                                                      <a href="petugas/data_petugas.php" class="text-decoration-none">
                                                            <h5 class="text-info fw-bold">Data petugas</h5>
                                                            <?php

                                                            $data_petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
                                                            $jumlah_petugas = mysqli_num_rows($data_petugas);
                                                            ?>
                                                            <h1 class="text-secondary fw-bold"><?php echo $jumlah_petugas; ?></h1>
                                                            <p class="text-end text-info">-></p>
                                                      </a>
                                                </div>
                                          </div>

                                    </div>
                              <?php

                              }
                              ?>
                        </div>
                  </div>
            </section>
      </div>

      <section>
            <div class="container">
                  <div class="card mt-3">
                        <div class="card-body">
                              <?php

                              if ($datapetugas['Level'] == 1) {

                                    echo '<p class="text-center fw-bold mb-0">Selamat datang administrator ' . $datapetugas['Username'] . ',' . ' silahkan menikmati :)</p>';
                              } else {
                                    echo '<p class="text-center fw-bold mb-0">Selamat datang petugas, silahkan menikmati :)</p>';
                              }
                              ?>

                        </div>
                  </div>
                  <div class="card mt-3">
                        <div class="card-body">
                              <p class="text-center fw-bold mb-0">&copy; LSP 2025 RPL By: Rahsya Benova Akbar </p>
                        </div>
                  </div>
            </div>

      </section>

</body>

</html>