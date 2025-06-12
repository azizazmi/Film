<?php
include '../db.php';

$id = $_GET['id']; // ambil ID dari URL
$query = mysqli_query($conn, "SELECT * FROM film WHERE id_film = $id");
$data = mysqli_fetch_assoc($query);

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $rating = $_POST['rating'];
    $image = $_POST['image'];
    $video = $_POST['video'];

    $update = mysqli_query($conn, "UPDATE film SET 
        judul = '$judul', 
        deskripsi = '$deskripsi', 
        rating = '$rating',
        image = '$image',
        video = '$video' 
        WHERE id_film = $id");

    if ($update) {
        echo "<script>alert('Berhasil diupdate'); window.location='admin_dashboard.php';</script>";
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
</head>
<body class="container mt-4">
    <h2>Edit Film</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" value="<?= htmlspecialchars($data['deskripsi']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Rating</label>
            <input type="number" name="rating" class="form-control" value="<?= htmlspecialchars($data['rating']) ?>" min="0" max="10" required>
        </div>
        <div class="mb-3">
            <label>URL Gambar</label>
            <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($data['image']) ?>">
        </div>
        <div class="mb-3">
            <label>URL Video</label>
            <input type="text" name="video" class="form-control" value="<?= htmlspecialchars($data['video']) ?>">
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
