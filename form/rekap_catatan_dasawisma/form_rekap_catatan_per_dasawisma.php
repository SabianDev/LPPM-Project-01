<?php
session_start(); // Memulai session
include '../connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kelompok', 'tahun', 'namaAnggota', 'statusPerkawinan', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'umur', 'pendidikan', 'pekerjaan', 'berkebutuhanKhusus', 'pancasila', 'gotongRoyong', 'pendidikan_keterampilan', 'koperasi', 'pangan', 'sandang', 'kesehatan', 'perencanaanSehat', 'kriteriaRumah', 'jambanKeluarga', 'tempatSampah'
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
        $kelompokDasaWisma = $_POST['kelompok'];
        $tahun = $_POST['tahun'];
        $namaAnggotaKeluarga = $_POST['namaAnggota'];
        $statusPerkawinan = $_POST['statusPerkawinan'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $umur = $_POST['umur'];
        $agama = $_POST['agama'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = $_POST['pekerjaan'];
        $berkebutuhanKhusus = $_POST['berkebutuhanKhusus'];
        $penghayatanPengamalanPancasila = $_POST['pancasila'];
        $gotongRoyong = $_POST['gotongRoyong'];
        $pendidikanKeterampilan = $_POST['pendidikan_keterampilan'];
        $pengembanganKehBerkoperasi = $_POST['koperasi'];
        $pangan = $_POST['pangan'];
        $sandang = $_POST['sandang'];
        $kesehatan = $_POST['kesehatan'];
        $perencanaanSehat = $_POST['perencanaanSehat'];
        $kriteriaRumah = $_POST['kriteriaRumah'];
        $jambanKeluarga = $_POST['jambanKeluarga'];
        $jumlahJambanKeluarga = $_POST['jumlahJamban'];
        $sumberAir = $_POST['sumberAir'];
        $memilikiTempatSampah = $_POST['tempatSampah'];

        $sql = "INSERT INTO rekap_catatan_per_dasawisma (
                    kelompok_dasa_wisma, tahun, nama_anggota_keluarga, status_perkawinan, jenis_kelamin, 
                    tempat_lahir, tanggal_lahir, umur, agama, pendidikan, pekerjaan, berkebutuhan_khusus, 
                    penghayatan_pengamalan_pancasila, gotong_royong, pendidikan_keterampilan, 
                    pengembangan_keh_berkoperasi, pangan, sandang, kesehatan, perencanaan_sehat, 
                    kriteria_rumah, jamban_keluarga, jumlah_jamban_keluarga, sumber_air, memiliki_tempat_sampah
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssssssssssssssssssss",
            $kelompokDasaWisma, $tahun, $namaAnggotaKeluarga, $statusPerkawinan, $jenisKelamin,
            $tempatLahir, $tanggalLahir, $umur, $agama, $pendidikan, $pekerjaan, $berkebutuhanKhusus,
            $penghayatanPengamalanPancasila, $gotongRoyong, $pendidikanKeterampilan,
            $pengembanganKehBerkoperasi, $pangan, $sandang, $kesehatan, $perencanaanSehat,
            $kriteriaRumah, $jambanKeluarga, $jumlahJambanKeluarga, $sumberAir, $memilikiTempatSampah
        );

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Data berhasil disimpan!";
                // Redirect setelah berhasil menyimpan data
            echo "<script>
                    alert('Data berhasil disimpan!'); 
                    window.location.href = 'view_rekap_catatan_per_dasawisma.php';
                  </script>";
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM : REKAP DATA CATATAN PER-DASAWISMA</title>
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
    <?php
        // Variabel untuk menyimpan judul form
        $formTitle1 = "Informasi";
        $formTitle2 = "Kegiatan PKK yang Diikuti";
        $formTitle3 = "Bagian Isian";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
    ?>
</head>
<body class="bg-light">
    
    <header class="header">
        <div class="header-left">
            <h1>SIPEDAS BERANI</h1>
        </div>
        <div class="header-right">
            <!-- <span>Login sebagai: User</span> -->
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
                </ul>
            </div>
            <a href="../mainmenu-admin.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>TAMBAH : REKAP CATATAN PER DASAWISMA</h2>
            </div>
            
            <form method="POST" action="">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                            <div class="mb-3">
                                <label for="kelompok" class="form-label bold">Kelompok Dasa Wisma</label>
                                <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Masukkan Kelompok Dasa Wisma">
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label bold">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun">
                            </div>

                            <div class="mb-3">
                                <label for="namaAnggota" class="form-label bold">Nama Anggota Keluarga</label>
                                <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" placeholder="Masukkan Nama Anggota Keluarga">
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Status Perkawinan</label>
                                <div>
                                    <div>
                                        <input type="radio" id="menikah" name="statusPerkawinan" value="Menikah">
                                        <label for="menikah">Menikah</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="belumMenikah" name="statusPerkawinan" value="Belum Menikah">
                                        <label for="belumMenikah">Belum Menikah</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="ceraiMati" name="statusPerkawinan" value="Cerai Mati">
                                        <label for="ceraiMati">Cerai Mati</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="ceraiHidup" name="statusPerkawinan" value="Cerai Hidup">
                                        <label for="ceraiHidup">Cerai Hidup</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Jenis Kelamin</label>
                                <div>
                                    <input type="radio" id="lakiLaki" name="jenisKelamin" value="Laki-Laki">
                                    <label for="lakiLaki">Laki-Laki</label>
                                    <input type="radio" id="perempuan" name="jenisKelamin" value="Perempuan">
                                    <label for="perempuan">Perempuan</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tempatLahir" class="form-label bold">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan Tempat Lahir">
                            </div>

                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
                            </div>

                            <div class="mb-3">
                                <label for="umur" class="form-label bold">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur">
                            </div>

                            <div class="mb-3">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label bold">Agama</label>
                                        <div> <!-- Added flexbox for horizontal layout -->
                                            <div class="me-3"> <!-- Added margin for spacing -->
                                                <input type="radio" id="islam" name="agama" value="Islam" onchange="handleChangeAgama()">
                                                <label for="islam">Islam</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="kristen" name="agama" value="Kristen" onchange="handleChangeAgama()">
                                                <label for="kristen">Kristen</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="katolik" name="agama" value="Katolik" onchange="handleChangeAgama()">
                                                <label for="katolik">Katolik</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="hindu" name="agama" value="Hindu" onchange="handleChangeAgama()">
                                                <label for="hindu">Hindu</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="budha" name="agama" value="Budha" onchange="handleChangeAgama()">
                                                <label for="budha">Budha</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="khonghucu" name="agama" value="Khonghucu" onchange="handleChangeAgama()">
                                                <label for="khonghucu">Khonghucu</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="agamaLainnya" name="agama" value="" onchange="handleChangeAgama()">
                                                <label for="agamaLainnya">Lainnya</label>
                                                <input type="text" class="form-control" id="agamaLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateAgamaLainnya()" onclick="selectOtherAgama()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Pendidikan</label>
                                <div>
                                    <div>
                                        <input type="radio" id="sd" name="pendidikan" value="SD" onchange="handleChangePendidikan()">
                                        <label for="sd">SD</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="smp" name="pendidikan" value="SMP" onchange="handleChangePendidikan()">
                                        <label for="smp">SMP</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sma" name="pendidikan" value="SMA" onchange="handleChangePendidikan()">
                                        <label for="sma">SMA</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s1" name="pendidikan" value="S1" onchange="handleChangePendidikan()">
                                        <label for="s1">S1</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s2" name="pendidikan" value="S2" onchange="handleChangePendidikan()">
                                        <label for="s2">S2</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s3" name="pendidikan" value="S3" onchange="handleChangePendidikan()">
                                        <label for="s3">S3</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pendidikanLainnya" name="pendidikan" value="" onchange="handleChangePendidikan()">
                                        <label for="pendidikanLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="pendidikanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePendidikanLainnya()" onclick="selectOtherPendidikan()">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Pekerjaan</label>
                                <div>
                                    <div>
                                        <input type="radio" id="asn" name="pekerjaan" value="ASN" onchange="handleChangePekerjaan()">
                                        <label for="asn">ASN</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="tniPolri" name="pekerjaan" value="TNI/Polri" onchange="handleChangePekerjaan()">
                                        <label for="tniPolri">TNI/Polri</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pegawaiSwasta" name="pekerjaan" value="Pegawai Swasta" onchange="handleChangePekerjaan()">
                                        <label for="pegawaiSwasta">Pegawai Swasta</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="wiraswasta" name="pekerjaan" value="Wiraswasta" onchange="handleChangePekerjaan()">
                                        <label for="wiraswasta">Wiraswasta</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mengurusRumahTangga" name="pekerjaan" value="Mengurus Rumah Tangga" onchange="handleChangePekerjaan()">
                                        <label for="mengurusRumahTangga">Mengurus Rumah Tangga</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pelajar" name="pekerjaan" value="Pelajar" onchange="handleChangePekerjaan()">
                                        <label for="pelajar">Pelajar</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mahasiswa" name="pekerjaan" value="Mahasiswa" onchange="handleChangePekerjaan()">
                                        <label for="mahasiswa">Mahasiswa</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pekerjaanLainnya" name="pekerjaan" value="" onchange="handleChangePekerjaan()">
                                        <label for="pekerjaanLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="pekerjaanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePekerjaanLainnya()" onclick="selectOtherPekerjaan()">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Berkebutuhan Khusus</label>
                                <div>
                                    <div>
                                        <input type="radio" id="fisik" name="berkebutuhanKhusus" value="Fisik" onchange="handleChangeBerkebutuhan()">
                                        <label for="fisik">Fisik</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mental" name="berkebutuhanKhusus" value="Mental" onchange="handleChangeBerkebutuhan()">
                                        <label for="mental">Mental</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="intelektual" name="berkebutuhanKhusus" value="Intelektual" onchange="handleChangeBerkebutuhan()">
                                        <label for="intelektual">Intelektual</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sensorik" name="berkebutuhanKhusus" value="Sensorik" onchange="handleChangeBerkebutuhan()">
                                        <label for="sensorik">Sensorik</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="berkebutuhanKhususLainnya" name="berkebutuhanKhusus" value="" onchange="handleChangeBerkebutuhan()">
                                        <label for="berkebutuhanKhususLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="berkebutuhanKhususLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateBerkebutuhanKhususLainnya()" onclick="selectOtherBerkebutuhan()">
                                    </div>
                                </div>
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
                            <label class="form-label bold">Penghayatan dan Pengamalan Pancasila</label>
                            <div>
                                <input type="radio" id="pancasilaYa" name="pancasila" value="Ya">
                                <label for="pancasilaYa">Ya</label>
                                <input type="radio" id="pancasilaTidak" name="pancasila" value="Tidak">
                                <label for="pancasilaTidak">Tidak</label>
                            </div>
                        </div> 
                        <div class="mb-3">
                            <label class="form-label bold">Gotong Royong</label>
                            <div>
                                <input type="radio" id="gotongRoyongYa" name="gotongRoyong" value="Ya">
                                <label for="gotongRoyongYa">Ya</label>
                                <input type="radio" id="gotongRoyongTidak" name="gotongRoyong" value="Tidak">
                                <label for="gotongRoyongTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Pendidikan dan Keterampilan</label>
                            <div>
                                <input type="radio" id="pendidikanYa" name="pendidikan_keterampilan" value="Ya">
                                <label for="pendidikanYa">Ya</label>
                                <input type="radio" id="pendidikanTidak" name="pendidikan_keterampilan" value="Tidak">
                                <label for="pendidikanTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Pengembangan Kehidupan Berkoperasi</label>
                            <div>
                                <input type="radio" id="koperasiYa" name="koperasi" value="Ya">
                                <label for="koperasiYa">Ya</label>
                                <input type="radio" id="koperasiTidak" name="koperasi" value="Tidak">
                                <label for="koperasiTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Pangan</label>
                            <div>
                                <input type="radio" id="panganYa" name="pangan" value="Ya">
                                <label for="panganYa">Ya</label>
                                <input type="radio" id="panganTidak" name="pangan" value="Tidak">
                                <label for="panganTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Sandang</label>
                            <div>
                                <input type="radio" id="sandangYa" name="sandang" value="Ya">
                                <label for="sandangYa">Ya</label>
                                <input type="radio" id="sandangTidak" name="sandang" value="Tidak">
                                <label for="sandangTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Kesehatan</label>
                            <div>
                                <input type="radio" id="kesehatanYa" name="kesehatan" value="Ya">
                                <label for="kesehatanYa">Ya</label>
                                <input type="radio" id="kesehatanTidak" name="kesehatan" value="Tidak">
                                <label for="kesehatanTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Perencanaan Sehat</label>
                            <div>
                                <input type="radio" id="perencanaanSehatYa" name="perencanaanSehat" value="Ya">
                                <label for="perencanaanSehatYa">Ya</label>
                                <input type="radio" id="perencanaanSehatTidak" name="perencanaanSehat" value="Tidak">
                                <label for="perencanaanSehatTidak">Tidak</label>
                            </div>
                        </div>

                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 3 submit -->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label bold">Rumah Layak Huni</label>
                            <div>
                                <div>
                                    <input type="radio" id="layakHuni" name="kriteriaRumah" value="Layak Huni">
                                    <label for="layakHuni">Layak Huni</label>
                                </div>
                                <div>
                                    <input type="radio" id="tidakLayakHuni" name="kriteriaRumah" value="Tidak Layak Huni">
                                    <label for="tidakLayakHuni">Tidak Layak Huni</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Jamban Keluarga</label>
                            <div>
                                <input type="radio" id="jambanAda" name="jambanKeluarga" value="Ada">
                                <label for="jambanAda">Ada</label>
                                <input type="radio" id="jambanTidakAda" name="jambanKeluarga" value="Tidak Ada">
                                <label for="jambanTidakAda">Tidak Ada</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Jumlah Jamban Keluarga</label>
                            <input type="number" class="form-control" id="jumlahJamban" name="jumlahJamban" placeholder="Jumlah Jamban Keluarga">
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Sumber Air</label>
                            <div>
                                <div>
                                    <input type="radio" id="pdam" name="sumberAir" value="PDAM" onchange="handleChangeSumberAir()">
                                    <label for="pdam">PDAM</label>
                                </div>
                                <div>
                                    <input type="radio" id="sumur" name="sumberAir" value="Sumur" onchange="handleChangeSumberAir()">
                                    <label for="sumur">Sumur</label>
                                </div>
                                <div>
                                    <input type="radio" id="sumberAirLainnya" name="sumberAir" value="" onchange="handleChangeSumberAir()">
                                    <label for="sumberAirLainnya">Lainnya</label>
                                    <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateSumberAirLainnya()" onclick="selectOtherSumberAir()">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Memiliki Tempat Sampah</label>
                            <div>
                                <input type="radio" id="tempatSampahYa" name="tempatSampah" value="Ya">
                                <label for="tempatSampahYa">Ya</label>
                                <input type="radio" id="tempatSampahTidak" name="tempatSampah" value="Tidak">
                                <label for="tempatSampahTidak">Tidak</label>
                            </div>
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
                        Form Catatan Data dan Kegiatan Warga yaitu form untuk mengetahui jumlah, keadaan dan kegiatan-kegiatan yang diikuti dari anggota keluarga pendataan dilakukan pada kelompok Dasa Wisma.
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

            // Redirect to another page when the modal is closed
            const successModal = document.getElementById('successModal');
            successModal.addEventListener('hidden.bs.modal', function () {
                window.location.href = 'view_rekap_catatan_per_dasawisma.php';
            });
        });

        function updateAgamaLainnya() {
            const textInput = document.getElementById('agamaLainnyaText');
            const radioInput = document.getElementById('agamaLainnya');
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

        function updateBerkebutuhanKhususLainnya() {
            const textInput = document.getElementById('berkebutuhanKhususLainnyaText');
            const radioInput = document.getElementById('berkebutuhanKhususLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateSumberAirLainnya() {
            const textInput = document.getElementById('sumberAirLainnyaText');
            const radioInput = document.getElementById('sumberAirLainnya');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }
    </script>

    <!-- Reset opsi Radio kalau pindah ke pilihan lain dan sebaliknya -->
    <script>
        function handleChangeAgama() {
            const otherInput = document.getElementById('agamaLainnyaText');
            const otherRadio = document.getElementById('agamaLainnya');
            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }
        function selectOtherAgama() {
            const otherRadio = document.getElementById('agamaLainnya');
            otherRadio.checked = true;
            handleChangeAgama();
        }

        function handleChangePendidikan() {
            const otherInput = document.getElementById('pendidikanLainnyaText');
            const otherRadio = document.getElementById('pendidikanLainnya');
            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }
        function selectOtherPendidikan() {
            const otherRadio = document.getElementById('pendidikanLainnya');
            otherRadio.checked = true;
            handleChangePendidikan();
        }

        function handleChangePekerjaan() {
            const otherInput = document.getElementById('pekerjaanLainnyaText');
            const otherRadio = document.getElementById('pekerjaanLainnya');
            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }
        function selectOtherPekerjaan() {
            const otherRadio = document.getElementById('pekerjaanLainnya');
            otherRadio.checked = true;
            handleChangePekerjaan();
        }

        function handleChangeBerkebutuhan() {
            const otherInput = document.getElementById('berkebutuhanKhususLainnyaText');
            const otherRadio = document.getElementById('berkebutuhanKhususLainnya');
            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }
        function selectOtherBerkebutuhan() {
            const otherRadio = document.getElementById('berkebutuhanKhususLainnya');
            otherRadio.checked = true;
            handleChangeBerkebutuhan();
        }

        function handleChangeSumberAir() {
            const otherInput = document.getElementById('sumberAirLainnyaText');
            const otherRadio = document.getElementById('sumberAirLainnya');
            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }
        function selectOtherSumberAir() {
            const otherRadio = document.getElementById('sumberAirLainnya');
            otherRadio.checked = true;
            handleChangeSumberAir();
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
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
</body>
</html>