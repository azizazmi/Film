<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username dan password harus diisi!";
        header("Location: login.php");
        exit;
    }

    // Cek login sebagai admin
    $stmtAdmin = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmtAdmin->bind_param("s", $username);
    $stmtAdmin->execute();
    $adminResult = $stmtAdmin->get_result();

    if ($adminResult->num_rows === 1) {
        $admin = $adminResult->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            header("Location: dashboard.php");
            exit;
        }
    }

    // Cek login sebagai user
    $stmtUser = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmtUser->bind_param("s", $username);
    $stmtUser->execute();
    $userResult = $stmtUser->get_result();

    if ($userResult->num_rows === 1) {
        $user = $userResult->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'user';
            header("Location: ../Home.html");
            exit;
        }
    }

    // Jika tidak cocok sebagai admin maupun user
    $_SESSION['error'] = "Username atau password salah!";
    header("Location: login.php");
    exit;

} else {
    // Jika bukan POST method
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}
