document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value.trim();
  const message = document.getElementById('message');

  // Validasi login sederhana
  if (username === 'admin' && password === '1234') {
    // Login berhasil, redirect ke dashboard.html
    window.location.href = "dashboard.html";
  } else {
    // Gagal login
    message.textContent = "Username atau password salah!";
  }
});
