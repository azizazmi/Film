<?php
file_put_contents("debug.log", "proses_login dipanggil: " . $_SERVER['REQUEST_METHOD'] . PHP_EOL, FILE_APPEND);
session_start();
include 'koneksi.php'; // Asumsikan koneksi.php juga ada di folder forms/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password harus diisi!";
        header("Location: login.php"); // karena satu folder, cukup nama file saja
        exit;
    }

    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        $_SESSION['error'] = "Terjadi kesalahan server.";
        header("Location: login.php");
        exit;
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // arahkan sesuai letak file dashboard.php
            exit;
        } else {
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Username tidak ditemukan!";
        header("Location: login.php");
        exit;
    }
} else {
    // Ganti kode HTTP agar tidak dianggap "OK" jika bukan POST
    http_response_code(405);
    echo "Method Not Allowed - Hanya menerima POST.";
    exit;
}

