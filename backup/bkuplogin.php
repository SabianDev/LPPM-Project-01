<?php
// login.php
session_start();
require 'connect.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap username dan password dari form login
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password dengan MD5

    // Query untuk mendapatkan informasi pengguna dari tabel data_user
    $queryUser = "SELECT * FROM data_user WHERE username='$username' AND password='$password'";
    $resultUser = $conn->query($queryUser);

    // Query untuk mendapatkan informasi admin dari tabel data_admin
    $queryAdmin = "SELECT * FROM data_admin WHERE username='$username' AND password='$password'";
    $resultAdmin = $conn->query($queryAdmin);

    if ($resultUser->num_rows > 0) {
        // Ambil data pengguna
        $user = $resultUser->fetch_assoc();
        
        // Simpan username dan nama ke session
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama']; // Ambil nama dari database
        
        // Alihkan ke halaman utama
        header("Location: mainmenu.php");
        exit();
    } elseif ($resultAdmin->num_rows > 0) {
        // Ambil data admin
        $admin = $resultAdmin->fetch_assoc();
        
        // Simpan username ke session
        $_SESSION['username'] = $admin['username'];
        // Nama admin tidak ada, jadi tidak disimpan
        
        // Alihkan ke halaman utama
        header("Location: mainmenu.php");
        exit();
    } else {
        echo "<script>alert('Login gagal: Username atau password salah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="logo">
                    <img src="img/logo_sipedas.png" alt="Logo Sipedas" width="130" height="130">
                </div>
                <br>
                <h1>Login</h1>
                <input type="text" id="username" name="username" placeholder="Masukan NIK anda" required>

                <div class="password-container"  style="position: relative;">
                    <input type="password" id="password"  name="password" placeholder="Password" style="padding-right: 133px; width: 100%;">
                    <img id="togglePassword" src="img/eye-svgrepo-com.svg" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;">
                </div>

                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
                <button type="button" onclick="window.location.href='register.php'">Register</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right image-row">
                    <img src="img/logo2.png" alt="logo" width="300" height="300">
                </div>
            </div>
        </div>
    </div>

    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username == "" || password == "") {
            alert("Username dan Password harus diisi!");
            return false;
        }
        return true;
    }

    // Tambahkan fungsi untuk toggle visibilitas password
    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        this.src = type === 'password' ? 'img/eye-svgrepo-com.svg' : 'img/eye-closed-svgrepo-com.svg'; // Ubah gambar sesuai dengan status
    });
    </script>
</body>
</html>