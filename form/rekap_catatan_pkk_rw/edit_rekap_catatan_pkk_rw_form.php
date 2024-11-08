
<?php
//JANGAN DI EDIT!!!

session_start(); // Memulai sesi di bagian atas

// Cek apakah ID diset di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Koneksi ke database
    include('../connect.php');

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM rekap_catatan_pkk_rw WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Simpan data dalam variabel sesi
        $_SESSION['kelurahan'] = $row['kelurahan'];
        $_SESSION['anggota_pkk_rw'] = $row['anggota_pkk_rw'];
        $_SESSION['anggota_pkk_rt'] = $row['anggota_pkk_rt'];
        $_SESSION['tahun'] = $row['tahun'];
        $_SESSION['bulan'] = $row['bulan'];
        $_SESSION['no_rw'] = $row['no_rw'];
        $_SESSION['jumlah_dasa_wisma'] = $row['jumlah_dasa_wisma'];
        $_SESSION['jumlah_rt'] = $row['jumlah_rt'];
        $_SESSION['jumlah_kk'] = $row['jumlah_kk'];
        $_SESSION['total_laki_laki'] = $row['total_laki_laki'];
        $_SESSION['total_perempuan'] = $row['total_perempuan'];
        $_SESSION['balita_laki_laki'] = $row['balita_laki_laki'];
        $_SESSION['balita_perempuan'] = $row['balita_perempuan'];
        $_SESSION['pasangan_usia_subur'] = $row['pasangan_usia_subur'];
        $_SESSION['wanita_usia_subur'] = $row['wanita_usia_subur'];
        $_SESSION['ibu_hamil'] = $row['ibu_hamil'];
        $_SESSION['ibu_menyusui'] = $row['ibu_menyusui'];
        $_SESSION['lansia'] = $row['lansia'];
        $_SESSION['tiga_buta'] = $row['tiga_buta'];
        $_SESSION['berkebutuhan_khusus'] = $row['berkebutuhan_khusus'];
        $_SESSION['sehat'] = $row['sehat'];
        $_SESSION['kurang_sehat'] = $row['kurang_sehat'];
        $_SESSION['memiliki_tempat_pembuangan_sampah'] = $row['memiliki_tempat_pembuangan_sampah'];
        $_SESSION['memiliki_spal'] = $row['memiliki_spal'];
        $_SESSION['memiliki_jamban_keluarga'] = $row['memiliki_jamban_keluarga'];
        $_SESSION['menempel_stiker_p4k'] = $row['menempel_stiker_p4k'];
        $_SESSION['pdam'] = $row['pdam'];
        $_SESSION['sumur'] = $row['sumur'];
        $_SESSION['dll'] = $row['dll'];
        $_SESSION['beras'] = $row['beras'];
        $_SESSION['non_beras'] = $row['non_beras'];
        $_SESSION['up2k'] = $row['up2k'];
        $_SESSION['pemanfaatan_tanah_perkarangan'] = $row['pemanfaatan_tanah_perkarangan'];
        $_SESSION['industri_rumah_tangga'] = $row['industri_rumah_tangga'];
        $_SESSION['kesehatan_lingkungan'] = $row['kesehatan_lingkungan'];
        $_SESSION['keterangan'] = $row['keterangan'];
        $_SESSION['edit_id'] = $id; // Simpan ID untuk digunakan nanti
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='edit_rekap_catatan_pkk_rw_form.php';</script>";
        exit();
    }
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        // Tambahkan nama field yang diperlukan
    ];
    
    $allFilled = true;
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $allFilled = false;
            break;
        }
    }

    if (!$allFilled) {
        echo "<script>alert('Silakan isi semua form yang diperlukan sebelum mengirim.');</script>";
    } else {
        // Ambil data dari form
        $kelurahan = $_POST['kelurahan'];
        $anggota_pkk_rw = $_POST['anggotaPKKRW'];
        $anggota_pkk_rt = $_POST['anggotaPKKRT'];
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];
        $no_rw = $_POST['noRW'];
        $jumlah_dasa_wisma = $_POST['jumlahDasaWisma'];
        $jumlah_rt = $_POST['jumlahRT'];
        $jumlah_kk = $_POST['jumlahKK'];
        $total_laki_laki = $_POST['totalLakiLaki'];
        $total_perempuan = $_POST['totalPerempuan'];
        $balita_laki_laki = $_POST['balitaLakiLaki'];
        $balita_perempuan = $_POST['balitaPerempuan'];
        $pasangan_usia_subur = $_POST['pasanganUsiaSubur'];
        $wanita_usia_subur = $_POST['wanitaUsiaSubur'];
        $ibu_hamil = $_POST['ibuHamil'];
        $ibu_menyusui = $_POST['ibuMenyusui'];
        $lansia = $_POST['lansia'];
        $tiga_buta = $_POST['tigaButa'];
        $berkebutuhan_khusus = $_POST['berkebutuhanKhusus'];
        $sehat = $_POST['sehat'];
        $kurang_sehat = $_POST['kurangSehat'];
        $memiliki_tempat_pembuangan_sampah = $_POST['tempatSampah'];
        $memiliki_spal = $_POST['spal'];
        $memiliki_jamban_keluarga = $_POST['jamban'];
        $menempel_stiker_p4k = $_POST['stikerP4K'];
        $pdam = $_POST['pdam'];
        $sumur = $_POST['sumur'];
        $dll = $_POST['dll'];
        $beras = $_POST['beras'];
        $non_beras = $_POST['nonBeras'];
        $up2k = $_POST['up2k'];
        $pemanfaatan_tanah_perkarangan = $_POST['pemanfaatanTanahPerkarangan'];
        $industri_rumah_tangga = $_POST['industriRumahTangga'];
        $kesehatan_lingkungan = $_POST['kesehatanLingkungan'];
        $keterangan = $_POST['keterangan'];

        // Koneksi ke database
        include('../connect.php');

        // Query untuk memperbarui data
        $sql = "UPDATE rekap_catatan_pkk_rw SET 
            kelurahan = '$kelurahan', 
            anggota_pkk_rw = '$anggota_pkk_rw', 
            anggota_pkk_rt = '$anggota_pkk_rt', 
            tahun = '$tahun', 
            bulan = '$bulan', 
            no_rw = '$no_rw', 
            jumlah_dasa_wisma = '$jumlah_dasa_wisma', 
            jumlah_rt = '$jumlah_rt', 
            jumlah_kk = '$jumlah_kk', 
            total_laki_laki = '$total_laki_laki', 
            total_perempuan = '$total_perempuan', 
            balita_laki_laki = '$balita_laki_laki', 
            balita_perempuan = '$balita_perempuan', 
            pasangan_usia_subur = '$pasangan_usia_subur', 
            wanita_usia_subur = '$wanita_usia_subur', 
            ibu_hamil = '$ibu_hamil', 
            ibu_menyusui = '$ibu_menyusui', 
            lansia = '$lansia', 
            tiga_buta = '$tiga_buta', 
            berkebutuhan_khusus = '$berkebutuhan_khusus', 
            sehat = '$sehat', 
            kurang_sehat = '$kurang_sehat', 
            memiliki_tempat_pembuangan_sampah = '$memiliki_tempat_pembuangan_sampah', 
            memiliki_spal = '$memiliki_spal', 
            memiliki_jamban_keluarga = '$memiliki_jamban_keluarga', 
            menempel_stiker_p4k = '$menempel_stiker_p4k', 
            pdam = '$pdam', 
            sumur = '$sumur', 
            dll = '$dll', 
            beras = '$beras', 
            non_beras = '$non_beras', 
            up2k = '$up2k', 
            pemanfaatan_tanah_perkarangan = '$pemanfaatan_tanah_perkarangan', 
            industri_rumah_tangga = '$industri_rumah_tangga', 
            kesehatan_lingkungan = '$kesehatan_lingkungan', 
            keterangan = '$keterangan' 
            WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            // Simpan pesan notifikasi ke session
            $_SESSION['success_message'] = "Data dengan ID $id berhasil diubah!";
            // Redirect setelah berhasil menyimpan data
            echo "<script>
                    alert('Data dengan ID $id berhasil diubah!'); 
                    window.location.href = 'view_rekap_catatan_pkk_rw.php';
                  </script>";
            exit();
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM : REKAP CATATAN PKK RW</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
    </style>
