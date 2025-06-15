<?php
include '../forms/db.php';

// Cek apakah ada ID yang dikirim di URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM film WHERE id_film = $id");

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Film tidak ditemukan.";
        exit;
    }
} else {
    echo "ID film tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Descripsi-NontonApa Film</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

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

<body class="about-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="home.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1 class="sitename">NontonApa</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  </header>

  <main class="main">
    <!-- Daftar Film -->

<section id="about" class="about section mt-5">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      <div class="col-lg-4">
        <img src="../assets/img/aset/<?= htmlspecialchars($data['image']) ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($data['judul']) ?>">
      </div>
      <div class="col-lg-5 content">
        <h2><?= htmlspecialchars($data['judul']) ?></h2>
        <p class="fst-italic py-2"><?= htmlspecialchars($data['genre']) ?> | <?= htmlspecialchars($data['tahun']) ?> | Rating: <?= htmlspecialchars($data['rating']) ?>/10</p>
        <p><strong>Durasi:</strong> <?= htmlspecialchars($data['durasi']) ?></p>
        <p><strong>Sutradara:</strong> <?= htmlspecialchars($data['sutradara']) ?></p>
        <p><strong>Pemeran:</strong> <?= nl2br(htmlspecialchars($data['pemeran'])) ?></p>
        <p class="py-3"><?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>
        <p><em>"<?= htmlspecialchars($data['kutipan']) ?>"</em></p>
      </div>
    </div>
  </div>
</section>
  </main>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights Reserved</span></p>
      </div>
    </div>
  </footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>