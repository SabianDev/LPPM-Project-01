<?php
    // Variabel untuk menyimpan judul form
    $formTitle1 = "Informasi Data";
    $formTitle2 = "Bagian Pilihan";
    $formTarget1 = "form-1";
    $formTarget2 = "form-2";
?>
<?php
session_start(); // Start session at the top
// Check if ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Connect to the database
    include 'connect.php';
    // Fetch the record based on the ID
    $sql = "SELECT * FROM data_keluarga WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Store data in session variables
        $_SESSION['kelurahan'] = $row['kelurahan'];
        $_SESSION['rw'] = $row['rw'];
        $_SESSION['rt'] = $row['rt'];
        $_SESSION['dasa_wisma'] = $row['dasa_wisma'];
        $_SESSION['nama_kepala_rumah_tangga'] = $row['nama_kepala_rumah_tangga'];
        $_SESSION['no_reg'] = $row['no_reg'];
        $_SESSION['nama_anggota_keluarga'] = $row['nama_anggota_keluarga'];
        $_SESSION['status_dalam_keluarga'] = $row['status_dalam_keluarga'];
        $_SESSION['status_dalam_perkawinan'] = $row['status_dalam_perkawinan'];
        $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
        $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
        $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
        $_SESSION['umur'] = $row['umur'];
        $_SESSION['pendidikan_terakhir'] = $row['pendidikan_terakhir'];
        $_SESSION['pekerjaan'] = $row['pekerjaan'];
        $_SESSION['kelompok_umur'] = $row['kelompok_umur'];
        $_SESSION['bumil'] = $row['bumil'];
        $_SESSION['ibu_menyusui'] = $row['ibu_menyusui'];
        $_SESSION['pasangan_subur'] = $row['pasangan_subur'];
        $_SESSION['wanita_usia_subur'] = $row['wanita_usia_subur'];
        $_SESSION['apa_3_buta'] = $row['apa_3buta'];
        $_SESSION['makanan_pokok_sehari_hari'] = $row['makanan_pokok_sehari_hari'];
        $_SESSION['mempunyai_jaminan_keluarga'] = $row['mempunyai_jaminan_keluarga'];
        $_SESSION['jumlah_jaminan_keluarga'] = $row['jumlah_jaminan_keluarga'];
        $_SESSION['sumber_air_keluarga'] = $row['sumber_air_keluarga'];
        $_SESSION['tempat_pembuangan_sampah'] = $row['tempat_pembuangan_sampah'];
        $_SESSION['saluran_pembuangan_air_limbah'] = $row['saluran_pembuangan_air_limbah'];
        $_SESSION['stiker_p4k'] = $row['stiker_p4k'];
        $_SESSION['kriteria_rumah'] = $row['kriteria_rumah'];
        $_SESSION['aktifitas_up2k'] = $row['aktifitas_up2k'];
        $_SESSION['aktifitas_usaha_kesling'] = $row['aktifitas_usaha_kesling'];
        $_SESSION['edit_id'] = $id; // Store the ID for later use
    } else {
        echo "<script>alert('Data not found'); window.location.href='edit_data_keluarga.php';</script>";
        exit();
    }
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kelurahan'
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
            $rw = $_POST['rw'];
            $rt = $_POST['rt'];
            $dasa_wisma = $_POST['dasawisma'];
            $nama_kepala_rumah_tangga = $_POST['kepalarumahtangga'];
            $no_reg = $_POST['noreg'];
            $nama_anggota_keluarga = $_POST['anggotakeluarga'];
            $status_dalam_keluarga = $_POST['statusdalamkeluarga'];
            $status_dalam_perkawinan = $_POST['statusdalamperkawinan'];
            $jenis_kelamin = $_POST['jeniskelamin'];
            $tempat_lahir = $_POST['tempatlahir'];
            $tanggal_lahir = $_POST['tanggalLahir'];
            $umur = $_POST['umur'];
            $pendidikan_terakhir = $_POST['pendidikan'];
            $pekerjaan = $_POST['pekerjaan'];
            $kelompok_umur = $_POST['kelumur'];
            $bumil = isset($_POST['bumil']) ? $_POST['bumil'] : 'Tidak'; // Capture value
            $ibu_menyusui = isset($_POST['ibumenyusui']) ? $_POST['ibumenyusui'] : 'Tidak'; // Capture value
            $pasangan_subur = isset($_POST['pasangansubur']) ? $_POST['pasangansubur'] : 'Tidak'; // Capture value
            $wanita_usia_subur = isset($_POST['wanitausiasubur']) ? $_POST['wanitausiasubur'] : 'Tidak'; // Capture value
            $apa_3_buta = isset($_POST['buta']) ? $_POST['buta'] : 'Tidak'; // Capture value
            $makanan_pokok_sehari_hari = $_POST['makananPokok'];
            $mempunyai_jaminan_keluarga = isset($_POST['jaminanKeluarga']) ? $_POST['jaminanKeluarga'] : 'Tidak'; // Capture value
            $jumlah_jaminan_keluarga = $_POST['jumlahJaminan'];
            $sumber_air_keluarga = $_POST['sumberAir'];
            $memiliki_tempat_pembuangan_sampah = isset($_POST['pembuanganSampah']) ? $_POST['pembuanganSampah'] : 'Tidak'; // Capture value
            $memiliki_saluran_pembuangan_air_limbah = isset($_POST['pembuanganAirLimbah']) ? $_POST['pembuanganAirLimbah'] : 'Tidak'; // Capture value
            $menempel_stiker_p4k = isset($_POST['stiker']) ? $_POST['stiker'] : 'Tidak'; // Capture value
            $kriteria_rumah = $_POST['kriteriaRumah'];
            $aktifitas_up2k = isset($_POST['up2k']) ? $_POST['up2k'] : 'Tidak'; // Capture value
            $aktifitas_usaha_kesling = isset($_POST['usahaKesling']) ? $_POST['usahaKesling'] : 'Tidak'; // Capture value

            // Koneksi ke database
            include 'connect.php';

            // Query untuk memperbarui data
            $sql = "UPDATE data_keluarga SET 
            kelurahan = '$kelurahan', 
            rw = '$rw', 
            rt = '$rt', 
            dasa_wisma = '$dasa_wisma', 
            nama_kepala_rumah_tangga = '$nama_kepala_rumah_tangga', 
            no_reg = '$no_reg', 
            nama_anggota_keluarga = '$nama_anggota_keluarga', 
            status_dalam_keluarga = '$status_dalam_keluarga', 
            status_dalam_perkawinan = '$status_dalam_perkawinan', 
            jenis_kelamin = '$jenis_kelamin', 
            tempat_lahir = '$tempat_lahir', 
            tanggal_lahir = '$tanggal_lahir', 
            umur = '$umur', 
            pendidikan_terakhir = '$pendidikan_terakhir', 
            pekerjaan = '$pekerjaan', 
            kelompok_umur = '$kelompok_umur', 
            bumil = '$bumil', 
            ibu_menyusui = '$ibu_menyusui', 
            pasangan_subur = '$pasangan_subur', 
            wanita_usia_subur = '$wanita_usia_subur', 
            apa_3buta = '$apa_3_buta', 
            makanan_pokok_sehari_hari = '$makanan_pokok_sehari_hari', 
            mempunyai_jaminan_keluarga = '$mempunyai_jaminan_keluarga', 
            jumlah_jaminan_keluarga = '$jumlah_jaminan_keluarga', 
            sumber_air_keluarga = '$sumber_air_keluarga', 
            tempat_pembuangan_sampah = '$memiliki_tempat_pembuangan_sampah', 
            saluran_pembuangan_air_limbah = '$memiliki_saluran_pembuangan_air_limbah', 
            stiker_p4k = '$menempel_stiker_p4k', 
            kriteria_rumah = '$kriteria_rumah', 
            aktifitas_up2k = '$aktifitas_up2k', 
            aktifitas_usaha_kesling = '$aktifitas_usaha_kesling' 
            WHERE id = '$id'"; // Add WHERE clause to specify which record to update
    
            if ($conn->query($sql) === TRUE) {
                // Simpan pesan notifikasi ke session
                $_SESSION['success_message'] = "Data dengan ID $id berhasil diubah!"; // Update success message
                // Redirect setelah berhasil menyimpan data
                echo "<script>
                        alert('Data dengan ID $id berhasil diubah!'); 
                        window.location.href = 'edit_data_keluarga.php';
                      </script>";
                exit();
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>"; // Menampilkan error jika ada
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
    <title>(ID : <?php echo $id; ?>) EDIT : DATA KELUARGA </title>
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
    
</head>

<body class="bg-light">
    
<header class="header">
        <div class="header-left">
            <h3>EDIT : DATA KELUARGA</h3>
        </div>
        <div class="header-right">
            <a href="edit_data_keluarga.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
        </div>
    </header>
    
    <div class="main-content mt-6">
        <div class="ctn-nav">
            <div class="navigation">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget1; ?>"><?php echo $formTitle1; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget2; ?>"><?php echo $formTitle2; ?></a></li> 
                </ul>
            </div>
            <a href="edit_data_keluarga.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>EDIT FORM : DATA KELUARGA</h2>
                <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
            </div>
            
            <form method="post" action="">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label bold mt-3"><strong>Kelurahan</strong></label>
                        <select class="form-select"" id="kelurahan" name="kelurahan">
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
                    <div class="mb-3">
                        <label for="rw" class="form-label bold mt-3"><strong>RW</strong></label>
                        <select class="form-select" id="rw" name="rw">
                            <option value="">Pilih</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label bold mt-3"><strong>RT</strong></label>
                        <select class="form-select" id="rt" name="rt">
                            <option value="">Pilih</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dasawisma" class="form-label bold mt-3"><strong>Dasa Wisma</strong></label>
                        <input type="text" class="form-control" id="dasawisma" name="dasawisma" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="kepalarumahtangga" class="form-label bold mt-3"><strong>Nama Kepala Rumah Tangga</strong></label>
                        <input type="text" class="form-control" id="kepalarumahtangga" name="kepalarumahtangga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="noreg" class="form-label bold mt-3"><strong>No. Reg (RW.RT.Dasa Wisma. No Rumah. No Urut KK. No Anggota Keluarga), Contoh: 01.03.003.05.01.03</strong></label>
                        <input type="text" class="form-control" id="noreg" name="noreg" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="anggotakeluarga" class="form-label bold mt-3"><strong>Nama Anggota Keluarga</strong></label>
                        <input type="text" class="form-control" id="anggotakeluarga" name="anggotakeluarga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Status Dalam Keluarga</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="kepalakeluarga" name="statusdalamkeluarga" value="Kepala Keluarga" onchange="handleStatusChange()">
                                <label for="kepalakeluarga">Kepala Keluarga</label>
                            </div>
                            <div>
                                <input type="radio" id="istri" name="statusdalamkeluarga" value="Istri" onchange="handleStatusChange()">
                                <label for="istri">Istri</label>
                            </div>
                            <div>
                                <input type="radio" id="anak" name="statusdalamkeluarga" value="Anak" onchange="handleStatusChange()">
                                <label for="anak">Anak</label>
                            </div>
                            <div>
                                <input type="radio" id="statusLainnya" name="statusdalamkeluarga" value="" onchange="handleStatusChange()">
                                <label for="statusLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="statusdalamkeluargaLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateStatusDalamKeluargaLainnya()" onclick="selectOtherRadio()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statusdalamperkawinan" class="form-label bold mt-3"><strong>Status Dalam Perkawinan</strong></label>
                        <select class="form-select" id="statusdalamperkawinan" name="statusdalamperkawinan">
                            <option value="">Pilih</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                            <option value="Merai Mati">Cerai Mati</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Jenis Kelamin</strong></label>
                        <div>
                            <input type="radio" id="lakilaki" name="jeniskelamin" value="Laki Laki">
                            <label for="lakilaki">Laki-Laki</label>
                            <input type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tempatlahir" class="form-label bold mt-3"><strong>Tempat Lahir</strong></label>
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label bold mt-3"><strong>Tanggal Lahir</strong></label>
                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label bold mt-3"><strong>Umur</strong></label>
                        <input type="text" class="form-control" id="umur" name="umur" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Pendidikan</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="sd" name="pendidikan" value="SD" onchange="handlePendidikanChange()">
                                <label for="sd">SD</label>
                            </div>
                            <div>
                                <input type="radio" id="smp" name="pendidikan" value="SMP" onchange="handlePendidikanChange()">
                                <label for="smp">SMP</label>
                            </div>
                            <div>
                                <input type="radio" id="sma" name="pendidikan" value="SMA" onchange="handlePendidikanChange()">
                                <label for="sma">SMA</label>
                            </div>
                            <div>
                                <input type="radio" id="s1" name="pendidikan" value="S1" onchange="handlePendidikanChange()">
                                <label for="s1">S1</label>
                            </div>
                            <div>
                                <input type="radio" id="s2" name="pendidikan" value="S2" onchange="handlePendidikanChange()">
                                <label for="s2">S2</label>
                            </div>
                            <div>
                                <input type="radio" id="s3" name="pendidikan" value="S3" onchange="handlePendidikanChange()">
                                <label for="s3">S3</label>
                            </div>
                            <div>
                                <input type="radio" id="pendidikanLainnya" name="pendidikan" value="" onchange="handlePendidikanChange()">
                                <label for="pendidikanLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="pendidikanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePendidikanLainnya()" onclick="selectPendidikanRadio()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Pekerjaan</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="asn" name="pekerjaan" value="ASN" onchange="handlePekerjaanChange()">
                                <label for="asn">ASN</label>
                            </div>
                            <div>
                                <input type="radio" id="tniPolri" name="pekerjaan" value="TNI/Polri" onchange="handlePekerjaanChange()">
                                <label for="tniPolri">TNI/Polri</label>
                            </div>
                            <div>
                                <input type="radio" id="pegawaiSwasta" name="pekerjaan" value="Pegawai Swasta" onchange="handlePekerjaanChange()">
                                <label for="pegawaiSwasta">Pegawai Swasta</label>
                            </div>
                            <div>
                                <input type="radio" id="wiraswasta" name="pekerjaan" value="Wiraswasta" onchange="handlePekerjaanChange()">
                                <label for="wiraswasta">Wiraswasta</label>
                            </div>
                            <div>
                                <input type="radio" id="mengurusRumahTangga" name="pekerjaan" value="Mengurus Rumah Tangga" onchange="handlePekerjaanChange()">
                                <label for="mengurusRumahTangga">Mengurus Rumah Tangga</label>
                            </div>
                            <div>
                                <input type="radio" id="pelajar" name="pekerjaan" value="Pelajar" onchange="handlePekerjaanChange()">
                                <label for="pelajar">Pelajar</label>
                            </div>
                            <div>
                                <input type="radio" id="mahasiswa" name="pekerjaan" value="Mahasiswa" onchange="handlePekerjaanChange()">
                                <label for="mahasiswa">Mahasiswa</label>
                            </div>
                            <div>
                                <input type="radio" id="pekerjaanLainnya" name="pekerjaan" value="" onchange="handlePekerjaanChange()">
                                <label for="pekerjaanLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="pekerjaanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePekerjaanLainnya()" onclick="selectPekerjaanRadio()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Kelompok Umur</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="bayi" name="kelumur" value="Bayi">
                                <label for="bayi">Bayi (0-2 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="balita" name="kelumur" value="Balita">
                                <label for="balita">Balita (3-5 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="kanakkanak" name="kelumur" value="Kanak Kanak">
                                <label for="kanakkanak">Kanak-Kanak (6-10 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="remaja" name="kelumur" value="Remaja">
                                <label for="remaja">Remaja (11-24 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="dewasa" name="kelumur" value="Dewasa">
                                <label for="dewasa">Dewasa (25-59 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="lansia" name="kelumur" value="Lansia">
                                <label for="lansia">Lansia (>59 tahun)</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Bumil (Orang)</strong></label>
                        <div>
                            <input type="radio" id="bumilYa" name="bumil" value="Ya">
                            <label for="bumilYa">Ya</label>
                            <input type="radio" id="bumilTidak" name="bumil" value="Tidak">
                            <label for="bumilTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Ibu Menyusui (Orang)</strong></label>
                        <div>
                            <input type="radio" id="ibumenyusuiYa" name="ibumenyusui" value="Ya">
                            <label for="ibumenyusuiYa">Ya</label>
                            <input type="radio" id="ibumenyusuiTidak" name="ibumenyusui" value="Tidak">
                            <label for="ibumenyusuiTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apakah Pasangan Subur (PUS)</strong></label>
                        <div>
                            <input type="radio" id="pasangansuburYa" name="pasangansubur" value="Ya">
                            <label for="pasangansuburYa">Ya</label>
                            <input type="radio" id="pasangansuburTidak" name="pasangansubur" value="Tidak">
                            <label for="pasangansuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apakah Termasuk Wanita Usia Subur (WUS)</strong></label>
                        <div>
                            <input type="radio" id="wanitausiasuburYa" name="wanitausiasubur" value="Ya">
                            <label for="wanitausiasuburYa">Ya</label>
                            <input type="radio" id="wanitausiasuburTidak" name="wanitausiasubur" value="Tidak">
                            <label for="wanitausiasuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apa 3Buta</strong></label>
                        <div>
                            <input type="radio" id="butaYa" name="buta" value="Ya">
                            <label for="butaYa">Ya</label>
                            <input type="radio" id="butaTidak" name="buta" value="Tidak">
                            <label for="butaTidak">Tidak</label>
                        </div>
                    </div>
                        <br>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 2 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>3. Makanan Pokok Sehari-hari</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="beras" name="makananPokok" value="Beras" onchange="handleMakananChange()">
                                <label for="beras">Beras</label>
                            </div>
                            <div>
                                <input type="radio" id="nonberas" name="makananPokok" value="NonBeras" onchange="handleMakananChange()">
                                <label for="nonberas">Non Beras</label>
                            </div>
                            <div>
                                <input type="radio" id="makananLainnya" name="makananPokok" value="" onchange="handleMakananChange()">
                                <label for="makananLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="makananpokokLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateMakananLainnya()" onclick="selectMakananRadio()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>4. Mempunyai Jaminan Keluarga</strong></label>
                        <div>
                            <input type="radio" id="jaminanYa" name="jaminanKeluarga" value="Ya">
                            <label for="jaminanYa">Ya</label>
                            <input type="radio" id="jaminanTidak" name="jaminanKeluarga" value="Tidak">
                            <label for="jaminanTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Jika ya, jumlah jaminan keluarga </strong>*(Isi 0 jika tidak ada)</label>
                        <div class="d-flex flex-column">
                            <label for="jumlahSatu">
                                <input type="radio" id="jumlahSatu" name="jumlahJaminan" value="1" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                1
                            </label>
                            <label for="jumlahDua">
                                <input type="radio" id="jumlahDua" name="jumlahJaminan" value="2" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                2
                            </label>
                            <label for="jumlahTiga">
                                <input type="radio" id="jumlahTiga" name="jumlahJaminan" value="3" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                3
                            </label>
                            <label for="jumlahEmpat">
                                <input type="radio" id="jumlahEmpat" name="jumlahJaminan" value="4" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                4
                            </label>
                            <label for="jumlahLima">
                                <input type="radio" id="jumlahLima" name="jumlahJaminan" value="5" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                5
                            </label>
                            <label for="jumlahEnam">
                                <input type="radio" id="jumlahEnam" name="jumlahJaminan" value="6" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                6
                            </label>
                            <label for="jumlahTujuh">
                                <input type="radio" id="jumlahTujuh" name="jumlahJaminan" value="7" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                7
                            </label>
                            <label for="jumlahDelapan">
                                <input type="radio" id="jumlahDelapan" name="jumlahJaminan" value="8" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                8
                            </label>
                            <label for="jumlahSembilan">
                                <input type="radio" id="jumlahSembilan" name="jumlahJaminan" value="9" style="margin-right: 5px;" onchange="handleJumlahJaminanChange()">
                                9
                            </label>
                            <label for="jumlahLainnya">
                                <input type="radio" id="jumlahLainnya" name="jumlahJaminan" value="" onchange="handleJumlahJaminanChange()">
                                Lainnya
                            </label>
                            <input type="number" class="form-control" id="jumlahLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateJumlahLainnya()" onclick="selectJumlahRadio()">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>5. Sumber Air Keluarga</strong></label>
                        <div class="d-flex flex-column"> <!-- Tambahkan kelas ini -->
                            <div>
                                <input type="radio" id="pdam" name="sumberAir" value="PDAM" onchange="handleSumberAirChange()">
                                <label for="pdam">PDAM</label>
                            </div>
                            <div>
                                <input type="radio" id="sumur" name="sumberAir" value="Sumur" onchange="handleSumberAirChange()">
                                <label for="sumur">Sumur</label>
                            </div>
                            <div>
                                <input type="radio" id="sungai" name="sumberAir" value="Sungai" onchange="handleSumberAirChange()">
                                <label for="sungai">Sungai</label>
                            </div>
                            <div>
                                <input type="radio" id="sumberAirLainnya" name="sumberAir" value="" onchange="handleSumberAirChange()">
                                <label for="sumberAirLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateSumberAirLainnya()" onclick="selectSumberAirRadio()">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>6. Memiliki Tempat Pembuangan Sampah</strong></strong></label>
                        <div>
                            <input type="radio" id="pembuanganSampahYa" name="pembuanganSampah" value="Ya">
                            <label for="pembuanganSampahYa">Ya</label>
                            <input type="radio" id="pembuanganSampahTidak" name="pembuanganSampah" value="Tidak">
                            <label for="pembuanganSampahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>7. Memiliki Saluran Pembuangan Air Limbah (SPAL)</strong></label>
                        <div>
                            <input type="radio" id="pembuanganAirLimbahYa" name="pembuanganAirLimbah" value="Ya">
                            <label for="pembuanganAirLimbahYa">Ya</label>
                            <input type="radio" id="pembuanganAirLimbahTidak" name="pembuanganAirLimbah" value="Tidak">
                            <label for="pembuanganAirLimbahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>8. Menempel Stiker P4K</strong></label>
                        <div>
                            <input type="radio" id="stikerYa" name="stiker" value="Ya">
                            <label for="stikerYa">Ya</label>
                            <input type="radio" id="stikerTidak" name="stiker" value="Tidak">
                            <label for="stikerTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>9. Kriteria Rumah</strong></label>
                        <div>
                            <input type="radio" id="kriteriaSehat" name="kriteriaRumah" value="Sehat">
                            <label for="kriteriaSehat">Sehat</label>
                            <input type="radio" id="kriteriatidakSehat" name="kriteriaRumah" value="Tidak Sehat">
                            <label for="kriteriatidakSehat">Tidak Sehat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>10. Aktifitas UP2K</strong></label>
                        <div>
                            <input type="radio" id="up2k_ya" name="up2k" value="Ya" onchange="handleUp2KChange()">
                            <label for="up2k_ya">Ya</label>
                        </div>
                        <div>
                            <input type="radio" id="up2k_tidak" name="up2k" value="Tidak" onchange="handleUp2KChange()">
                            <label for="up2k_tidak">Tidak</label>
                        </div>
                        <div>
                            <input type="radio" id="up2k_lainnya" name="up2k" value="" onchange="handleUp2KChange()">
                            <label for="up2k_lainnya">Lainnya:</label>
                            <input type="text" class="form-control" id="up2k_lainnyaText" placeholder="Sebutkan Lainnya" oninput="updateUp2kLainnya()" onclick="selectUp2kRadio()">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>11. Aktifitas Usaha KesLing</strong></label>
                        <div>
                            <input type="radio" id="keslingYa" name="usahaKesling" value="Ya">
                            <label for="keslingYa">Ya</label>
                            <input type="radio" id="keslingTidak" name="usahaKesling" value="Tidak">
                            <label for="keslingTidak">Tidak</label>
                        </div>
                    </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
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
                        <b>PERHATIAN!</b><br>
                        <i>Anda sedang berada di halaman edit. Halaman ini berfungsi untuk mengubah data dari halaman EDIT : DATA KELUARGA. Untuk menambahkan data, silahkan kembali ke halaman utama. </i>
                        <br><hr>
                        Form ini untuk membantu Program Kerja Kelompok Kerja 1 untuk menyusun data dasar dengan:<br>
                        <ul>
                            <li>Pendataan jumlah Keluarga Pra Keluarga Sejahtera (KS)</li>
                            <li>Pendataan Pemukiman tidak layak huni</li>
                            <li>Pendataan pemanfaatan pekarangan</li>
                            <li>Pendataan jumlah penduduk usia 15 s.d.60 tahun yang buta huruf.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- FETCH DATA DARI VARIABEL GLOBAL -->
    <script>
        // Function buat radio dengan pilihan "lainnya"
        function setRadioOrInput(name, value, inputId) {
            const radios = document.querySelectorAll(`input[name="${name}"]`);
            let found = false;
            
            // ini kalau pilihannya sesuai opsi radio
            radios.forEach(radio => {
                if (radio.value === value) {
                    radio.checked = true;
                    found = true;
                }
            });

            // ini kalau pilihannya adalah 'lainnya'
            if (!found) {
                document.getElementById(inputId).value = value;
            }
        }

        // Untuk Radio Khusus yang mengandung "Lainnya"
        setRadioOrInput("statusdalamkeluarga", "<?php echo $_SESSION['status_dalam_keluarga'] ?? ''; ?>", "statusdalamkeluargaLainnyaText");
        setRadioOrInput("pendidikan", "<?php echo $_SESSION['pendidikan_terakhir'] ?? ''; ?>", "pendidikanLainnyaText");
        setRadioOrInput("pekerjaan", "<?php echo $_SESSION['pekerjaan'] ?? ''; ?>", "pekerjaanLainnyaText");
        setRadioOrInput("makananPokok", "<?php echo $_SESSION['makanan_pokok_sehari_hari'] ?? ''; ?>", "makananpokokLainnyaText");
        setRadioOrInput("jumlahJaminan", "<?php echo $_SESSION['jumlah_jaminan_keluarga'] ?? ''; ?>", "jumlahLainnyaText");
        setRadioOrInput("sumberAir", "<?php echo $_SESSION['sumber_air_keluarga'] ?? ''; ?>", "sumberAirLainnyaText");
        setRadioOrInput("up2k", "<?php echo $_SESSION['aktifitas_up2k'] ?? ''; ?>", "up2k_lainnyaText");

        // Untuk input sisanya (Non Radio)
        document.getElementById("kelurahan").value = "<?php echo $_SESSION['kelurahan'] ?? ''; ?>";
        document.getElementById("statusdalamperkawinan").value = "<?php echo $_SESSION['status_dalam_perkawinan'] ?? ''; ?>";
        document.getElementById("umur").value = "<?php echo $_SESSION['umur'] ?? ''; ?>";
        document.getElementById("rw").value = "<?php echo $_SESSION['rw'] ?? ''; ?>";
        document.getElementById("rt").value = "<?php echo $_SESSION['rt'] ?? ''; ?>";
        document.getElementById("dasawisma").value = "<?php echo $_SESSION['dasa_wisma'] ?? ''; ?>";
        document.getElementById("kepalarumahtangga").value = "<?php echo $_SESSION['nama_kepala_rumah_tangga'] ?? ''; ?>";
        document.getElementById("noreg").value = "<?php echo $_SESSION['no_reg'] ?? ''; ?>";
        document.getElementById("anggotakeluarga").value = "<?php echo $_SESSION['nama_anggota_keluarga'] ?? ''; ?>";
        document.getElementById("tempatlahir").value = "<?php echo $_SESSION['tempat_lahir'] ?? ''; ?>";
        document.getElementById("tanggalLahir").value = "<?php echo $_SESSION['tanggal_lahir'] ?? ''; ?>";
        
        // Untuk Input tipe Radio (Non "Lainnya)
        const jeniskelamin = document.getElementsByName("jeniskelamin");
        const jeniskelaminValue = "<?php echo $_SESSION['jenis_kelamin'] ?? ''; ?>";
        jeniskelamin.forEach(radio => {
            if (radio.value === jeniskelaminValue) {
                radio.checked = true;
            }
        });

        const kelumur = document.getElementsByName("kelumur");
        const kelumurValue = "<?php echo $_SESSION['kelompok_umur'] ?? ''; ?>";
        kelumur.forEach(radio => {
            if (radio.value === kelumurValue) {
                radio.checked = true;
            }
        });

        const bumil = document.getElementsByName("bumil");
        const bumilValue = "<?php echo $_SESSION['bumil'] ?? ''; ?>";
        bumil.forEach(radio => {
            if (radio.value === bumilValue) {
                radio.checked = true;
            }
        });

        const ibumenyusui = document.getElementsByName("ibumenyusui");
        const ibumenyusuiValue = "<?php echo $_SESSION['ibu_menyusui'] ?? ''; ?>";
        ibumenyusui.forEach(radio => {
            if (radio.value === ibumenyusuiValue) {
                radio.checked = true;
            }
        });

        const pasangansubur = document.getElementsByName("pasangansubur");
        const pasangansuburValue = "<?php echo $_SESSION['pasangan_subur'] ?? ''; ?>";
        pasangansubur.forEach(radio => {
            if (radio.value === pasangansuburValue) {
                radio.checked = true;
            }
        });

        const wanitausiasubur = document.getElementsByName("wanitausiasubur");
        const wanitausiasuburValue = "<?php echo $_SESSION['wanita_usia_subur'] ?? ''; ?>";
        wanitausiasubur.forEach(radio => {
            if (radio.value === wanitausiasuburValue) {
                radio.checked = true;
            }
        });

        const buta = document.getElementsByName("buta");
        const butaValue = "<?php echo $_SESSION['apa_3_buta'] ?? ''; ?>";
        buta.forEach(radio => {
            if (radio.value === butaValue) {
                radio.checked = true;
            }
        });

        const jaminanKeluarga = document.getElementsByName("jaminanKeluarga");
        const jaminanKeluargaValue = "<?php echo $_SESSION['mempunyai_jaminan_keluarga'] ?? ''; ?>";
        jaminanKeluarga.forEach(radio => {
            if (radio.value === jaminanKeluargaValue) {
                radio.checked = true;
            }
        });

        const pembuanganSampah = document.getElementsByName("pembuanganSampah");
        const pembuanganSampahValue = "<?php echo $_SESSION['tempat_pembuangan_sampah'] ?? ''; ?>";
        pembuanganSampah.forEach(radio => {
            if (radio.value === pembuanganSampahValue) {
                radio.checked = true;
            }
        });

        const pembuanganAirLimbah = document.getElementsByName("pembuanganAirLimbah");
        const pembuanganAirLimbahValue = "<?php echo $_SESSION['saluran_pembuangan_air_limbah'] ?? ''; ?>";
        pembuanganAirLimbah.forEach(radio => {
            if (radio.value === pembuanganAirLimbahValue) {
                radio.checked = true;
            }
        });

        const stiker = document.getElementsByName("stiker");
        const stikerValue = "<?php echo $_SESSION['stiker_p4k'] ?? ''; ?>";
        stiker.forEach(radio => {
            if (radio.value === stikerValue) {
                radio.checked = true;
            }
        });

        const kriteriaRumah = document.getElementsByName("kriteriaRumah");
        const kriteriaRumahValue = "<?php echo $_SESSION['kriteria_rumah'] ?? ''; ?>";
        kriteriaRumah.forEach(radio => {
            if (radio.value === kriteriaRumahValue) {
                radio.checked = true;
            }
        });

        const usahaKesling = document.getElementsByName("usahaKesling");
        const usahaKeslingValue = "<?php echo $_SESSION['aktifitas_usaha_kesling'] ?? ''; ?>";
        usahaKesling.forEach(radio => {
            if (radio.value === usahaKeslingValue) {
                radio.checked = true;
            }
        });
        
        
    </script>

    
    <script>
    // Override value input radio dengan yang ada di input text pada saat page pertama kali load
    document.addEventListener('DOMContentLoaded', function() {
            updateStatusDalamKeluargaLainnya(); // Call the function to set the radio value
            updatePendidikanLainnya();
            updatePekerjaanLainnya();
            updateMakananLainnya();
            updateJumlahLainnya();
            updateSumberAirLainnya();
            updateUp2kLainnya();
        });
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

        //Hati-hati ini mau diedit biar dipanggil di awal
        function updateStatusDalamKeluargaLainnya() {
            const textInput = document.getElementById('statusdalamkeluargaLainnyaText');
            const radioInput = document.getElementById('statusLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updatePendidikanLainnya() {
            const textInput = document.getElementById('pendidikanLainnyaText');
            const radioInput = document.getElementById('pendidikanLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updatePekerjaanLainnya() {
            const textInput = document.getElementById('pekerjaanLainnyaText');
            const radioInput = document.getElementById('pekerjaanLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateMakananLainnya() {
            const textInput = document.getElementById('makananpokokLainnyaText');
            const radioInput = document.getElementById('makananLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateJumlahLainnya() {
            const textInput = document.getElementById('jumlahLainnyaText');
            const radioInput = document.getElementById('jumlahLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateSumberAirLainnya() {
            const textInput = document.getElementById('sumberAirLainnyaText');
            const radioInput = document.getElementById('sumberAirLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateUp2kLainnya() {
            const textInput = document.getElementById('up2k_lainnyaText');
            const radioInput = document.getElementById('up2k_lainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function handleStatusChange() {
            const otherInput = document.getElementById('statusdalamkeluargaLainnyaText');
            const otherRadio = document.getElementById('statusLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }

        function selectOtherRadio() {
            const otherRadio = document.getElementById('statusLainnya');
            otherRadio.checked = true; // Pilih radio "Lainnya"
            handleStatusChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handlePendidikanChange() {
            const pendidikanInput = document.getElementById('pendidikanLainnyaText');
            const pendidikanRadio = document.getElementById('pendidikanLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (pendidikanRadio.checked) {
                pendidikanInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                pendidikanInput.value = '';
            }
        }

        function selectPendidikanRadio() {
            const pendidikanRadio = document.getElementById('pendidikanLainnya');
            pendidikanRadio.checked = true; // Pilih radio "Lainnya"
            handlePendidikanChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handleMakananChange() {
            const makananInput = document.getElementById('makananpokokLainnyaText');
            const makananRadio = document.getElementById('makananLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (makananRadio.checked) {
                makananInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                makananInput.value = '';
            }
        }

        function selectMakananRadio() {
            const makananRadio = document.getElementById('makananLainnya');
            makananRadio.checked = true; // Pilih radio "Lainnya"
            handleMakananChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handlePekerjaanChange() {
            const pekerjaanInput = document.getElementById('pekerjaanLainnyaText');
            const pekerjaanRadio = document.getElementById('pekerjaanLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (pekerjaanRadio.checked) {
                pekerjaanInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                pekerjaanInput.value = '';
            }
        }

        function selectPekerjaanRadio() {
            const pekerjaanRadio = document.getElementById('pekerjaanLainnya');
            pekerjaanRadio.checked = true; // Pilih radio "Lainnya"
            handlePekerjaanChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handleJumlahJaminanChange() {
            const jumlahInput = document.getElementById('jumlahLainnyaText');
            const jumlahRadio = document.getElementById('jumlahLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (jumlahRadio.checked) {
                jumlahInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                jumlahInput.value = '';
            }
        }

        function selectJumlahRadio() {
            const jumlahRadio = document.getElementById('jumlahLainnya');
            jumlahRadio.checked = true; // Pilih radio "Lainnya"
            handleJumlahJaminanChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handleSumberAirChange() {
            const sumberAirInput = document.getElementById('sumberAirLainnyaText');
            const sumberAirRadio = document.getElementById('sumberAirLainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (sumberAirRadio.checked) {
                sumberAirInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                sumberAirInput.value = '';
            }
        }

        function selectSumberAirRadio() {
            const sumberAirRadio = document.getElementById('sumberAirLainnya');
            sumberAirRadio.checked = true; // Pilih radio "Lainnya"
            handleSumberAirChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        function handleUp2KChange() {
            const up2kInput = document.getElementById('up2k_lainnyaText');
            const up2kRadio = document.getElementById('up2k_lainnya');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (up2kRadio.checked) {
                up2kInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                up2kInput.value = '';
            }
        }

        function selectUp2kRadio() {
            const up2kRadio = document.getElementById('up2k_lainnya');
            up2kRadio.checked = true; // Pilih radio "Lainnya"
            handleUp2KChange(); // Panggil fungsi untuk mengatur fokus dan mengosongkan input jika perlu
        }

        // otomatis pilih radio "Lainnya" kalau data adalah custom,
        const statusKeluargaValue= "<?php echo $_SESSION['status_dalam_keluarga'] ?? ''; ?>";
        const statusKeluargaOptions= ["Kepala Keluarga", "Istri", "Anak"]; // Daftar pilihan yang ada

        if (!statusKeluargaOptions.includes(statusKeluargaValue) && statusKeluargaValue) {
            document.getElementById('statusLainnya').checked = true; // Centang radio "Lainnya"
            const statusInput = document.getElementById('statusdalamkeluargaLainnyaText');
            statusInput.value = statusKeluargaValue; // Isi input dengan data dari record
            statusInput.oninput = function() {
                document.getElementById('statusLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        const pendidikanValue = "<?php echo $_SESSION['pendidikan_terakhir'] ?? ''; ?>"; // Pastikan ini sesuai dengan session yang benar
        const pendidikanOptions = ["SD", "SMP", "SMA", "S1", "S2", "S3"]; // Daftar pilihan yang ada

        if (!pendidikanOptions.includes(pendidikanValue) && pendidikanValue) {
            document.getElementById('pendidikanLainnya').checked = true; // Centang radio "Lainnya"
            const pendidikanInput = document.getElementById('pendidikanLainnyaText');
            pendidikanInput.value = pendidikanValue; // Isi input dengan data dari record
            pendidikanInput.oninput = function() {
                document.getElementById('pendidikanLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        const makananPokokValue = "<?php echo $_SESSION['makanan_pokok'] ?? ''; ?>"; // Pastikan ini sesuai dengan session yang benar
        const makananPokokOptions = ["Nasi", "Roti", "Mie", "Kentang"]; // Daftar pilihan yang ada

        if (!makananPokokOptions.includes(makananPokokValue) && makananPokokValue) {
            document.getElementById('makananPokokLainnya').checked = true; // Centang radio "Lainnya"
            const makananPokokInput = document.getElementById('makananPokokLainnyaText');
            makananPokokInput.value = makananPokokValue; // Isi input dengan data dari record
            makananPokokInput.oninput = function() {
                document.getElementById('makananPokokLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        const jaminanKeluargaValue = "<?php echo $_SESSION['jaminan_keluarga'] ?? ''; ?>"; // Pastikan ini sesuai dengan session yang benar
        const jaminanKeluargaOptions = ["1", "2", "3", "4", "5", "6", "7", "8", "9"]; // Daftar pilihan yang ada

        if (!jaminanKeluargaOptions.includes(jaminanKeluargaValue) && jaminanKeluargaValue) {
            document.getElementById('jaminanKeluargaLainnya').checked = true; // Centang radio "Lainnya"
            const jaminanKeluargaInput = document.getElementById('jaminanKeluargaLainnyaText');
            jaminanKeluargaInput.value = jaminanKeluargaValue; // Isi input dengan data dari record
            jaminanKeluargaInput.oninput = function() {
                document.getElementById('jaminanKeluargaLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        const sumberAirValue = "<?php echo $_SESSION['sumber_air'] ?? ''; ?>"; // Pastikan ini sesuai dengan session yang benar
        const sumberAirOptions = ["PDAM", "Sumur", "Mata Air", "Air Hujan"]; // Daftar pilihan yang ada

        if (!sumberAirOptions.includes(sumberAirValue) && sumberAirValue) {
            document.getElementById('sumberAirLainnya').checked = true; // Centang radio "Lainnya"
            const sumberAirInput = document.getElementById('sumberAirLainnyaText');
            sumberAirInput.value = sumberAirValue; // Isi input dengan data dari record
            sumberAirInput.oninput = function() {
                document.getElementById('sumberAirLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        const aktivitasUP2KValue = "<?php echo $_SESSION['aktivitas_up2k'] ?? ''; ?>"; // Pastikan ini sesuai dengan session yang benar
        const aktivitasUP2KOptions = ["Pertanian", "Perikanan", "Peternakan", "Usaha Kecil"]; // Daftar pilihan yang ada

        if (!aktivitasUP2KOptions.includes(aktivitasUP2KValue) && aktivitasUP2KValue) {
            document.getElementById('aktivitasUP2KLainnya').checked = true; // Centang radio "Lainnya"
            const aktivitasUP2KInput = document.getElementById('aktivitasUP2KLainnyaText');
            aktivitasUP2KInput.value = aktivitasUP2KValue; // Isi input dengan data dari record
            aktivitasUP2KInput.oninput = function() {
                document.getElementById('aktivitasUP2KLainnya').value = this.value; // Set value radio "Lainnya" sesuai input
            };
        }

        
    </script>

   
</body>
</html>
