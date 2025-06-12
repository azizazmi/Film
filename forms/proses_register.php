<?php
session_start();
include 'koneksi.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Cek apakah username sudah dipakai
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['error'] = "Username sudah digunakan!";
    header("Location: register.php");
    exit;
}

// Simpan user baru
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    $_SESSION['success'] = "Pendaftaran berhasil! Silakan login.";
    header("Location: login.php");
} else {
    $_SESSION['error'] = "Gagal mendaftar!";
    header("Location: register.php");
}
exit;
