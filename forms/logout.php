<?php
session_start();         // Mulai sesi
session_unset();         // Hapus semua variabel session
session_destroy();       // Hancurkan sesi

// Redirect ke halaman login atau homepage
header("Location: ../index.php");
exit;
?>