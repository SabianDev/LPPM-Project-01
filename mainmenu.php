<?php
// Mulai session
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil informasi pengguna yang sedang login
$username = $_SESSION['username'];
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; // Ambil nama dari session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN UTAMA SIPEDAS BERANI</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-light">

    <header class="header">
        <div class="header-left">
            <h1>SIPEDAS BERANI</h1>
        </div>
        <div class="header-right">
            <?php if (!empty($username)): ?>
                <span>Hallo : <?php echo htmlspecialchars($nama); ?></span> <!-- Tampilkan nama pengguna -->
            <?php else: ?>
                <span>Login sebagai:</span>
            <?php endif; ?>
        </div>
    </header>
    
    <div class="main-content">
        <div class="sidenav">
            <!-- FORM -->
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                            Form
                        </button>
                    </h2>
                    <div id="collapseForm" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="form_data_keluarga.php" class="sidenav-btn">Data Keluarga</a>
                            <a href="form_kegiatan_warga.php" class="sidenav-btn">Kegiatan Warga</a>
                            <a href="form_rekap_data_ibu_hamil_per_dasa_wisma.php" class="sidenav-btn">Rekap Data Ibu Hamil Per Dasa Wisma</a>
                            <a href="form_data_per_dasawisma.php" class="sidenav-btn">Data Per Dasa Wisma</a>
                            <a href="form_rekap_bumil_rt.php" class="sidenav-btn">Rekap Data Ibu Hamil Per RT</a>
                            <a href="form_data_hamil_per_rw.php" class="sidenav-btn">Rekap Data Ibu Hamil Per RW</a>
                            <a href="form_rekap_catatan_per_dasawisma.php" class="sidenav-btn">Rekap Catatan Dasa Wisma</a>
                            <a href="form_rekap_catatan_pkk_rt.php" class="sidenav-btn">Rekap Catatan PKK RT</a>
                            <a href="form_rekap_catatan_pkk_rw.php" class="sidenav-btn">Rekap Catatan PKK RW</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VIEW - USER -->
            <div class="accordion" id="accordionSettings">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSettings">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapseSettings">
                            Rekap Data
                        </button>
                    </h2>
                    <div id="collapseSettings" class="accordion-collapse collapse" aria-labelledby="headingSettings" data-bs-parent="#accordionSettings">
                        <div class="accordion-body">
                            <a href="view_data_keluarga.php" class="sidenav-btn">Data Keluarga</a>
                            <a href="view_kegiatan_warga.php" class="sidenav-btn">Kegiatan Warga</a>
                            <a href="view_rekap_data_ibu_hamil_per_dasa_wisma.php" class="sidenav-btn">Rekap Data Ibu Hamil Per Dasa Wisma</a>
                            <a href="view_data_per_dasawisma.php" class="sidenav-btn">Data Per Dasa Wisma</a>
                            <a href="view_rekap_bumil_rt.php" class="sidenav-btn">Rekap Data Ibu Hamil Per RT</a>
                            <a href="view_data_hamil_per_rw.php" class="sidenav-btn">Rekap Data Ibu Hamil Per RW</a>
                            <a href="view_rekap_catatan_per_dasawisma.php" class="sidenav-btn">Rekap Catatan Dasa Wisma</a>
                            <a href="view_rekap_catatan_pkk_rt.php" class="sidenav-btn">Rekap Catatan PKK RT</a>
                            <a href="view_rekap_catatan_pkk_rw.php" class="sidenav-btn">Rekap Catatan PKK RW</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="settings.php" class="sidenav-btn sidenav-item-btn">Pengaturan</a>
            <a href="ganti_password.php" class="sidenav-btn sidenav-item-btn">Ganti Password</a>
            <a href="#" class="sidenav-btn sidenav-item-btn" onclick="confirmLogout()">Logout</a> <!-- Ubah ke konfirmasi logout -->
        </div>
    </div>

    <script>
    function confirmLogout() {
        var confirmation = confirm("Apakah Anda ingin logout?");
        if (confirmation) {
            window.location.href = "logout.php"; // Arahkan ke logout.php jika konfirmasi
        }
    }
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
