<?php
session_start();

// Jika user sudah login, redirect ke index.php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      header("Location: index.php");
      exit();
}

if (isset($_SESSION['success']) && $_SESSION['success']) {
      echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                  Swal.fire({
                        title: "Login successful!",
                        icon: "success"
                  }).then(() => {
                        document.location = "index.php";
                  });
            });
      </script>';
      $_SESSION['success'] = false;
}

$error_message = "";
if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == 1) {
            $error_message = "Username atau password salah!";
      } elseif ($error == 2) {
            $error_message = "Tabel tidak ditemukan";
      } elseif ($error == 3) {
            $error_message = "Invalid request method. Please try again.";
      }
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inventaris Login</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

      h3 {
            color: white;
            font-family: "Rubik", sans-serif;
            font-size: clamp(3em, 2vw, 4em);
            font-weight: 400;
            margin: 0px;
            padding: 20px;
            text-align: center;
      }

      h3>.magic>.magic-text {
            animation: background-pan 3s linear infinite;
            background: linear-gradient(to right, var(--c1), var(--c2), var(--c3), var(--c1));
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
                                    <div class="card-img-overlay">
                                          <div class="row justify-content-center align-items-center h-100">
                                                <div class="col-6">
                                                      <h3 class="text-center fw-bold">
                                                            <span class="magic">
                                                                  <span class="magic-text">Sign In</span>
                                                            </span>
                                                      </h3>

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

      <?php if (!empty($error_message)): ?>
            <script>
                  document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                              title: "Error!",
                              text: "<?= $error_message ?>",
                              icon: "error"
                        });
                  });
            </script>
      <?php endif; ?>

</body>
</html>
