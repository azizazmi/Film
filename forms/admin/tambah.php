<?php
session_start();
include '../db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!')</script>";
    exit;
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $judul = $_POST['judul'];
     $deskripsi = $_POST['deskripsi'];
     $rating = $_POST['rating'];
     $video = $_POST['video'];
    $genre = $_POST['genre'];
     $durasi = $_POST['durasi'];
    $tahun = $_POST['tahun'];
    $sutradara = $_POST['sutradara'];
    $pemeran = $_POST['pemeran'];
    $kutipan = $_POST['kutipan'];


    // Validasi file gambar
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Batasi ekstensi
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageExt, $allowedExt)) {
            echo "Ekstensi gambar tidak didukung!";
            exit;
        }

        // Batasi ukuran file max 2MB
        if ($imageSize > 20 * 1024 * 1024) {
            echo "Ukuran gambar terlalu besar (maks 20MB)";
            exit;
        }

        // Simpan gambar
        $uploadDir = '../../assets/img/aset/';
        $newImageName = uniqid('film_') . '.' . $imageExt;
        $uploadPath = $uploadDir . $newImageName;

    if (move_uploaded_file($imageTmp, $uploadPath)) 
    {

        $query = "INSERT INTO film (judul, deskripsi, rating, genre, durasi, tahun, sutradara, pemeran, kutipan, image, video)
                VALUES ('$judul', '$deskripsi', '$rating', '$genre', '$durasi', '$tahun', '$sutradara', '$pemeran', '$kutipan', '$imageName', '$video')";

        if (mysqli_query($conn, $query))
        {
            header("Location: admin_dashboard.php");
            exit;
        }
        else
        {
            echo "Gagal menyimpan data: " . mysqli_error($conn);
        }
    } 
    else 
    {
        echo "Upload gambar gagal.";
    }
}else {
     echo "Tidak ada file gambar yang diupload atau terjadi error.";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Film</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<body>
<main class="main">
  <section class="login-section d-flex align-items-center justify-content-center">
    <div class="container">
          <div class="card shadow-lg p-4 rounded-4 border-0 bg-dark text-light">
            <div class="card-body">
                <h2>Tambah Film</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Judul Film</label>
                        <div class="col-sm-9">
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Danur 3" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Ringkasan film..." required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Rating</label>
                        <div class="col-sm-9">
                        <input type="number" name="rating" class="form-control" min="0" max="10" step="0.1" placeholder="Contoh: 7.5" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Genre</label>
                        <div class="col-sm-9">
                        <input type="text" name="genre" class="form-control" placeholder="Contoh: Horor, Thriller" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                        <input type="text" name="durasi" class="form-control" placeholder="Contoh: 1h 45m" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Tahun</label>
                        <div class="col-sm-9">
                        <input type="number" name="tahun" class="form-control" min="1900" max="2099" placeholder="Contoh: 2023" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Sutradara</label>
                        <div class="col-sm-9">
                        <input type="text" name="sutradara" class="form-control" placeholder="Contoh: Awi Suryadi">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Pemeran</label>
                        <div class="col-sm-9">
                        <textarea name="pemeran" class="form-control" rows="2" placeholder="Contoh: Prilly Latuconsina, Rizky Nazar"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Kutipan</label>
                        <div class="col-sm-9">
                        <input type="text" name="kutipan" class="form-control" placeholder="Contoh: 'Sunyaruri bukan tempat untuk manusia…'">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">URL Gambar</label>
                        <div class="col-sm-9">
                        <input type="File" name="image" class="form-control" placeholder="Choose file">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">URL Video</label>
                        <div class="col-sm-9">
                        <input type="text" name="video" class="form-control" placeholder="Contoh: https://youtube.com/watch?v=12345">
                        </div>
                    </div>

                    <div class="row">
                        <div class="offset-sm-3 col-sm-9 d-flex gap-2">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </form>

        </div>
      </div>
    </div>
</body>
</html>