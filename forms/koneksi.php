<?php
$servername = "localhost";  // biasanya localhost
$dbusername = "root";       // ganti sesuai username database kamu
$dbpassword = "";           // ganti sesuai password database kamu
$dbname = "nontonapa"; // ganti dengan nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
