<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    if (empty($email) || empty($username) || empty($password)) {
        $error = "Semua field wajib diisi!";
    } else {
        $cek = $conn->query("SELECT * FROM users WHERE username = '$username'");
        if ($cek->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {

            $conn->query("INSERT INTO users (email, username, password, role)
                          VALUES ('$email', '$username', '$password', 'user')");

            header("Location: login.php");
            exit;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register- NontonApa</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="login-page">

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
      <i class="bi bi-camera"></i>
      <h1 class="sitename">NontonApa</h1>
    </a>
    <nav id="navmenu" class="navmenu">
      <ul></ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>

<main class="main">
  <section class="section d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
          <div class="card shadow-lg p-4 rounded-4 border-0 bg-dark text-light">
            <div class="card-body">
              <h3 class="text-center mb-4">Register</h3>

              <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
              <form method="POST">
                  <div class="mb-3">
                      <label>Email</label>
                      <input type="email" name="email" required class="form-control">
                  </div>
                  <div class="mb-3">
                      <label>Username</label>
                      <input type="text" name="username" required class="form-control">
                  </div>
                  <div class="mb-3">
                      <label>Password</label>
                      <input type="password" name="password" required class="form-control">
                  </div>
                  <button class="btn btn-outline-success btn-sm px-3 py-1 me-2">Register</button>
              </form>

              <div class="text-center mt-3">
                Sudah punya akun? <a href="login.php" class="text-info text-decoration-none">Login disini</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<footer id="footer" class="footer">
  <div class="container">
    <div class="copyright text-center">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights Reserved</span></p>
      <div class="credits">Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></div>
    </div>
  </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"><div class="line"></div></div>

<!-- Vendor JS Files -->
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="../assets/js/main.js"></script>
<script src="../script.js"></script>

</body>
</html>
