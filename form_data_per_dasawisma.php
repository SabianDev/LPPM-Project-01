<?php
session_start(); // Memulai session

include 'connect.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kelurahan', 'pkk_rw', 'pkk_rt', 'pkk_dasa_wisma', 'nama_kk', 
        'no_reg', 'jumlah_kk', 'total_laki_laki', 'total_perempuan', 
        'balita_laki_laki', 'balita_perempuan', 'pasangan_usia_subur', 
        'wanita_usia_subur', 'ibu_hamil', 'ibu_menyusui', 
        'lansia', 'tiga_buta', 'berkebutuhan_khusus', 
        'sehat_layak_huni', 'tempat_sampah', 'spal', 
        'jamban', 'sumber_air', 'makanan_pokok', 
        'kegiatan_up2k', 'pemanfaatan_tanah', 'industri_rumah', 
        'kerja_bakti', 'keterangan'
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
        $nama_kepala_keluarga = $_POST['nama_kk'];
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
        $sehat_dan_layak_huni = $_POST['sehat_layak_huni'];
        $memiliki_tempat_pembuangan_sampah = $_POST['tempat_sampah'];
        $memiliki_spal = $_POST['spal'];
        $memiliki_jamban = $_POST['jamban'];
        $sumber_air_keluarga = isset($_POST['sumber_air']) ? implode(',', $_POST['sumber_air']) : '';
        $makanan_pokok = $_POST['makanan_pokok'];
        $kegiatan_up2k = $_POST['kegiatan_up2k'];
        $pemanfaatan_tanah = $_POST['pemanfaatan_tanah'];
        $industri_rumah = $_POST['industri_rumah'];
        $kerja_bakti = $_POST['kerja_bakti'];
        $keterangan = $_POST['keterangan'];

        // Query untuk memasukkan data ke dalam tabel
        $query = "INSERT INTO data_per_dasawisma (
            kelurahan, kelompok_pkk_rw, kelompok_pkk_rt, kelompok_pkk_dasa_wisma, tahun, no_reg, 
            nama_kepala_keluarga, jumlah_kk, total_laki_laki, total_perempuan, balita_laki_laki, 
            balita_perempuan, pasangan_usia_subur, wanita_usia_subur, ibu_hamil, ibu_menyusui, 
            lansia, tiga_buta, berkebutuhan_khusus, sehat_dan_layak_huni, 
            memiliki_tempat_pembuangan_sampah, memiliki_spal, memiliki_jamban, 
            sumber_air_keluarga, makanan_pokok, kegiatan_up2k, pemanfaatan_tanah, 
            industri_rumah, kerja_bakti, keterangan
        ) VALUES (
            '$kelurahan', '$kelompok_pkk_rw', '$kelompok_pkk_rt', '$kelompok_pkk_dasa_wisma', '$tahun', '$no_reg', 
            '$nama_kepala_keluarga', '$jumlah_kk', '$total_laki_laki', '$total_perempuan', '$balita_laki_laki', 
            '$balita_perempuan', '$pasangan_usia_subur', '$wanita_usia_subur', '$ibu_hamil', '$ibu_menyusui', 
            '$lansia', '$tiga_buta', '$berkebutuhan_khusus', '$sehat_dan_layak_huni', 
            '$memiliki_tempat_pembuangan_sampah', '$memiliki_spal', '$memiliki_jamban', 
            '$sumber_air_keluarga', '$makanan_pokok', '$kegiatan_up2k', '$pemanfaatan_tanah', 
            '$industri_rumah', '$kerja_bakti', '$keterangan'
        )";

        // Eksekusi query
        if ($conn->query($query) === TRUE) {
            $_SESSION['success'] = "Data berhasil disimpan!"; // Set session untuk notifikasi
            header("Location: form_data_per_dasawisma.php"); // Redirect ke halaman yang sama
            exit(); // Hentikan script
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}

// Menampilkan notifikasi jika ada
if (isset($_SESSION['success'])) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
          </script>";
    unset($_SESSION['success']); // Hapus session setelah ditampilkan
}

// Menampilkan notifikasi jika ada
if (isset($_SESSION['success'])) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
          </script>";
    unset($_SESSION['success']); // Hapus session setelah ditampilkan
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM : DATA PER DASAWISMA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
    </style>
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
</head>
<body class="bg-light">
    
    <header class="header">
        <div class="header-left">
            <h1>SIPEDAS BERANI</h1>
        </div>
        <div class="header-right">
            <span>Login sebagai: User</span>
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
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>CATATAN KELUARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h2>
            </div>
            
            <form method="POST" action="form_data_per_dasawisma.php">
                
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
                                <option>Kebon gedang</option>
                                <option>Kebon waru</option>
                                <option>Kecaping</option>
                                <option>Meleer</option>
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
                            </select>                    </div>
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
                            <label for="nama_kk" class="form-label bold">Nama Kepala Keluarga (KK)</label>
                            <input type="text" class="form-control" id="nama_kk" name="nama_kk" placeholder="Isi...">
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
                                    <input class="form-check-input" type="radio" name="sehat_layak_huni" id="sehat_layak_huni_ya" value="ya">
                                    <label class="form-check-label" for="sehat_layak_huni_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sehat_layak_huni" id="sehat_layak_huni_tidak" value="tidak">
                                    <label class="form-check-label" for="sehat_layak_huni_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki tempat pembuangan sampah</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah_ya" value="ya">
                                    <label class="form-check-label" for="tempat_sampah_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah_tidak" value="tidak">
                                    <label class="form-check-label" for="tempat_sampah_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki SPAL</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="spal" id="spal_ya" value="ya">
                                    <label class="form-check-label" for="spal_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="spal" id="spal_tidak" value="tidak">
                                    <label class="form-check-label" for="spal_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label bold">Memiliki jamban</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jamban" id="jamban_ya" value="ya">
                                    <label class="form-check-label" for="jamban_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jamban" id="jamban_tidak" value="tidak">
                                    <label class="form-check-label" for="jamban_tidak">Tidak</label>
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
    

    <script src="js/bootstrap.bundle.min.js"></script>
    
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

        function updateSumberAirLainnyaCheckbox() {
            const textInput = document.getElementById('sumber_air_lainnya_text');
            const checkboxInput = document.getElementById('sumber_air_lainnya');
            checkboxInput.value = textInput.value; // Set the checkbox's value to the text input's value
        }
    </script>

    <!-- Modal Notifikasi -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Data berhasil disimpan!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='view_data_per_dasawisma.php';">Tutup</button>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
