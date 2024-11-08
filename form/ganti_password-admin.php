<?php
// ganti_password.php
session_start();
require 'connect.php'; // Koneksi ke database

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];
$nama_user = $_SESSION['nama'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap password dari form
    $currentPassword = md5($_POST['current_password']);
    $newPassword = md5($_POST['new_password']);
    $confirmPassword = md5($_POST['confirm_password']);

    // Cek apakah password baru dan konfirmasi password sama
    if ($newPassword !== $confirmPassword) {
        $error = "Password baru dan konfirmasi password tidak cocok.";
    } else {
        // Query untuk mengecek password saat ini
        $query = "SELECT * FROM data_user WHERE username='$username' AND password='$currentPassword'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Update password baru
            $updateQuery = "UPDATE data_user SET password='$newPassword' WHERE username='$username'";
            if ($conn->query($updateQuery) === TRUE) {
                $success = "Password berhasil diubah.";
            } else {
                $error = "Terjadi kesalahan saat mengubah password.";
            }
        } else {
            $error = "Password saat ini salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password (Admin)</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Ganti Password (Admin)</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    <div class="mb-3 ganti-pass">
        <div class="mb-3 mr-3 ganti-id">
            <label for="nama_user" class="form-label">NIK Pengguna</label>
            <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo htmlspecialchars($username); ?>" readonly>
        </div>
        <div class="mb-3 ganti-nama">
            <label for="nama_user" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo htmlspecialchars($nama_user); ?>" readonly>
        </div>
    </div>
    <form action="" method="post">
        
        
        <div class="mb-3">
            <label for="current_password" class="form-label">Password Saat Ini</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Password</button>
        <button type="submit" class="btn btn-primary" onclick="location.href='mainmenu-admin.php'">Kembali</button>
    </form>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
