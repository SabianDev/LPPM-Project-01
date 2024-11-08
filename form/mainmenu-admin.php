<?php


// Include the database connection
include 'connect.php'; // Include the connection file

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
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';
 
//CEK ADMIN ATAU BUKAN


// Cek apakah pengguna adalah admin
$sql = "SELECT * FROM data_admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Jika bukan admin, tampilkan pesan dan arahkan ke logout.php
    echo "<script>alert('Username anda adalah $username, harap masuk sebagai admin untuk mengakses.'); window.location.href = 'logout.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPEDAS (Admin Mode)</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-ovbox.css">
</head>
<body class="bg-light">

    <header class="header">
        <div class="header-left">
            <h1>SIPEDAS BERANI (Admin Mode)</h1>
        </div>
        <div class="header-right">
            <?php if (!empty($username)): ?>
                <span>Halo, <?php echo htmlspecialchars($nama); ?></span> <!-- Tampilkan nama pengguna -->
                <?php if ($username === 'admin'): ?> <!-- Cek jika pengguna adalah admin -->
                    <span>Admin</span> <!-- Tampilkan label admin -->
                <?php endif; ?>
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
                            <a href="data_keluarga/form_data_keluarga.php" class="sidenav-btn">• Data Keluarga</a>
                            <a href="kegiatan_warga/form_kegiatan_warga.php" class="sidenav-btn">• Kegiatan Warga</a>
                            <a href="rekap_data_ibu_hamil_per_dasawisma/form_rekap_data_ibu_hamil_per_dasa_wisma.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per Dasa Wisma</a>
                            <a href="data_per_dasawisma/form_data_per_dasawisma.php" class="sidenav-btn">• Data Per Dasa Wisma</a>
                            <a href="rekap_data_bumil_rt/form_rekap_bumil_rt.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RT</a>
                            <a href="rekap_data_bumil_rw/form_data_hamil_per_rw.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RW</a>
                            <a href="rekap_catatan_dasawisma/form_rekap_catatan_per_dasawisma.php" class="sidenav-btn">• Rekap Catatan Dasa Wisma</a>
                            <a href="rekap_catatan_pkk_rt/form_rekap_catatan_pkk_rt.php" class="sidenav-btn">• Rekap Catatan PKK RT</a>
                            <a href="rekap_catatan_pkk_rw/form_rekap_catatan_pkk_rw.php" class="sidenav-btn">• Rekap Catatan PKK RW</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VIEW - USER -->
            <div class="accordion" id="accordionView">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingView">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseView" aria-expanded="false" aria-controls="collapseView">
                            Lihat Rekap Data
                        </button>
                    </h2>
                    <div id="collapseView" class="accordion-collapse collapse" aria-labelledby="headingView" data-bs-parent="#accordionView">
                        <div class="accordion-body">
                            <a href="data_keluarga/view_data_keluarga.php" class="sidenav-btn">• Data Keluarga</a>
                            <a href="kegiatan_warga/view_kegiatan_warga.php" class="sidenav-btn">• Kegiatan Warga</a>
                            <a href="rekap_data_ibu_hamil_per_dasawisma/view_rekap_data_ibu_hamil_per_dasa_wisma.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per Dasa Wisma</a>
                            <a href="data_per_dasawisma/view_data_per_dasawisma.php" class="sidenav-btn">• Data Per Dasa Wisma</a>
                            <a href="rekap_data_bumil_rt/view_rekap_bumil_rt.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RT</a>
                            <a href="rekap_data_bumil_rw/view_data_hamil_per_rw.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RW</a>
                            <a href="rekap_catatan_dasawisma/view_rekap_catatan_per_dasawisma.php" class="sidenav-btn">• Rekap Catatan Dasa Wisma</a>
                            <a href="rekap_catatan_pkk_rt/view_rekap_catatan_pkk_rt.php" class="sidenav-btn">• Rekap Catatan PKK RT</a>
                            <a href="rekap_catatan_pkk_rw/view_rekap_catatan_pkk_rw.php" class="sidenav-btn">• Rekap Catatan PKK RW</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EDIT - ADMIN-->
            <div class="accordion" id="accordionEdit">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEdit">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEdit" aria-expanded="false" aria-controls="collapseEdit">
                            Edit Data
                        </button>
                    </h2>
                    <div id="collapseEdit" class="accordion-collapse collapse" aria-labelledby="headingView" data-bs-parent="#accordionEdit">
                        <div class="accordion-body">
                            <a href="data_keluarga/edit_data_keluarga.php" class="sidenav-btn">• Data Keluarga</a>
                            <a href="kegiatan_warga/edit_kegiatan_warga.php" class="sidenav-btn">• Kegiatan Warga</a>
                            <a href="rekap_data_ibu_hamil_per_dasawisma/edit_rekap_data_ibu_hamil_per_dasa_wisma.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per Dasa Wisma</a>
                            <a href="data_per_dasawisma/edit_data_per_dasawisma.php" class="sidenav-btn">• Data Per Dasa Wisma</a>
                            <a href="rekap_data_bumil_rt/edit_data_hamil_per_rt.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RT</a>
                            <a href="rekap_data_bumil_rw/edit_data_hamil_per_rw.php" class="sidenav-btn">• Rekap Data Ibu Hamil Per RW</a>
                            <a href="rekap_catatan_dasawisma/edit_rekap_catatan_per_dasawisma.php" class="sidenav-btn">• Rekap Catatan Dasa Wisma</a>
                            <a href="rekap_catatan_pkk_rt/edit_rekap_catatan_pkk_rt.php" class="sidenav-btn">• Rekap Catatan PKK RT</a>
                            <a href="rekap_catatan_pkk_rw/edit_rekap_catatan_pkk_rw.php" class="sidenav-btn">• Rekap Catatan PKK RW</a>
                        </div>
                    </div>
                </div>
            </div><br>
            <!-- <a href="settings.php" class="sidenav-btn sidenav-item-btn">Pengaturan</a> -->
            <a href="ganti_password-admin.php" class="sidenav-btn sidenav-item-btn">Ganti Password</a>
            <a href="#" class="sidenav-btn sidenav-item-btn" onclick="confirmLogout()">Logout</a> <!-- Ubah ke konfirmasi logout -->
        </div>
        <h2>Jumlah Data :</h2>
        <div class="contents-right">
            <!-- Card 1 -->
            <div class="container">
                <!-- BARIS 1 -->
                <div class="row" id="contents-right">
                    <!-- DATA KELUARGA -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM data_keluarga";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Data Keluarga</p>
                            </div>
                        </div>
                    </div>
                    <!-- KEGIATAN WARGA -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM kegiatan_warga";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Kegiatan Warga</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rekap Data Ibu Hamil Per-Dasawisma -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM rekap_data_ibu_hamil_per_dasa_wisma";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Data Ibu Hamil Per-Dasawisma</p>
                            </div>
                        </div>
                    </div>
                    <!-- Data Per Dasawisma -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM data_per_dasawisma";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Data Per-Dasawisma</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rekap Data Ibu Hamil Per-RT -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM form_rekap_bumil_rt";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Data Ibu Hamil Per-RT</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan card berikutnya... -->
                </div>
                <!-- BARIS 2 -->
                <div class="row" id="contents-right">
                    <!-- Rekap Data Ibu Hamil Per-RW -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM form_rekap_bumil_rw";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Data Ibu Hamil Per-RW</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rekap Catatan Per-Dasawisma -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM rekap_catatan_per_dasawisma";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Catatan Per-Dasawisma</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rekap Catatan PKK RT -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM rekap_catatan_pkk_rt";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Catatan PKK RT</p>
                            </div>
                        </div>
                    </div>
                    <!-- Rekap Catatan PKK RW -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM rekap_catatan_pkk_rw";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Rekap Catatan PKK RW</p>
                            </div>
                        </div>
                    </div>
                    <!-- Jumlah Pengguna -->
                    <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?php
                                        $sql = "SELECT * FROM data_user";

                                        if ($result = mysqli_query($conn, $sql)) {
                                            $rowcount = mysqli_num_rows($result);
                                            printf("%d", $rowcount);
                                        }
                                    ?>
                                </h2>
                                <p class="card-text">Jumlah Pengguna</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan card berikutnya... -->
                </div>
            </div>
            <!-- Ulangi dengan card berikutnya... -->
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

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