</head>
<body class="bg-light">
    
<header class="header">
    <div class="header-left">
        <h3>EDIT : REKAP CATATAN PKK RW</h3>
    </div>
    <div class="header-right">
        <a href="edit_rekap_catatan_pkk_rw.php" class="btn btn-light">Kembali</a>
    </div>
</header>
    
<div class="main-content mt-6">
    <div class="ctn-nav">
        <div class="navigation">
            <h4>Navigation</h4>
            <ul>
                <li><a href="#" class="nav-link" data-target="Informasi-umum">Informasi Umum</a></li>
                <li><a href="#" class="nav-link" data-target="Jumlah-Anggota-Keluarga">Jumlah Anggota Keluarga</a></li>
                <li><a href="#" class="nav-link" data-target="Jumlah-Rumah">Jumlah Rumah</a></li>
                <li><a href="#" class="nav-link" data-target="Jumlah-Sumber-Air">Jumlah Sumber Air</a></li>
                <li><a href="#" class="nav-link" data-target="Jumlah-Makanan-Pokok">Jumlah Makanan Pokok</a></li>  
                <li><a href="#" class="nav-link" data-target="Jumlah-Warga-Mengikuti-Kegiatan">Jumlah Warga Mengikuti Kegiatan</a></li>
                <li><a href="#" class="nav-link" data-target="Opsional">Opsional</a></li>  
            </ul>
        </div>
        <a href="edit_rekap_catatan_pkk_rw.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
    </div>

    <div class="master-form-container">
        <div class="form-title">
            <h2>EDIT : REKAP CATATAN PKK RW</h2>
            <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
        </div>

        <form method="POST" action="">
            <!-- Informasi Umum -->
            <div class="ctn-form form-section active" id="Informasi-umum">
                <h4 class="mt-4">Informasi Umum</h4><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="kelurahan" class="form-label bold mt-3">Kelurahan</label>
                        <select class="form-select" id="kelurahan" name="kelurahan">
                            <option value="" disabled selected>Kelurahan</option>
                            <option value="Gumuruh">Gumuruh</option>
                            <option value="Binong">Binong</option>
                            <option value="Cibangkong">Cibangkong</option>
                            <option value="Kebon Gedang">Kebon Gedang</option>
                            <option value="Kebonwaru">Kebonwaru</option>
                            <option value="Kacapiring">Kacapiring</option>
                            <option value="Maleer">Maleer</option>
                            <option value="Samoja">Samoja</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="anggotaPKKRW" class="form-label bold mt-3">Anggota PKK RW</label>
                        <input type="text" class="form-control" id="anggotaPKKRW" name="anggotaPKKRW" placeholder="Isi...">
                    </div>
                    <div class="col-md-12">
                        <label for="anggotaPKKRT" class="form-label bold mt-3">Anggota PKK RT</label>
                        <input type="text" class="form-control" id="anggotaPKKRT" name="anggotaPKKRT" placeholder="Isi...">
                    </div>
                    <div class="col-md-12">
                        <label for="tahun" class="form-label bold mt-3">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="col-md-12">
                        <label for="bulan" class="form-label bold mt-3">Bulan</label>
                        <select class="form-select" id="bulan" name="bulan">
                            <option value="" disabled selected>Pilih bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="noRW" class="form-label bold mt-3">No RW</label>
                        <input type="text" class="form-control" id="noRW" name="noRW" placeholder="Isi...">
                    </div>
                    <div class="col-md-12">
                        <label for="jumlahDasaWisma" class="form-label bold mt-3">Jumlah Dasa Wisma</label>
                        <input type="number" class="form-control" id="jumlahDasaWisma" name="jumlahDasaWisma" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="jumlahRT" class="form-label bold mt-3">Jumlah RT</label>
                        <input type="number" class="form-control" id="jumlahRT" name="jumlahRT" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="jumlahKK" class="form-label bold mt-3">Jumlah KK</label>
                        <input type="number" class="form-control" id="jumlahKK" name="jumlahKK" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Jumlah Anggota Keluarga -->
            <div class="ctn-form form-section" id="Jumlah-Anggota-Keluarga">
                <h4 class="mt-4">Jumlah Anggota Keluarga</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="totalLakiLaki" class="form-label bold mt-3">Total Laki-Laki</label>
                        <input type="number" class="form-control" id="totalLakiLaki" name="totalLakiLaki" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="totalPerempuan" class="form-label bold mt-3">Total Perempuan</label>
                        <input type="number" class="form-control" id="totalPerempuan" name="totalPerempuan" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="balitaLakiLaki" class="form-label bold mt-3">Balita Laki-Laki</label>
                        <input type="number" class="form-control" id="balitaLakiLaki" name="balitaLakiLaki" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="balitaPerempuan" class="form-label bold mt-3">Balita Perempuan</label>
                        <input type="number" class="form-control" id="balitaPerempuan" name="balitaPerempuan" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="pasanganUsiaSubur" class="form-label bold mt-3">Pasangan Usia Subur (PUS)</label>
                        <input type="number" class="form-control" id="pasanganUsiaSubur" name="pasanganUsiaSubur" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="wanitaUsiaSubur" class="form-label bold mt-3">Wanita Usia Subur (WUS)</label>
                        <input type="number" class="form-control" id="wanitaUsiaSubur" name="wanitaUsiaSubur" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="ibuHamil" class="form-label bold mt-3">Ibu Hamil</label>
                        <input type="number" class="form-control" id="ibuHamil" name="ibuHamil" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="ibuMenyusui" class="form-label bold mt-3">Ibu Menyusui</label>
                        <input type="number" class="form-control" id="ibuMenyusui" name="ibuMenyusui" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="lansia" class="form-label bold mt-3">Lansia</label>
                        <input type="number" class="form-control" id="lansia" name="lansia" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="tigaButa" class="form-label bold mt-3">3 Buta</label>
                        <input type="number" class="form-control" id="tigaButa" name="tigaButa" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="berkebutuhanKhusus" class="form-label bold mt-3">Berkebutuhan Khusus</label>
                        <input type="number" class="form-control" id="berkebutuhanKhusus" name="berkebutuhanKhusus" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Jumlah Rumah -->
            <div class="ctn-form form-section" id="Jumlah-Rumah">
                <h4 class="mt-4">Jumlah Rumah</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="sehat" class="form-label bold mt-3">Sehat</label>
                        <input type="number" class="form-control" id="sehat" name="sehat" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="kurangSehat" class="form-label bold mt-3">Kurang Sehat</label>
                        <input type="number" class="form-control" id="kurangSehat" name="kurangSehat" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="tempatSampah" class="form-label bold mt-3">Memiliki Tempat Pembuangan Sampah</label>
                        <input type="number" class="form-control" id="tempatSampah" name="tempatSampah" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="spal" class="form-label bold mt-3">Memiliki SPAL</label>
                        <input type="number" class="form-control" id="spal" name="spal" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="jamban" class="form-label bold mt-3">Memiliki Jamban Keluarga</label>
                        <input type="number" class="form-control" id="jamban" name="jamban" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="stikerP4K" class="form-label bold mt-3">Menempel Stiker P4K</label>
                        <input type="number" class="form-control" id="stikerP4K" name="stikerP4K" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Jumlah Sumber Air -->
            <div class="ctn-form form-section" id="Jumlah-Sumber-Air">
                <h4 class="mt-4">Jumlah Sumber Air</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="pdam" class="form-label bold mt-3">PDAM</label>
                        <input type="number" class="form-control" id="pdam" name="pdam" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="sumur" class="form-label bold mt-3">Sumur</label>
                        <input type="number" class="form-control" id="sumur" name="sumur" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="dll" class="form-label bold mt-3">DLL</label>
                        <input type="number" class="form-control" id="dll" name="dll" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Jumlah Makanan Pokok -->
            <div class="ctn-form form-section" id="Jumlah-Makanan-Pokok">
                <h4 class="mt-4">Jumlah Makanan Pokok</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="beras" class="form-label bold mt-3">Beras</label>
                        <input type="number" class="form-control" id="beras" name="beras" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="nonBeras" class="form-label bold mt-3">Non Beras</label>
                        <input type="number" class="form-control" id="nonBeras" name="nonBeras" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Jumlah Warga Mengikuti Kegiatan -->
            <div class="ctn-form form-section" id="Jumlah-Warga-Mengikuti-Kegiatan">
                <h4 class="mt-4">Jumlah Warga Mengikuti Kegiatan</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="up2k" class="form-label bold mt-3">UP2K</label>
                        <input type="number" class="form-control" id="up2k" name="up2k" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="pemanfaatanTanahPerkarangan" class="form-label bold mt-3">Pemanfaatan Tanah Perkarangan</label>
                        <input type="number" class="form-control" id="pemanfaatanTanahPerkarangan" name="pemanfaatanTanahPerkarangan" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="industriRumahTangga" class="form-label bold mt-3">Industri Rumah Tangga</label>
                        <input type="number" class="form-control" id="industriRumahTangga" name="industriRumahTangga" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="kesehatanLingkungan" class="form-label bold mt-3">Kesehatan Lingkungan</label>
                        <input type="number" class="form-control" id="kesehatanLingkungan" name="kesehatanLingkungan" placeholder="Isi dengan angka...">
                    </div>
                    <br>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
            </div>

            <!-- Opsional -->
            <div class="ctn-form form-section" id="Opsional">
                <h4 class="mt-4">Opsional</h4><br>
                <div class="row">
                    <p class="text-muted">*Isi jika dibutuhkan</p>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label bold mt-3">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<!-- FETCH DATA DARI VARIABEL GLOBAL -->
