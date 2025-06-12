<?php
session_start();
include '../db.php'; // sesuaikan path jika perlu

// Cek apakah ada permintaan hapus
if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];

    // Pastikan ID valid dan hanya admin yang bisa hapus
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $stmt = mysqli_prepare($conn, "DELETE FROM film WHERE id_film = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect agar URL bersih setelah hapus
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Akses ditolak');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin-NontonApa</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../../assets/css/main.css" rel="stylesheet">
</head>

<body class="login-page">

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="../index.html" class="logo d-flex align-items-center me-auto me-xl-0">
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

  <!-- Main Content -->
<main class="main">
  <section id="dashboard-admin" class="section d-flex align-items-center" style="min-height: 80vh;">
    <div class="container mt-4">
    <h2>Dashboard Admin</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Tambah Baru -->
        <a href="tambah.php" class="btn btn-outline-success">Tambah Baru</a>

        <!-- Form Pencarian -->
        <form class="d-flex" method="GET" action="">
          <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari judul film..."
            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
          />
          <button type="submit" class="btn btn-outline-success ms-2">Cari</button>
        </form>
    </div>

    <!-- Form Tambah Film (hidden by default) -->
    <form id="formTambah" action="tambah.php" method="POST" class="mb-4" enctype="multipart/form-data" style="display:none;">
        <div class="row g-2">
        <div class="col-md-4">
            <input type="text" name="judul" class="form-control" placeholder="Judul Film" required />
        </div>
        <div class="col-md-4">
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required />
        </div>
        <div class="col-md-2">
            <input type="number" name="rating" class="form-control" placeholder="Rating" min="0" max="10" required />
        </div>
        <div class="col-md-6 mt-2">
            <input type="text" name="image" class="form-control" placeholder="URL Gambar" />
        </div>
        <div class="col-md-6 mt-2">
            <input type="text" name="video" class="form-control" placeholder="URL Video" />
        </div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-outline-success">Tambah Film</button>
        </div>
        </div>
    </form>

    <!-- Tabel Film -->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Rating</th>
            <th>Gambar</th>
            <th>Video</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include '../db.php'; // sesuaikan

        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM film ORDER BY id_film DESC");
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
            echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
            echo "<td>" . htmlspecialchars($row['rating']) . "</td>";

            // Tampilkan gambar jika ada
            if (!empty($row['image'])) {
                echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='gambar' style='max-width:100px;'></td>";
            } else {
                echo "<td>-</td>";
            }

            // Tampilkan video jika ada (embed video sederhana)
            if (!empty($row['video'])) {
                echo "<td>
                        <video width='160' height='90' controls>
                            <source src='" . htmlspecialchars($row['video']) . "' type='video/mp4'>
                            Browser Anda tidak mendukung video.
                        </video>
                        </td>";
            } else {
                echo "<td>-</td>";
            }

            // Aksi edit dan hapus
      echo "<td>
                <a href='edit.php?id=" . $row['id_film'] . "' class='btn btn-sm btn-warning'>Edit</a>
                <a href='hapus.php?id=" . $row['id_film'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
              </td>";
        echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
  </section>
</main>

  <!-- Footer -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="../../https://bootstrapmade.com/">BootstrapMade</a>
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
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../../assets/js/main.js"></script>

  <script>
  // Script toggle form tambah
  const btnTambah = document.getElementById('btnTambah');
  const formTambah = document.getElementById('formTambah');

  btnTambah.addEventListener('click', () => {
    if (formTambah.style.display === 'none') {
      formTambah.style.display = 'block';
      btnTambah.textContent = 'Tutup Form';
    } else {
      formTambah.style.display = 'none';
      btnTambah.textContent = 'Tambah Baru';
    }
  });
</script>

</body>

</html>
