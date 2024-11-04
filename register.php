<?php
// Sertakan file koneksi
require 'connect.php'; // Menggunakan koneksi dari connect.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data dari form daftar
    $nama = $_POST['nama']; // Tangkap nama
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password dengan MD5

    // Insert ke tabel data_user
    $query = "INSERT INTO data_user (nama, username, password) VALUES ('$nama', '$username', '$password')";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Register</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <!-- Form register dengan action menuju file PHP yang sama -->
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="logo">
                    <img src="img/logo_sipedas.png" alt="Logo Sipedas" width="130" height="130">
                </div>
                <br>
                <h1>Register</h1>
                <!-- Name input -->
                <input type="text" id="nama" name="nama" placeholder="Nama" required>
                <!-- Username input -->
                <input type="text" id="username" name="username" placeholder="Masukan NIK" required>
                <!-- Password input -->
                <input type="text" id="password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
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
        var nama = document.getElementById("nama").value; // Tangkap nama
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (nama == "" || username == "" || password == "") {
            alert("Nama, Username dan Password harus diisi!");
            return false;
        }
        return true;
    }
    </script>
</body>

</html>