<script>
    // Function untuk mengatur nilai elemen select
    function setSelectValue(selectId, value) {
        const selectElement = document.getElementById(selectId);
        if (selectElement) {
            selectElement.value = value;
        }
    }

    // Mengatur nilai elemen select
    setSelectValue("kelurahan", "<?php echo $_SESSION['kelurahan'] ?? ''; ?>");
    setSelectValue("bulan", "<?php echo $_SESSION['bulan'] ?? ''; ?>");

    // Mengatur nilai elemen input
    document.getElementById("anggotaPKKRW").value = "<?php echo $_SESSION['anggota_pkk_rw'] ?? ''; ?>";
    document.getElementById("anggotaPKKRT").value = "<?php echo $_SESSION['anggota_pkk_rt'] ?? ''; ?>";
    document.getElementById("tahun").value = "<?php echo $_SESSION['tahun'] ?? ''; ?>";
    document.getElementById("noRW").value = "<?php echo $_SESSION['no_rw'] ?? ''; ?>";
    document.getElementById("jumlahDasaWisma").value = "<?php echo $_SESSION['jumlah_dasa_wisma'] ?? ''; ?>";
    document.getElementById("jumlahRT").value = "<?php echo $_SESSION['jumlah_rt'] ?? ''; ?>";
    document.getElementById("jumlahKK").value = "<?php echo $_SESSION['jumlah_kk'] ?? ''; ?>";
    document.getElementById("totalLakiLaki").value = "<?php echo $_SESSION['total_laki_laki'] ?? ''; ?>";
    document.getElementById("totalPerempuan").value = "<?php echo $_SESSION['total_perempuan'] ?? ''; ?>";
    document.getElementById("balitaLakiLaki").value = "<?php echo $_SESSION['balita_laki_laki'] ?? ''; ?>";
    document.getElementById("balitaPerempuan").value = "<?php echo $_SESSION['balita_perempuan'] ?? ''; ?>";
    document.getElementById("pasanganUsiaSubur").value = "<?php echo $_SESSION['pasangan_usia_subur'] ?? ''; ?>";
    document.getElementById("wanitaUsiaSubur").value = "<?php echo $_SESSION['wanita_usia_subur'] ?? ''; ?>";
    document.getElementById("ibuHamil").value = "<?php echo $_SESSION['ibu_hamil'] ?? ''; ?>";
    document.getElementById("ibuMenyusui").value = "<?php echo $_SESSION['ibu_menyusui'] ?? ''; ?>";
    document.getElementById("lansia").value = "<?php echo $_SESSION['lansia'] ?? ''; ?>";
    document.getElementById("tigaButa").value = "<?php echo $_SESSION['tiga_buta'] ?? ''; ?>";
    document.getElementById("berkebutuhanKhusus").value = "<?php echo $_SESSION['berkebutuhan_khusus'] ?? ''; ?>";
    document.getElementById("sehat").value = "<?php echo $_SESSION['sehat'] ?? ''; ?>";
    document.getElementById("kurangSehat").value = "<?php echo $_SESSION['kurang_sehat'] ?? ''; ?>";
    document.getElementById("tempatSampah").value = "<?php echo $_SESSION['memiliki_tempat_pembuangan_sampah'] ?? ''; ?>";
    document.getElementById("spal").value = "<?php echo $_SESSION['memiliki_spal'] ?? ''; ?>";
    document.getElementById("jamban").value = "<?php echo $_SESSION['memiliki_jamban_keluarga'] ?? ''; ?>";
    document.getElementById("stikerP4K").value = "<?php echo $_SESSION['menempel_stiker_p4k'] ?? ''; ?>";
    document.getElementById("pdam").value = "<?php echo $_SESSION['pdam'] ?? ''; ?>";
    document.getElementById("sumur").value = "<?php echo $_SESSION['sumur'] ?? ''; ?>";
    document.getElementById("dll").value = "<?php echo $_SESSION['dll'] ?? ''; ?>";
    document.getElementById("beras").value = "<?php echo $_SESSION['beras'] ?? ''; ?>";
    document.getElementById("nonBeras").value = "<?php echo $_SESSION['non_beras'] ?? ''; ?>";
    document.getElementById("up2k").value = "<?php echo $_SESSION['up2k'] ?? ''; ?>";
    document.getElementById("pemanfaatanTanahPerkarangan").value = "<?php echo $_SESSION['pemanfaatan_tanah_perkarangan'] ?? ''; ?>";
    document.getElementById("industriRumahTangga").value = "<?php echo $_SESSION['industri_rumah_tangga'] ?? ''; ?>";
    document.getElementById("kesehatanLingkungan").value = "<?php echo $_SESSION['kesehatan_lingkungan'] ?? ''; ?>";
    document.getElementById("keterangan").value = "<?php echo $_SESSION['keterangan'] ?? ''; ?>";
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.form-section');
        const navLinks = document.querySelectorAll('.nav-link');
        let currentSectionIndex = 0;

        function showSection(index) {
            sections.forEach((section, i) => {
                section.classList.toggle('active', i === index);
            });
        }

        navLinks.forEach((link, index) => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                currentSectionIndex = index;
                showSection(currentSectionIndex);
            });
        });

        document.querySelectorAll('.next').forEach(button => {
            button.addEventListener('click', function() {
                if (currentSectionIndex < sections.length - 1) {
                    currentSectionIndex++;
                    showSection(currentSectionIndex);
                }
            });
        });

        document.querySelectorAll('.back').forEach(button => {
            button.addEventListener('click', function() {
                if (currentSectionIndex > 0) {
                    currentSectionIndex--;
                    showSection(currentSectionIndex);
                }
            });
        });

        showSection(currentSectionIndex);
    });
</script>
</body>
</html>