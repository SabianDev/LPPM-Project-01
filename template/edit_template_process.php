<?php
session_start();
include 'connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil data dari form edit, isi variabelnya dari 'name' inputnya
    $id = $_POST['id'];
    $kelurahan = $_POST['kelurahan'];
    $kelompok_pkk_rw = $_POST['rw'];
    $tahun = $_POST['tahun'];
    $nama_kelompok_dasawisma = $_POST['kelompok'];
    $hamil = $_POST['hamil'];
    $melahirkan = $_POST['melahirkan'];
    $nifas = $_POST['nifas'];
    $meninggal = $_POST['ibuMeninggal'];
    $lahir_laki_laki = $_POST['lahirLaki'];
    $lahir_perempuan = $_POST['lahirPerempuan'];
    $memiliki_akte_kelahiran = $_POST['akteAda'];
    $tidak_memiliki_akte_kelahiran = $_POST['akteTidakAda'];
    $meninggal_laki_laki_bayi = $_POST['bayiMeninggalLaki'];
    $meninggal_perempuan_bayi = $_POST['bayiMeninggalPerempuan'];
    $meninggal_laki_laki_balita = $_POST['balitaMeninggalLaki'];
    $meninggal_perempuan_balita = $_POST['balitaMeninggalPerempuan'];
    $keterangan = $_POST['keterangan'];

    // Prepare the SQL update statement, ganti sama struktur kolomnya, id jangan diubah
    $sql = "UPDATE nama_database SET 
                kelurahan = ?, 
                kelompok_pkk_rw = ?, 
                tahun = ?, 
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
    //ganti bind_param nya dgn jumlah sesuai jumlah kolom pd DB, utk s/i nya adalah tipe data, s=string ; i=integer, urutannya sama kayak di query UPDATE diatas, dimana ID terakhir
    $stmt->bind_param("ssssiiiiiiiiiiiiss", 
        //ini juga sama, urutannya sesuai diatas
        $kelurahan, 
        $kelompok_pkk_rw, 
        $tahun, 
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
        // kembali lagi ke halaman edit_data_x.php (pesan sukses)
        header("Location: edit_data_x.php?message=success");
        exit();
    } else {
        // kembali lagi ke halaman edit_data_x.php (pesan error)
        header("Location: edit_data_x.php?message=error&error=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
