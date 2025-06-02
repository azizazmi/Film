document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const messageElement = document.getElementById('message');

    // Username dan Password yang sudah ditentukan
    const correctUsername = "superadmin";
    const correctPassword = "admin123";

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form untuk refresh halaman

        const enteredUsername = usernameInput.value;
        const enteredPassword = passwordInput.value;

        if (enteredUsername === correctUsername && enteredPassword === correctPassword) {
            messageElement.textContent = "Login Berhasil!";
            messageElement.className = "message success";
            setTimeout(function() {
                window.location.href = "dashboard.html"; // Ini akan mengarahkan ke halaman index.html
            }, 1500); // Tunda 1.5 detik sebelum mengarahkan

        } else {
            messageElement.textContent = "Username atau password salah.";
            messageElement.className = "message error";
        }
    });
});