<?php
session_start(); // Memulai session

include '../connect.php'; // Menghubungkan ke database

// Cek apakah ID diset di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../connect.php';

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM data_per_dasawisma WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Simpan data ke dalam variabel session
        $_SESSION['kelurahan'] = $row['kelurahan'];
        $_SESSION['pkk_rw'] = $row['kelompok_pkk_rw'];
        $_SESSION['pkk_rt'] = $row['kelompok_pkk_rt'];
        $_SESSION['pkk_dasa_wisma'] = $row['kelompok_pkk_dasa_wisma'];
        $_SESSION['tahun'] = $row['tahun'];
        $_SESSION['no_reg'] = $row['no_reg'];
        $_SESSION['nama_kepala_keluarga'] = $row['nama_kepala_keluarga'];
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
        $_SESSION['sehat_dan_layak_huni'] = $row['sehat_dan_layak_huni'];
        $_SESSION['memiliki_tempat_pembuangan_sampah'] = $row['memiliki_tempat_pembuangan_sampah'];
        $_SESSION['memiliki_spal'] = $row['memiliki_spal'];
        $_SESSION['memiliki_jamban'] = $row['memiliki_jamban'];
        $_SESSION['sumber_air_keluarga'] = $row['sumber_air_keluarga'];
        $_SESSION['makanan_pokok'] = $row['makanan_pokok'];
        $_SESSION['kegiatan_up2k'] = $row['kegiatan_up2k'];
        $_SESSION['pemanfaatan_tanah'] = $row['pemanfaatan_tanah'];
        $_SESSION['industri_rumah'] = $row['industri_rumah'];
        $_SESSION['kerja_bakti'] = $row['kerja_bakti'];
        $_SESSION['keterangan'] = $row['keterangan'];
        $_SESSION['edit_id'] = $id; // Simpan ID untuk digunakan nanti
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='edit_data_per_dasawisma.php';</script>";
        exit();
    }
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kelurahan', 
        'pkk_rw', 'pkk_rt', 'pkk_dasa_wisma' 
        // 'no_reg', 'jumlah_kk', 'total_laki_laki', 'total_perempuan', 
        // 'balita_laki_laki', 'balita_perempuan', 'pasangan_usia_subur', 
        // 'wanita_usia_subur', 'ibu_hamil', 'ibu_menyusui', 
        // 'lansia', 'tiga_buta', 'berkebutuhan_khusus', 
        // 'sehat_layak_huni', 'tempat_sampah', 'spal', 
        // 'jamban', 'makanan_pokok', 
        // 'kegiatan_up2k', 'pemanfaatan_tanah', 'industri_rumah', 
        // 'kerja_bakti'
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
        $kelompok_pkk_rw = $_POST['pkk_rw'];
        $kelompok_pkk_rt = $_POST['pkk_rt'];
        $kelompok_pkk_dasa_wisma = $_POST['pkk_dasa_wisma'];
        $tahun = $_POST['tahun'];
        $no_reg = $_POST['no_reg'];
        $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
        $jumlah_kk = $_POST['jumlah_kk'];
        $total_laki_laki = $_POST['total_laki_laki'];
        $total_perempuan = $_POST['total_perempuan'];
        $balita_laki_laki = $_POST['balita_laki_laki'];
        $balita_perempuan = $_POST['balita_perempuan'];
        $pasangan_usia_subur = $_POST['pasangan_usia_subur'];
        $wanita_usia_subur = $_POST['wanita_usia_subur'];
        $ibu_hamil = $_POST['ibu_hamil'];
        $ibu_menyusui = $_POST['ibu_menyusui'];
        $lansia = $_POST['lansia'];
        $tiga_buta = $_POST['tiga_buta'];
        $berkebutuhan_khusus = $_POST['berkebutuhan_khusus'];
        $sehat_dan_layak_huni = $_POST['sehat_dan_layak_huni'];
        $memiliki_tempat_pembuangan_sampah = $_POST['memiliki_tempat_pembuangan_sampah'];
        $memiliki_spal = $_POST['memiliki_spal'];
        $memiliki_jamban = $_POST['memiliki_jamban'];
        $sumber_air_keluarga = isset($_POST['sumber_air']) ? implode(',', $_POST['sumber_air']) : '';
        $makanan_pokok = $_POST['makanan_pokok'];
        $kegiatan_up2k = $_POST['kegiatan_up2k'];
        $pemanfaatan_tanah = $_POST['pemanfaatan_tanah'];
        $industri_rumah = $_POST['industri_rumah'];
        $kerja_bakti = $_POST['kerja_bakti'];
        $keterangan = $_POST['keterangan'];

        // Koneksi ke database
        include('../connect.php');

        // Ensure the ID is correctly set
        $id = $_SESSION['edit_id'];

        // Query untuk memperbarui data
        $sql = "UPDATE data_per_dasawisma SET 
            kelurahan = '$kelurahan', 
            kelompok_pkk_rw = '$kelompok_pkk_rw', 
            kelompok_pkk_rt = '$kelompok_pkk_rt', 
            kelompok_pkk_dasa_wisma = '$kelompok_pkk_dasa_wisma', 
            tahun = '$tahun', 
            no_reg = '$no_reg', 
            nama_kepala_keluarga = '$nama_kepala_keluarga', 
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
            sehat_dan_layak_huni = '$sehat_dan_layak_huni', 
            memiliki_tempat_pembuangan_sampah = '$memiliki_tempat_pembuangan_sampah', 
            memiliki_spal = '$memiliki_spal', 
            memiliki_jamban = '$memiliki_jamban', 
            sumber_air_keluarga = '$sumber_air_keluarga', 
            makanan_pokok = '$makanan_pokok', 
            kegiatan_up2k = '$kegiatan_up2k', 
            pemanfaatan_tanah = '$pemanfaatan_tanah', 
            industri_rumah = '$industri_rumah', 
            kerja_bakti = '$kerja_bakti', 
            keterangan = '$keterangan' 
        WHERE id = '$id'"; // Ensure the ID is used here

        if ($conn->query($sql) === TRUE) {
            // Simpan pesan notifikasi ke session
            $_SESSION['success_message'] = "Data dengan ID $id berhasil diubah!"; // Update success message
            // Redirect setelah berhasil menyimpan data
            echo "<script>
                    alert('Data dengan ID $id berhasil diubah!'); 
                    window.location.href = 'edit_data_per_dasawisma.php';
                  </script>";
            exit();
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
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
    <title>(ID : <?php echo $id; ?>) EDIT : DATA PER DASAWISMA</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <?php
        // Variabel untuk menyimpan judul form
        $formTitle1 = "Informasi Umum";
        $formTitle2 = "Tabel";
        $formTitle3 = "Jumlah Anggota Keluarga";
        $formTitle4 = "Kriteria Rumah";
        $formTitle5 = "Warga Mengikuti Kegiatan";
        $formTitle6 = "Keterangan";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
        $formTarget4 = "form-4";
        $formTarget5 = "form-5";
        $formTarget6 = "form-6";
    ?>
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
    <h1>SIPEDAS BERANI</h1>
        </div>
        <div class="header-right">
            <!-- Login sebagai : User -->
        </div>
    </header>
    
    <div class="main-content mt-6">
        <div class="ctn-nav">
            <div class="navigation">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget1; ?>"><?php echo $formTitle1; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget2; ?>"><?php echo $formTitle2; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget3; ?>"><?php echo $formTitle3; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget4; ?>"><?php echo $formTitle4; ?></a></li>  

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget5; ?>"><?php echo $formTitle5; ?></a></li>  

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget6; ?>"><?php echo $formTitle6; ?></a></li>  
                </ul>
            </div>
            <a href="edit_data_per_dasawisma.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>EDIT : DATA PER DASAWISMA</h2>
                <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
            </div>
            
            <form method="POST" action="">
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label bold">Kelurahan</label>
                            <select class="form-select" id="kelurahan" name="kelurahan">
                                <option selected disabled>Pilih Kelurahan</option>
                                <option>Gumuruh</option>
                                <option>Binong</option>
                                <option>Cibangkong</option>
                                <option>Kebon Gedang</option>
                                <option>Kebon Waru</option>
                                <option>Kacapiring</option>
                                <option>Maleer</option>
                                <option>Samoja</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pkk_rw" class="form-label bold">Kelompok PKK RW</label>
                            <select class="form-select" id="pkk_rw" name="pkk_rw">
                                <option selected disabled>Pilih RW</option>
                                <?php for($i=1; $i<=15; $i++): ?>
                                    <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                                <?php endfor; ?>
                            </select>                    
                        </div>
                        <div class="mb-3">
                            <label for="pkk_rt" class="form-label bold">Kelompok PKK RT</label>
                            <select class="form-select" id="pkk_rt" name="pkk_rt">
                                <option selected disabled>Pilih RT</option>
                                <?php for($i=1; $i<=15; $i++): ?>
                                    <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pkk_dasa_wisma" class="form-label bold">Kelompok PKK Dasa Wisma</label>
                            <input type="text" class="form-control" id="pkk_dasa_wisma" name="pkk_dasa_wisma" placeholder="Isi...">
                        </div>
                        <div class="mb-3">
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Isi...">
                        </div>
                        <br>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 2 -->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
                <div class="row"> 
                    <div class="mb-3">
                        <label for="no_reg" class="form-label bold">No. Reg (RW.RT.Dasa Wisma. No Rumah. No Urut KK. No Anggota Keluarga)</label>
                        <input type="text" class="form-control" id="no_reg" name="no_reg" placeholder="Contoh: 01.03.003.05.01.03">
                    </div>
                    <div class="mb-3">
                        <label for="nama_kepala_keluarga" class="form-label bold">Nama Kepala Keluarga (KK)</label>
                        <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_kk" class="form-label bold">Jumlah KK</label>
                        <input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Isi...">
                    </div>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
                </div>

                <!-- FORM 3 -->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
                <div class="row">
                    <div class="mb-3">
                        <label for="total_laki_laki" class="form-label bold">Total Laki-laki</label>
                        <input type="text" class="form-control" id="total_laki_laki" name="total_laki_laki" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="total_perempuan" class="form-label bold">Total Perempuan</label>
                        <input type="text" class="form-control" id="total_perempuan" name="total_perempuan" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="balita_laki_laki" class="form-label bold">Balita Laki-laki</label>
                        <input type="text" class="form-control" id="balita_laki_laki" name="balita_laki_laki" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="balita_perempuan" class="form-label bold">Balita Perempuan</label>
                        <input type="text" class="form-control" id="balita_perempuan" name="balita_perempuan" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="pasangan_usia_subur" class="form-label bold">Pasangan Usia Subur (PUS)</label>
                        <input type="text" class="form-control" id="pasangan_usia_subur" name="pasangan_usia_subur" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="wanita_usia_subur" class="form-label bold">Wanita Usia Subur (WUS)</label>
                        <input type="text" class="form-control" id="wanita_usia_subur" name="wanita_usia_subur" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="ibu_hamil" class="form-label bold">Ibu Hamil</label>
                        <input type="text" class="form-control" id="ibu_hamil" name="ibu_hamil" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="ibu_menyusui" class="form-label bold">Ibu Menyusui</label>
                        <input type="text" class="form-control" id="ibu_menyusui" name="ibu_menyusui" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="lansia" class="form-label bold">Lansia</label>
                        <input type="text" class="form-control" id="lansia" name="lansia" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="tiga_buta" class="form-label bold">3Buta</label>
                        <input type="text" class="form-control" id="tiga_buta" name="tiga_buta" placeholder="Isi...">
                    </div>
                    <div class="mb-3">
                        <label for="berkebutuhan_khusus" class="form-label bold">Berkebutuhan Khusus</label>
                        <input type="text" class="form-control" id="berkebutuhan_khusus" name="berkebutuhan_khusus" placeholder="Isi...">
                    </div>
                    <div class="ctn-form-button">
                        <button type="button" class="btn btn-secondary back">Kembali</button>
                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>
                </div>

                <!-- FORM 4 -->
                <div class="ctn-form form-section" id="<?php echo $formTarget4; ?>">
                    <h4 class="mt-4"><?php echo $formTitle4; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label bold">Sehat dan layak huni</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sehat_dan_layak_huni" id="sehat_dan_layak_huni" value="ya">
                                    <label class="form-check-label" for="sehat_dan_layak_huni">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sehat_dan_layak_huni" id="sehat_dan_layak_huni" value="tidak">
                                    <label class="form-check-label" for="sehat_dan_layak_huni">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki tempat pembuangan sampah</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_tempat_pembuangan_sampah" id="memiliki_tempat_pembuangan_sampah" value="ya">
                                    <label class="form-check-label" for="memiliki_tempat_pembuangan_sampah">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_tempat_pembuangan_sampah" id="memiliki_tempat_pembuangan_sampah" value="tidak">
                                    <label class="form-check-label" for="memiliki_tempat_pembuangan_sampah">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki SPAL</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_spal" id="memiliki_spal" value="ya">
                                    <label class="form-check-label" for="memiliki_spal">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_spal" id="memiliki_spal" value="tidak">
                                    <label class="form-check-label" for="memiliki_spal">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki jamban</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_jamban" id="memiliki_jamban" value="ya">
                                    <label class="form-check-label" for="memiliki_jamban">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="memiliki_jamban" id="memiliki_jamban" value="tidak">
                                    <label class="form-check-label" for="memiliki_jamban">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Sumber air keluarga</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sumber_air_sumur" name="sumber_air[]" value="Sumur">
                                    <label class="form-check-label" for="sumber_air_sumur">Sumur</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sumber_air_pdam" name="sumber_air[]" value="PDAM">
                                    <label class="form-check-label" for="sumber_air_pdam">PDAM</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sumber_air_lainnya" name="sumber_air[]" value="">
                                    <label class="form-check-label" for="sumber_air_lainnya">Lainnya</label>
                                    <input type="text" class="form-control mt-2" id="sumber_air_lainnya_text" placeholder="Sebutkan" oninput="updateSumberAirLainnyaCheckbox()">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Makanan Pokok</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok_beras" value="Beras">
                                    <label class="form-check-label" for="makanan_pokok_beras">Beras</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok_non_beras" value="Non-Beras">
                                    <label class="form-check-label" for="makanan_pokok_non_beras">Non-Beras</label>
                                </div>
                                <div class="ctn-form-button">
                                    <button type="button" class="btn btn-secondary back">Kembali</button>
                                    <button type="button" class="btn btn-secondary next">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FORM 5 -->
                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label bold">Kegiatan UP2K</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kegiatan_up2k" id="kegiatan_up2k_ya" value="ya">
                                    <label class="form-check-label" for="kegiatan_up2k_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kegiatan_up2k" id="kegiatan_up2k_tidak" value="tidak">
                                    <label class="form-check-label" for="kegiatan_up2k_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Pemanfaatan Tanah Pekarangan</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pemanfaatan_tanah" id="pemanfaatan_tanah_ya" value="ya">
                                    <label class="form-check-label" for="pemanfaatan_tanah_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pemanfaatan_tanah" id="pemanfaatan_tanah_tidak" value="tidak">
                                    <label class="form-check-label" for="pemanfaatan_tanah_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Industri Rumah Tangga</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="industri_rumah" id="industri_rumah_ya" value="ya">
                                    <label class="form-check-label" for="industri_rumah_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="industri_rumah" id="industri_rumah_tidak" value="tidak">
                                    <label class="form-check-label" for="industri_rumah_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Kerja Bakti</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kerja_bakti" id="kerja_bakti_ya" value="ya">
                                    <label class="form-check-label" for="kerja_bakti_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kerja_bakti" id="kerja_bakti_tidak" value="tidak">
                                    <label class="form-check-label" for="kerja_bakti_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>                

                <!-- FORM 6 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget6; ?>">
                    <h4 class="mt-4"><?php echo $formTitle6; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label bold">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Isi sesuai keperluan..."></textarea>
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
    

    <!-- tagINFOPANEL -->
    <div class="info-panel">
        <div class="accordion" id="infoAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingInfo">
                    <button class="info-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">
                        NOTICE
                    </button>
                </h2>
                <div id="collapseInfo" class="accordion-collapse collapse show" aria-labelledby="headingInfo" data-bs-parent="#infoAccordion">
                    <div class="info-accordion-body">
                        <!-- Tambahkan informasi atau notice di sini -->
                        Form ini untuk pendataan warga binaan PKK yang diisi oleh masing-masing anggota keluarga
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Script untuk tombol back/next -->
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

            // Validasi sebelum mengirim form
            document.querySelector('form').addEventListener('submit', function(e) {
                // Cek apakah semua input yang diperlukan sudah diisi
                const requiredInputs = this.querySelectorAll('input[required], select[required]');
                let allFilled = true;

                requiredInputs.forEach(input => {
                    if (!input.value) {
                        allFilled = false;
                    }
                });

                if (!allFilled) {
                    e.preventDefault(); // Mencegah pengiriman form
                    alert('Silakan isi semua form yang diperlukan sebelum mengirim.');
                }
            });

            showSection(currentSectionIndex);
        });

    </script>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk mengatur radio atau input dengan pilihan "lainnya"
        function setRadioOrInput(name, value, inputId) {
            const radios = document.querySelectorAll(`input[name="${name}"]`);
            let found = false;
            
            // Cek jika nilai sesuai dengan opsi radio
            radios.forEach(radio => {
                if (radio.value === value) {
                    radio.checked = true;
                    found = true;
                }
            });

            // Jika nilai adalah 'lainnya'
            if (!found && inputId) {
                document.getElementById(inputId).value = value;
            }
        }

        // Mengisi data dari session ke form
        document.getElementById("kelurahan").value = "<?php echo $_SESSION['kelurahan'] ?? ''; ?>";
        document.getElementById("pkk_rw").value = "<?php echo $_SESSION['pkk_rw'] ?? ''; ?>";
        document.getElementById("pkk_rt").value = "<?php echo $_SESSION['pkk_rt'] ?? ''; ?>";
        document.getElementById("pkk_dasa_wisma").value = "<?php echo $_SESSION['pkk_dasa_wisma'] ?? ''; ?>";
        document.getElementById("tahun").value = "<?php echo $_SESSION['tahun'] ?? ''; ?>";
        document.getElementById("no_reg").value = "<?php echo $_SESSION['no_reg'] ?? ''; ?>";
        document.getElementById("nama_kepala_keluarga").value = "<?php echo $_SESSION['nama_kepala_keluarga'] ?? ''; ?>";
        document.getElementById("jumlah_kk").value = "<?php echo $_SESSION['jumlah_kk'] ?? ''; ?>";
        document.getElementById("total_laki_laki").value = "<?php echo $_SESSION['total_laki_laki'] ?? ''; ?>";
        document.getElementById("total_perempuan").value = "<?php echo $_SESSION['total_perempuan'] ?? ''; ?>";
        document.getElementById("balita_laki_laki").value = "<?php echo $_SESSION['balita_laki_laki'] ?? ''; ?>";
        document.getElementById("balita_perempuan").value = "<?php echo $_SESSION['balita_perempuan'] ?? ''; ?>";
        document.getElementById("pasangan_usia_subur").value = "<?php echo $_SESSION['pasangan_usia_subur'] ?? ''; ?>";
        document.getElementById("wanita_usia_subur").value = "<?php echo $_SESSION['wanita_usia_subur'] ?? ''; ?>";
        document.getElementById("ibu_hamil").value = "<?php echo $_SESSION['ibu_hamil'] ?? ''; ?>";
        document.getElementById("ibu_menyusui").value = "<?php echo $_SESSION['ibu_menyusui'] ?? ''; ?>";
        document.getElementById("lansia").value = "<?php echo $_SESSION['lansia'] ?? ''; ?>";
        document.getElementById("tiga_buta").value = "<?php echo $_SESSION['tiga_buta'] ?? ''; ?>";
        document.getElementById("berkebutuhan_khusus").value = "<?php echo $_SESSION['berkebutuhan_khusus'] ?? ''; ?>";
        setRadioOrInput("sehat_dan_layak_huni", "<?php echo $_SESSION['sehat_dan_layak_huni'] ?? ''; ?>", null);
        setRadioOrInput("memiliki_tempat_pembuangan_sampah", "<?php echo $_SESSION['memiliki_tempat_pembuangan_sampah'] ?? ''; ?>", null);
        setRadioOrInput("memiliki_spal", "<?php echo $_SESSION['memiliki_spal'] ?? ''; ?>", null);
        setRadioOrInput("memiliki_jamban", "<?php echo $_SESSION['memiliki_jamban'] ?? ''; ?>", null);
        setRadioOrInput("makanan_pokok", "<?php echo $_SESSION['makanan_pokok'] ?? ''; ?>", null);
        setRadioOrInput("kegiatan_up2k", "<?php echo $_SESSION['kegiatan_up2k'] ?? ''; ?>", null);
        setRadioOrInput("pemanfaatan_tanah", "<?php echo $_SESSION['pemanfaatan_tanah'] ?? ''; ?>", null);
        setRadioOrInput("industri_rumah", "<?php echo $_SESSION['industri_rumah'] ?? ''; ?>", null);
        setRadioOrInput("kerja_bakti", "<?php echo $_SESSION['kerja_bakti'] ?? ''; ?>", null);
        document.getElementById("keterangan").value = "<?php echo $_SESSION['keterangan'] ?? ''; ?>";

        // Handle sumber_air_keluarga
        const sumberAirKeluarga = "<?php echo $_SESSION['sumber_air_keluarga'] ?? ''; ?>";
        const sumberAirArray = sumberAirKeluarga.split(',');

        sumberAirArray.forEach(value => {
            if (value === 'Sumur') {
                document.getElementById('sumber_air_sumur').checked = true;
            } else if (value === 'PDAM') {
                document.getElementById('sumber_air_pdam').checked = true;
            } else if (value) {
                document.getElementById('sumber_air_lainnya').checked = true;
                document.getElementById('sumber_air_lainnya_text').value = value;
            }
        });

        function updateSumberAirLainnyaCheckbox() {
            const textInput = document.getElementById('sumber_air_lainnya_text');
            const checkboxInput = document.getElementById('sumber_air_lainnya');
            checkboxInput.value = textInput.value; // Set the checkbox's value to the text input's value
        }
    </script>

    <script>
        function updateSumberAirLainnyaCheckbox() {
            const textInput = document.getElementById('sumber_air_lainnya_text');
            const checkboxInput = document.getElementById('sumber_air_lainnya');
            checkboxInput.value = textInput.value; // Set the checkbox's value to the text input's value
        }
    </script>

    
</body>
</html>
