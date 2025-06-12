<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database
    $hapus = mysqli_query($conn, "DELETE FROM film WHERE id_film = $id");

    if ($hapus) {
        // Berhasil, arahkan balik ke dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
