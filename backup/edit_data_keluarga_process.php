<?php
session_start();
include 'connect.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil data dari form edit, isi variabelnya dari 'name' inputnya
    $id = $_POST['id'];
    $kelurahan = $_POST['kelurahan'];
    $kelompok_pkk_rw = $_POST['rw'];
    $rt = $_POST['rt']; // Added to match the form
    $dasa_wisma = $_POST['dasadisma']; // Added to match the form
    $nama_kepala_rumah_tangga = $_POST['kepalarumahtangga']; // Added to match the form
    $no_reg = $_POST['noreg']; // Added to match the form
    $nama_anggota_keluarga = $_POST['anggotakeluarga']; // Added to match the form
    $status_dalam_keluarga = $_POST['statusdalamkeluarga']; // Added to match the form
    $status_dalam_perkawinan = $_POST['statusdalamperkawinan']; // Added to match the form
    $jenis_kelamin = $_POST['jeniskelamin']; // Added to match the form
    $tempat_lahir = $_POST['tempatlahir']; // Added to match the form
    $tanggal_lahir = $_POST['tanggalLahir']; // Added to match the form
    $umur = $_POST['umur']; // Added to match the form
    $pendidikan = $_POST['pendidikan']; // Added to match the form
    $pekerjaan = $_POST['pekerjaan']; // Added to match the form
    $kelompok_umur = $_POST['kelumur']; // Added to match the form
    $bumil = $_POST['bumil']; // Added to match the form
    $ibu_menyusui = $_POST['ibumenyusui']; // Added to match the form
    $pasangan_subur = $_POST['pasangansubur']; // Added to match the form
    $wanita_usia_subur = $_POST['wanitausiasubur']; // Added to match the form
    $apa_3buta = $_POST['buta']; // Added to match the form
    $makanan_pokok_sehari_hari = $_POST['makananPokok']; // Added to match the form
    $mempunyai_jaminan_keluarga = $_POST['jaminanKeluarga']; // Added to match the form
    $jumlah_jaminan_keluarga = $_POST['jumlahJaminan']; // Added to match the form
    $sumber_air_keluarga = $_POST['sumberAir']; // Added to match the form
    $tempat_pembuangan_sampah = $_POST['pembuanganSampah']; // Added to match the form
    $saluran_pembuangan_air_limbah = $_POST['pembuanganAirLimbah']; // Added to match the form
    $stiker_p4k = $_POST['stiker']; // Added to match the form
    $kriteria_rumah = $_POST['kriteriaRumah']; // Added to match the form
    $aktifitas_up2k = $_POST['up2k']; // Added to match the form
    $aktifitas_usaha_kesling = $_POST['usahaKesling']; // Added to match the form
    $keterangan = $_POST['keterangan']; // Unchanged

    // Prepare the SQL update statement, ganti sama struktur kolomnya, id jangan diubah
    $sql = "UPDATE data_keluarga SET 
    kelurahan = ?, 
    rw = ?, 
    rt = ?,  
    dasa_wisma = ?,  
    nama_kepala_rumah_tangga = ?,  
    no_reg = ?,  
    nama_anggota_keluarga = ?,  
    status_dalam_keluarga = ?,  
    status_dalam_perkawinan = ?,  
    jenis_kelamin = ?,  
    tempat_lahir = ?,  
    tanggal_lahir = ?,  
    umur = ?,  
    pendidikan_terakhir = ?,  
    pekerjaan = ?,  
    kelompok_umur = ?,  
    bumil = ?,  
    ibu_menyusui = ?,  
    pasangan_subur = ?,  
    wanita_usia_subur = ?,  
    apa_3buta = ?,  
    makanan_pokok_sehari_hari = ?,  
    mempunyai_jaminan_keluarga = ?,  
    jumlah_jaminan_keluarga = ?,  
    sumber_air_keluarga = ?,  
    tempat_pembuangan_sampah = ?,  
    saluran_pembuangan_air_limbah = ?,  
    stiker_p4k = ?,  
    kriteria_rumah = ?,  
    aktifitas_up2k = ?,  
    aktifitas_usaha_kesling = ? 
    WHERE id = ?";

    $stmt = $conn->prepare($sql);
    // Update bind_param to match the new number of parameters and their types
    $stmt->bind_param("sssssssssssssssssssssssssssssssss", 
        $kelurahan, 
        $rw, 
        $rt,  
        $dasa_wisma,  
        $nama_kepala_rumah_tangga,  
        $no_reg,  
        $nama_anggota_keluarga,  
        $status_dalam_keluarga,  
        $status_dalam_perkawinan,  
        $jenis_kelamin,  
        $tempat_lahir,  
        $tanggal_lahir,  
        $umur,  
        $pendidikan,  
        $pekerjaan,  
        $kelompok_umur,  
        $bumil,  
        $ibu_menyusui,  
        $pasangan_subur,  
        $wanita_usia_subur,  
        $apa_3buta,  
        $makanan_pokok_sehari_hari,  
        $mempunyai_jaminan_keluarga,  
        $jumlah_jaminan_keluarga,  
        $sumber_air_keluarga,  
        $tempat_pembuangan_sampah,  
        $saluran_pembuangan_air_limbah,  
        $stiker_p4k,  
        $kriteria_rumah,  
        $aktifitas_up2k,  
        $aktifitas_usaha_kesling,  
        $keterangan, 
        $id
    );
    if ($stmt->execute()) {
        // kembali lagi ke halaman edit_data_x.php (pesan sukses)
        header("Location: edit_data_keluarga.php?message=success");
        exit();
    } else {
        // kembali lagi ke halaman edit_data_x.php (pesan error)
        header("Location: edit_data_keluarga.php?message=error&error=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
