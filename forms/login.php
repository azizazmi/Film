<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password yang di-hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Redirect berdasarkan role
            if ($row['role'] === 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: ../main/home.php");
            }
            exit;
        }
    }

    $error = "Username atau password salah!";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - NontonApa Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS -->
  <link href="../assets/css/main.css" rel="stylesheet">
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
              <h3 class="text-center mb-4">Login</h3>
               <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control">
                    </div>
                    <button class="btn btn-primary">Login</button>
                </form>
              <div class="text-center mt-3">
                Belum punya akun? <a href="register.php" class="text-info text-decoration-none">Register sekarang</a>
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
