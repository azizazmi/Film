<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Gallery - PhotoFolio Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Updated: A 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="gallery-page">

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
      <i class="bi bi-film"></i>
      <h1 class="sitename">NontonApa</h1>
    </a>
      <nav id="navmenu" class="navmenu">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
          <a href="forms/login.php" class="btn btn-outline-success btn-sm px-3 py-1 me-2">Login</a>
          <a href="forms/register.php" class="btn btn-outline-success btn-sm px-3 py-1 me-2">Register</a>
        </div>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Rekomendasi Film, Series, dan Drama Terbaik  Ada disini</h1>
                <p class="mb-0">
                  Temukan tontonan favoritmu di satu tempat.
                  Update terus, pilihan lengkap, semua untuk kamu.
                </p>
              <a href="forms/login.php" class="cta-btn">Gabung sekarang<br></a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->
  </section>
  <!-- Team Section --><section class="team section-bg py-5" id="team">
  <div class="container">

    <!-- Judul di kiri -->
    <div class="section-title text-start" data-aos="fade-up">
      <p class="text-uppercase">Team</p>
      <h2 class="mb-4">Tim Pengembang Website</h2>
    </div>

    <!-- Anggota tim -->
    <div class="row justify-content-center text-center">
      <!-- Anggota 1 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="member w-100">
          <h4>Hanifatul Nadiva</h4>
          <span>20230140203</span>
          <div class="social-links mt-2">
            <a href="https://github.com/hanifatulnadiva" target="_blank" class="me-2">
              <i class="bi bi-github" style="font-size: 1.3rem;"></i>
            </a>
            <a href="https://www.linkedin.com/in/hanifatul-nadiva-89a157289?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
              <i class="bi bi-linkedin" style="font-size: 1.3rem;"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Anggota 2 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="member w-100">
          <h4>Nayla Salwa Hayati</h4>
          <span>20230140218</span>
          <div class="social-links mt-2">
            <a href="#" class="me-2"><i class="bi bi-github"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

      <!-- Anggota 3 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="member w-100">
          <h4>Azizah Aurellia Azmi</h4>
          <span>20230140234</span>
          <div class="social-links mt-2">
            <a href="https://github.com/azizazmi" class="me-2"><i class="bi bi-github"></i></a>
            <a href="https://www.linkedin.com/in/azizah-aurellia-azmi-798677289?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Baris kedua anggota -->
    <div class="row justify-content-center text-center">
      <!-- Anggota 4 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="member w-100">
          <h4>Husna Kamila Syahida</h4>
          <span>20230140238</span>
          <div class="social-links mt-2">
            <a href="https://github.com/husnakamilaa" class="me-2"><i class="bi bi-github"></i></a>
            <a href="http://www.linkedin.com/in/husnakamilaa"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>

      <!-- Anggota 5 -->
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="member w-100">
          <h4>Nabiilah ‘Afiifah Zalfaa’ Safitri</h4>
          <span>20230140243</span>
          <div class="social-links mt-2">
            <a href="https://github.com/nabilasaf" class="me-2"><i class="bi bi-github"></i></a>
            <a href="http://www.linkedin.com/in/nabilaafiifahzs"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  </main>
  
  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">NontonApa</strong> <span>All Rights Reserved</span></p>
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>