<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $rating = $_POST['rating'];
    $image = $_POST['image'];
    $video = $_POST['video'];

    $query = "INSERT INTO film (judul, deskripsi, rating, image, video) VALUES ('$judul', '$deskripsi', '$rating', '$image', '$video')";

    if (mysqli_query($conn, $query)) {
        header("Location: admin_dashboard.php"); // kembali ke dashboard admin
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Film</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Film</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Judul Film</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" min="0" max="10" required>
        </div>
        <div class="mb-3">
            <label>URL Gambar</label>
            <input type="text" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label>URL Video</label>
            <input type="text" name="video" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
