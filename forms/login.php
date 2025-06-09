<?php
session_start();

// Ambil pesan error jika ada
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form action="forms/proses_login.php" method="POST">
        <label>Username:</label><br />
        <input type="text" name="username" required /><br /><br />

        <label>Password:</label><br />
        <input type="password" name="password" required /><br /><br />

        <button type="submit">Login</button>
    </form>
</body>
</html>
