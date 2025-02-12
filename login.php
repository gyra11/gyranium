<?php

session_start();

if (isset($_SESSION['success']) && $_SESSION['success']) {
      echo '<script>alert("Login successful!");
    document.location = "index.php";</script>';
      $_SESSION['success'] = false;
}
if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == 1) {
            $error_message = "Username atau password salah!.";
      } elseif ($error == 2) {
            $error_message = "Tabel tidak ditemukan";
      } elseif ($error == 3) {
            $error_message = "Invalid request methode. Please try again.";
      }
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inventaris Login</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<style>
      :root {
            --c1: #1cdefc;
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

      h3 {
            color: white;
            font-family: "Rubik", sans-serif;
            font-size: clamp(3em, 2vw, 4em);
            font-weight: 400;
            margin: 0px;
            padding: 20px;
            text-align: center;
      }

      h3>.magic {
            display: inline-block;
            position: relative;
      }

      h3>.magic>.magic-star {
            --size: clamp(20px, 1.5vw, 30px);

            animation: scale 700ms ease forwards;
            display: block;
            height: var(--size);
            left: var(--star-left);
            position: absolute;
            top: var(--star-top);
            width: var(--size);
      }

      h3>.magic>.magic-star>svg {
            animation: rotate 1000ms linear infinite;
            display: block;
            opacity: 0.7;
      }

      h3>.magic>.magic-star>svg>path {
            fill: var(--c2);
      }

      h3>.magic>.magic-text {
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

<body>
      <div class="login" style="height: 100vh;">
            <section>
                  <div class="container h-100">
                        <div class="content h-100">
                              <div class="card text-white mt-5 col-6 mx-auto">
                                    <img src="assets/gerak.gif" alt="logo" style="filter: brightness(65%);" class="card-img img-fluid mx-auto">
                                    <div class="card-img-overlay ">
                                          <div class="row justify-content-center align-items-center h-100">
                                                <div class="col-6">

                                                      <h3 class="text-center fw-bold">
                                                            <span class="magic">
                                                                 
                                                                  <span class="magic-text">Sign In</span>
                                                            </span>
                                                      </h3>

                                                      <?php
                                                      if (isset($error_message)) {
                                                            echo '<script> alert("' . $error_message . '");</script>';
                                                      }
                                                      ?>
                                                      <form method="post" enctype="multipart/form-data" action="proses_login.php">
                                                            <div class="form-group my-3">
                                                                  <label>Username</label>
                                                                  <input type="text" class="form-control" placeholder="Ketik Disini.." name="username">
                                                            </div>
                                                            <div class="form-group my-3">
                                                                  <label>Password</label>
                                                                  <input type="password" class="form-control" placeholder="Ketik Disini.." name="password">
                                                            </div>
                                                            <div class="form-group mt-3 d-flex justify-content-center">
                                                                  <button class="btn btn-outline-success form-control w-auto " type="submit">Login</button>
                                                            </div>
                                                      </form>

                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </section>

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

            /* --  on hover, replace lines 16 and on with this code ↓↓↓ -- */

            // let timeouts = [],
            //     intervals = [];

            // const magic = document.querySelector(".magic");

            // magic.onmouseenter = () => {
            //   let index = 1;

            //   for(const star of document.getElementsByClassName("magic-star")) {
            //     timeouts.push(setTimeout(() => {  
            //       animate(star);

            //       intervals.push(setInterval(() => animate(star), 1000));
            //     }, index++ * 300));
            //   };
            // }

            // magic.onmouseleave = onMouseLeave = () => {
            //   for(const t of timeouts) clearTimeout(t);  
            //   for(const i of intervals) clearInterval(i);

            //   timeouts = [];
            //   intervals = [];
            // }
      </script>
</body>

</html>