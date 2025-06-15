<?php
include '../db.php';

// 1. Ambil ID dari URL dan pastikan integer
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID film tidak valid.");
}
$id = intval($_GET['id']);

// 2. Ambil data film dari database
$q = mysqli_query($conn, "SELECT * FROM film WHERE id_film = $id");
if (!$q || mysqli_num_rows($q) === 0) {
    die("Film dengan ID $id tidak ditemukan.");
}
$data = mysqli_fetch_assoc($q);

// 3. Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gunakan escape untuk mencegah SQL Injection
    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $rating    = floatval($_POST['rating']);
    $video     = mysqli_real_escape_string($conn, $_POST['video']);
    $genre     = mysqli_real_escape_string($conn, $_POST['genre']);
    $durasi    = mysqli_real_escape_string($conn, $_POST['durasi']);
    $tahun     = intval($_POST['tahun']);
    $sutradara = mysqli_real_escape_string($conn, $_POST['sutradara']);
    $pemeran   = mysqli_real_escape_string($conn, $_POST['pemeran']);
    $kutipan   = mysqli_real_escape_string($conn, $_POST['kutipan']);

    // 4. Ganti gambar jika ada upload baru
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir  = '../../assets/img/aset/';
        $imageName  = basename($_FILES['image']['name']);
        $uploadPath = $uploadDir . $imageName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $imageField = ", image = '$imageName'";
        } else {
            echo "<p style='color:red;'>Gagal upload gambar.</p>";
            $imageField = "";
        }
    } else {
        $imageField = ""; // Gambar tidak diupdate
    }

    // 5. Jalankan query UPDATE
    $sql = "UPDATE film SET
        judul = '$judul',
        deskripsi = '$deskripsi',
        rating = $rating,
        genre = '$genre',
        durasi = '$durasi',
        tahun = $tahun,
        sutradara = '$sutradara',
        pemeran = '$pemeran',
        kutipan = '$kutipan',
        video = '$video'
        $imageField
        WHERE id_film = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='admin_dashboard.php';</script>";
        exit;
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Film</title>
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
<main class="main">
  <section class="login-section d-flex align-items-center justify-content-center">
    <div class="container">
          <div class="card shadow-lg p-4 rounded-4 border-0 bg-dark text-light">
            <div class="card-body">

            <h2>Edit Film</h2>
            <enctype="multipart/form-data">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Judul Film</label>
                    <div class="col-sm-9">
                    <input type="text" name="judul" class="form-control"
                            value="<?= htmlspecialchars($data['judul']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                    <textarea name="deskripsi" class="form-control" rows="3" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Rating</label>
                    <div class="col-sm-9">
                    <input type="number" name="rating" class="form-control" min="0" max="10" step="0.1"
                            value="<?= htmlspecialchars($data['rating']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Genre</label>
                    <div class="col-sm-9">
                    <input type="text" name="genre" class="form-control"
                            value="<?= htmlspecialchars($data['genre']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Durasi</label>
                    <div class="col-sm-9">
                    <input type="text" name="durasi" class="form-control"
                            value="<?= htmlspecialchars($data['durasi']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Tahun</label>
                    <div class="col-sm-9">
                    <input type="number" name="tahun" class="form-control" min="1900" max="2099"
                            value="<?= htmlspecialchars($data['tahun']) ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Sutradara</label>
                    <div class="col-sm-9">
                    <input type="text" name="sutradara" class="form-control"
                            value="<?= htmlspecialchars($data['sutradara']) ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Pemeran</label>
                    <div class="col-sm-9">
                    <textarea name="pemeran" class="form-control" rows="2"><?= htmlspecialchars($data['pemeran']) ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Kutipan</label>
                    <div class="col-sm-9">
                    <input type="text" name="kutipan" class="form-control"
                            value="<?= htmlspecialchars($data['kutipan']) ?>">
                    </div>
                </div>

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Gambar Saat Ini</label>
                    <div class="col-sm-9">
                        <?php if (!empty($data['image'])): ?>
                        <img src="../../assets/img/aset/<?= htmlspecialchars($data['image']) ?>" alt="Poster Film" class="img-thumbnail" width="200">
                        <?php else: ?>
                        <p class="text-muted">Belum ada gambar.</p>
                        <?php endif; ?>
                    </div>
                </div>

                
                
                <div class="row mb-4">
                    <label class="col-sm-3 col-form-label">URL Video</label>
                    <div class="col-sm-9">
                    <input type="text" name="video" class="form-control"
                            value="<?= htmlspecialchars($data['video']) ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="offset-sm-3 col-sm-9 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
                </form>

        </div>
      </div>
    </div>
</body>
</html>