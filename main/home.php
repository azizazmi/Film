<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}

// --- BAGIAN BARU: KONEKSI DATABASE & AMBIL DATA FILM ---
include '../forms/db.php'; // Sesuaikan path jika db_connect.php ada di direktori lain

$film = [];
// Pastikan nama tabel dan kolom sesuai dengan database Anda
$sql = "SELECT id_film, judul, image, video FROM film ORDER BY id_film DESC"; // Mengambil film terbaru dulu
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $film[] = $row;
    }
}
$conn->close(); // Tutup koneksi setelah selesai mengambil data
// --- AKHIR BAGIAN BARU ---

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard- NontonApa Bootstrap Template</title>
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

<body class="index-page">
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="../index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <i class="bi bi-camera"></i>
        <h1 class="sitename">NontonApa</h1>
      </a>

      <nav id="navmenu" class="navmenu d-flex align-items-center">
        <form class="flex-grow-1 mx-3" role="search" style="max-width: 400px;">
          <div class="input-group">
            <span class="input-group-text bg-white" id="basic-addon1">
              <i class="bi bi-search"></i>
            </span>
            <input
              type="search"
              id="search-bar"
              name="search"
              class="form-control border-success focus-ring-success"
              placeholder="Search"
              aria-label="Search"
              aria-describedby="basic-addon1"
              style="box-shadow: none;"
            >
          </div>
        </form>
        <div class="d-flex align-items-center">
          <a href="../index.php" class="btn btn-outline-success btn-sm px-3 py-1 me-2">Logout</a>
        </div>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
  </header>
 




  <main class="main">

    <!-- Hero Section -->
<section id="hero" class="hero section">
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner rounded shadow">

        <div class="carousel-item active">
          <img class="d-block w-100" src="../assets/img/aset/danur.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/img/aset/evil dead rise.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/img/aset/kemah terlarang.jpg" alt="Third slide">
        </div>

      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
      </button>
    </div>
  </div>
</section>

    <!-- /Hero Section -->

    <!-- Gallery Section -->
<!-- Film Gallery -->
<section id="gallery" class="gallery section">
  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      <?php if (empty($film)): ?>
        <p class="text-center text-muted">Tidak ada film yang tersedia saat ini.</p>
      <?php else: ?>
        <?php foreach ($film as $f): ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="../assets/img/aset/<?= htmlspecialchars($f['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($f['judul']) ?>">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?= htmlspecialchars($f['video']) ?>" class="glightbox preview-link" title="Trailer <?= htmlspecialchars($f['judul']) ?>">
                  <i class="bi bi-play-circle"></i>
                </a>
                <a href="about.php?id=<?= htmlspecialchars($f['id_film']) ?>" class="details-link">
                  <i class="bi bi-info-circle"></i>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </div>
</section>
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <p>Rating Film</p>
        <h2></h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <img src="../assets/img/aset/sekawan limo.jpg" alt="SL">
                <div class="profile mt-auto">
                  <h3>Sekawan Limo</h3>
                  <h4>Horor &amp; Komedi</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <img src="https://upload.wikimedia.org/wikipedia/id/0/0f/Poster_Home_Sweet_Loan.jpg" alt="HSL">
                <div class="profile mt-auto">
                  <h3>Home Sweet Loan</h3>
                  <h4>Family</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <img src="https://upload.wikimedia.org/wikipedia/id/9/98/Imperfect_Karier%2C_Cinta_%26_Timbangan_poster.jpeg" alt="IMP">
                <div class="profile mt-auto">
                  <h3>Imperfect</h3>
                  <h4>Romance</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <img src="../assets//img//aset/thriller.webp" alt="BI">
                <div class="profile mt-auto">
                  <h3>Bangsal Isolasi</h3>
                  <h4>Thriller</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <img src="https://awsimages.detik.net.id/community/media/visual/2024/09/30/poster-film-kemah-terlarang-kesurupan-massal.jpeg?w=1200" alt="KT">
                <div class="profile mt-auto">
                  <h3>Kemah Terlarang</h3>
                  <h4>Horor</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>