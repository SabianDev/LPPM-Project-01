<?php
session_start();
include '../connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $id = $_POST['id'];
    $kelurahan = $_POST['kelurahan'];
    $kelompok_pkk_rw = $_POST['kelompok_pkk_rw'];
    $kelompok_pkk_rt = $_POST['kelompok_pkk_rt'];
    $tahun = $_POST['tahun'];
    $bulan = $_POST['bulan'];
    $nama_kelompok_dasawisma = $_POST['kelompok'];
    $hamil = $_POST['hamil'];
    $melahirkan = $_POST['melahirkan'];
    $nifas = $_POST['nifas'];
    $meninggal = $_POST['meninggal'];
    $lahir_laki_laki = $_POST['lahir_laki_laki'];
    $lahir_perempuan = $_POST['lahir_perempuan'];
    $memiliki_akte_kelahiran = $_POST['memiliki_akte_kelahiran'];
    $tidak_memiliki_akte_kelahiran = $_POST['tidak_memiliki_akte_kelahiran'];
    $meninggal_laki_laki_bayi = $_POST['meninggal_laki_laki_bayi'];
    $meninggal_perempuan_bayi = $_POST['meninggal_perempuan_bayi'];
    $meninggal_laki_laki_balita = $_POST['meninggal_laki_laki_balita'];
    $meninggal_perempuan_balita = $_POST['meninggal_perempuan_balita'];
    $keterangan = $_POST['keterangan'];

    // Prepare the SQL update statement
    $sql = "UPDATE form_rekap_bumil_rt SET 
                kelurahan = ?, 
                kelompok_pkk_rw = ?, 
                kelompok_pkk_rt = ?, 
                tahun = ?, 
                bulan = ?, 
                nama_kelompok_dasawisma = ?, 
                hamil = ?, 
                melahirkan = ?, 
                nifas = ?, 
                meninggal = ?, 
                lahir_laki_laki = ?, 
                lahir_perempuan = ?, 
                memiliki_akte_kelahiran = ?, 
                tidak_memiliki_akte_kelahiran = ?, 
                meninggal_laki_laki_bayi = ?, 
                meninggal_perempuan_bayi = ?, 
                meninggal_laki_laki_balita = ?, 
                meninggal_perempuan_balita = ?, 
                keterangan = ? 
                WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssiiiiiiiiiiiiss", 
        $kelurahan, 
        $kelompok_pkk_rw, 
        $kelompok_pkk_rt, 
        $tahun, 
        $bulan, 
        $nama_kelompok_dasawisma, 
        $hamil, 
        $melahirkan, 
        $nifas, 
        $meninggal, 
        $lahir_laki_laki, 
        $lahir_perempuan, 
        $memiliki_akte_kelahiran, 
        $tidak_memiliki_akte_kelahiran, 
        $meninggal_laki_laki_bayi, 
        $meninggal_perempuan_bayi, 
        $meninggal_laki_laki_balita, 
        $meninggal_perempuan_balita, 
        $keterangan, 
        $id
    );

    if ($stmt->execute()) {
        // Redirect back to the original page with a success message
        header("Location: edit_data_hamil_per_rt.php?message=success");
        exit();
    } else {
        // Redirect back to the original page with an error message
        header("Location: edit_data_hamil_per_rt.php?message=error&error=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
