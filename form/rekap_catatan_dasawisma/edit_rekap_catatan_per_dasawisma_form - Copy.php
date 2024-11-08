<?php
session_start(); // Memulai session

// Menghubungkan ke database
include('../connect.php');

// Cek apakah ID diset di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include '../connect.php'; 
    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM rekap_catatan_per_dasawisma WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Simpan data ke dalam variabel session
        $_SESSION['kelompok_dasa_wisma'] = $row['kelompok_dasa_wisma'];
        $_SESSION['tahun'] = $row['tahun'];
        $_SESSION['nama_anggota_keluarga'] = $row['nama_anggota_keluarga'];
        $_SESSION['status_perkawinan'] = $row['status_perkawinan'];
        $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
        $_SESSION['tempat_lahir'] = $row['tempat_lahir'];
        $_SESSION['tanggal_lahir'] = $row['tanggal_lahir'];
        $_SESSION['umur'] = $row['umur'];
        $_SESSION['agama'] = $row['agama'];
        $_SESSION['pendidikan'] = $row['pendidikan'];
        $_SESSION['pekerjaan'] = $row['pekerjaan'];
        $_SESSION['berkebutuhan_khusus'] = $row['berkebutuhan_khusus'];
        $_SESSION['penghayatan_pengamalan_pancasila'] = $row['penghayatan_pengamalan_pancasila'];
        $_SESSION['gotong_royong'] = $row['gotong_royong'];
        $_SESSION['pendidikan_keterampilan'] = $row['pendidikan_keterampilan'];
        $_SESSION['pengembangan_keh_berkoperasi'] = $row['pengembangan_keh_berkoperasi'];
        $_SESSION['pangan'] = $row['pangan'];
        $_SESSION['sandang'] = $row['sandang'];
        $_SESSION['kesehatan'] = $row['kesehatan'];
        $_SESSION['perencanaan_sehat'] = $row['perencanaan_sehat'];
        $_SESSION['kriteria_rumah'] = $row['kriteria_rumah'];
        $_SESSION['jamban_keluarga'] = $row['jamban_keluarga'];
        $_SESSION['jumlah_jamban_keluarga'] = $row['jumlah_jamban_keluarga'];
        $_SESSION['sumber_air'] = $row['sumber_air'];
        $_SESSION['memiliki_tempat_sampah'] = $row['memiliki_tempat_sampah'];
        $_SESSION['edit_id'] = $id; // Simpan ID untuk digunakan nanti
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='edit_rekap_catatan_per_dasawisma.php';</script>";
        exit();
    }
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kelompok', 'tahun', 'namaAnggota', 'statusPerkawinan', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'umur', 'pancasila', 'gotongRoyong', 'pendidikanKeterampilan', 'pengembanganKehBerkoperasi', 'pangan', 'sandang', 'kesehatan', 'perencanaanSehat', 'kriteriaRumah', 'jambanKeluarga', 'jumlahJamban', 'tempatSampah'
    ];
    
    $allFilled = true;
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $allFilled = false;
            break;
        }
    }

    if (!$allFilled) {
        echo "<script>alert('Silakan isi semua form yang diperlukan sebelum mengirim!!!!.');</script>";
    } else {
        // Ambil data dari form
        $kelompok_dasa_wisma = $_POST['kelompok'];
        $tahun = $_POST['tahun'];
        $nama_anggota_keluarga = $_POST['namaAnggota'];
        $status_perkawinan = $_POST['statusPerkawinan'];
        $jenis_kelamin = $_POST['jenisKelamin'];
        $tempat_lahir = $_POST['tempatLahir'];
        $tanggal_lahir = $_POST['tanggalLahir'];
        $umur = $_POST['umur'];
        $agama = $_POST['agama'];
        $pendidikan = $_POST['pendidikan'];
        $pekerjaan = $_POST['pekerjaan'];
        $berkebutuhan_khusus = $_POST['berkebutuhanKhusus'];
        $penghayatan_pengamalan_pancasila = $_POST['pancasila'];
        $gotong_royong = $_POST['gotongRoyong'];
        $pendidikan_keterampilan = $_POST['pendidikanKeterampilan'];
        $pengembangan_keh_berkoperasi = $_POST['pengembanganKehBerkoperasi'];
        $pangan = $_POST['pangan'];
        $sandang = $_POST['sandang'];
        $kesehatan = $_POST['kesehatan'];
        $perencanaan_sehat = $_POST['perencanaanSehat'];
        $kriteria_rumah = $_POST['kriteriaRumah'];
        $jamban_keluarga = $_POST['jambanKeluarga'];
        $jumlah_jamban_keluarga = $_POST['jumlahJamban'];
        $sumber_air = $_POST['sumberAir'];
        $memiliki_tempat_sampah = $_POST['tempatSampah'];

        // Koneksi ke database
        include('../connect.php');

        // Query untuk memperbarui data
        $sql = "UPDATE data_per_dasawisma SET 
        kelompok_dasa_wisma = '$kelompok_dasa_wisma', 
        tahun = '$tahun', 
        nama_anggota_keluarga = '$nama_anggota_keluarga', 
        status_perkawinan = '$status_perkawinan', 
        jenis_kelamin = '$jenis_kelamin', 
        tempat_lahir = '$tempat_lahir', 
        tanggal_lahir = '$tanggal_lahir', 
        umur = '$umur', 
        agama = '$agama', 
        pendidikan = '$pendidikan', 
        pekerjaan = '$pekerjaan', 
        berkebutuhan_khusus = '$berkebutuhan_khusus', 
        penghayatan_pengamalan_pancasila = '$penghayatan_pengamalan_pancasila', 
        gotong_royong = '$gotong_royong', 
        pendidikan_keterampilan = '$pendidikan_keterampilan', 
        pengembangan_keh_berkoperasi = '$pengembangan_keh_berkoperasi', 
        pangan = '$pangan', 
        sandang = '$sandang', 
        kesehatan = '$kesehatan', 
        perencanaan_sehat = '$perencanaan_sehat', 
        kriteria_rumah = '$kriteria_rumah', 
        jamban_keluarga = '$jamban_keluarga', 
        jumlah_jamban_keluarga = '$jumlah_jamban_keluarga', 
        sumber_air = '$sumber_air', 
        memiliki_tempat_sampah = '$memiliki_tempat_sampah' 
        WHERE id = '$id'"; // Tambahkan klausa WHERE untuk menentukan record yang akan diperbarui

        if ($conn->query($sql) === TRUE) {
            // Simpan pesan notifikasi ke session
            $_SESSION['success_message'] = "Data dengan ID $id berhasil diubah!";
            // Redirect setelah berhasil menyimpan data
            echo "<script>
                    alert('Data dengan ID $id berhasil diubah!'); 
                    window.location.href = 'edit_data_per_dasawisma.php';
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
     <title>EDIT ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></title>
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
            <a href="edit_rekap_catatan_per_dasawisma.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
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
                 <h2>EDIT : CATATAN DATA KEGIATAN WARGA KELOMPOK DASA WISMA</h2>
                 <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
            </div>
             
            <form method="POST" action="">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                                <label for="kelompok" class="form-label bold">Kelompok Dasa Wisma</label>
                                <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Masukkan Kelompok Dasa Wisma" >
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label bold">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" >
                            </div>

                            <div class="mb-3">
                                <label for="namaAnggota" class="form-label bold">Nama Anggota Keluarga</label>
                                <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" placeholder="Masukkan Nama Anggota Keluarga" >
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
                                <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan Tempat Lahir" >
                            </div>

                            <div class="mb-3">
                                <label for="tanggalLahir" class="form-label bold">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" >
                            </div>

                            <div class="mb-3">
                                <label for="umur" class="form-label bold">Umur</label>
                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur" >
                            </div>

                            <div class="mb-3">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label bold">Agama</label>
                                        <div> <!-- Added flexbox for horizontal layout -->
                                            <div class="me-3"> <!-- Added margin for spacing -->
                                                <input type="radio" id="islam" name="agama" value="Islam">
                                                <label for="islam">Islam</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="kristen" name="agama" value="Kristen">
                                                <label for="kristen">Kristen</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="katolik" name="agama" value="Katolik">
                                                <label for="katolik">Katolik</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="hindu" name="agama" value="Hindu">
                                                <label for="hindu">Hindu</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="budha" name="agama" value="Budha">
                                                <label for="budha">Budha</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="khonghucu" name="agama" value="Khonghucu">
                                                <label for="khonghucu">Khonghucu</label>
                                            </div>
                                            <div class="me-3">
                                                <input type="radio" id="agamaLainnya" name="agama" value="">
                                                <label for="agamaLainnya">Lainnya</label>
                                                <input type="text" class="form-control" id="agamaLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateAgamaLainnya()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Pendidikan</label>
                                <div>
                                    <div>
                                        <input type="radio" id="sd" name="pendidikan" value="SD">
                                        <label for="sd">SD</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="smp" name="pendidikan" value="SMP">
                                        <label for="smp">SMP</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sma" name="pendidikan" value="SMA">
                                        <label for="sma">SMA</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s1" name="pendidikan" value="S1">
                                        <label for="s1">S1</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s2" name="pendidikan" value="S2">
                                        <label for="s2">S2</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="s3" name="pendidikan" value="S3">
                                        <label for="s3">S3</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pendidikanLainnya" name="pendidikan" value="">
                                        <label for="pendidikanLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="pendidikanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePendidikanLainnya()">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Pekerjaan</label>
                                <div>
                                    <div>
                                        <input type="radio" id="asn" name="pekerjaan" value="ASN">
                                        <label for="asn">ASN</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="tniPolri" name="pekerjaan" value="TNI/Polri">
                                        <label for="tniPolri">TNI/Polri</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pegawaiSwasta" name="pekerjaan" value="Pegawai Swasta">
                                        <label for="pegawaiSwasta">Pegawai Swasta</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="wiraswasta" name="pekerjaan" value="Wiraswasta">
                                        <label for="wiraswasta">Wiraswasta</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mengurusRumahTangga" name="pekerjaan" value="Mengurus Rumah Tangga">
                                        <label for="mengurusRumahTangga">Mengurus Rumah Tangga</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pelajar" name="pekerjaan" value="Pelajar">
                                        <label for="pelajar">Pelajar</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mahasiswa" name="pekerjaan" value="Mahasiswa">
                                        <label for="mahasiswa">Mahasiswa</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="pekerjaanLainnya" name="pekerjaan" value="">
                                        <label for="pekerjaanLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="pekerjaanLainnyaText" placeholder="Sebutkan Lainnya" oninput="updatePekerjaanLainnya()">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label bold">Berkebutuhan Khusus</label>
                                <div>
                                    <div>
                                        <input type="radio" id="fisik" name="berkebutuhanKhusus" value="Fisik">
                                        <label for="fisik">Fisik</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="mental" name="berkebutuhanKhusus" value="Mental">
                                        <label for="mental">Mental</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="intelektual" name="berkebutuhanKhusus" value="Intelektual">
                                        <label for="intelektual">Intelektual</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="sensorik" name="berkebutuhanKhusus" value="Sensorik">
                                        <label for="sensorik">Sensorik</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="berkebutuhanKhususLainnya" name="berkebutuhanKhusus" value="">
                                        <label for="berkebutuhanKhususLainnya">Lainnya</label>
                                        <input type="text" class="form-control" id="berkebutuhanKhususLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateBerkebutuhanKhususLainnya()">
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
                                <input type="radio" id="pendidikanYa" name="pendidikanKeterampilan" value="Ya">
                                <label for="pendidikanYa">Ya</label>
                                <input type="radio" id="pendidikanTidak" name="pendidikanKeterampilan" value="Tidak">
                                <label for="pendidikanTidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Pengembangan Kehidupan Berkoperasi</label>
                            <div>
                                <input type="radio" id="koperasiYa" name="pengembanganKehBerkoperasi" value="Ya">
                                <label for="koperasiYa">Ya</label>
                                <input type="radio" id="koperasiTidak" name="pengembanganKehBerkoperasi" value="Tidak">
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
                            <label class="form-label bold">Kriteria Rumah</label>
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
                            <input type="number" class="form-control" id="jumlahJamban" name="jumlahJamban" placeholder="Jumlah Jamban Keluarga" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label bold">Sumber Air</label>
                            <div>
                                <div>
                                    <input type="radio" id="pdam" name="sumberAir" value="PDAM">
                                    <label for="pdam">PDAM</label>
                                </div>
                                <div>
                                    <input type="radio" id="sumur" name="sumberAir" value="Sumur">
                                    <label for="sumur">Sumur</label>
                                </div>
                                <div>
                                    <input type="radio" id="sumberAirLainnya" name="sumberAir" value="">
                                    <label for="sumberAirLainnya">Lainnya</label>
                                    <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya" oninput="updateSumberAirLainnya()">
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

        // ini kalau pilihannya adalah 'lainnya'
        if (!found) {
            document.getElementById(inputId).value = value;
        }
    }

    // Mengisi data dari session ke form
    document.getElementById("kelompok").value = "<?php echo $_SESSION['kelompok_dasa_wisma'] ?? ''; ?>";
    document.getElementById("tahun").value = "<?php echo $_SESSION['tahun'] ?? ''; ?>";
    document.getElementById("namaAnggota").value = "<?php echo $_SESSION['nama_anggota_keluarga'] ?? ''; ?>";
    setRadioOrInput("statusPerkawinan", "<?php echo $_SESSION['status_perkawinan'] ?? ''; ?>", null);
    setRadioOrInput("jenisKelamin", "<?php echo $_SESSION['jenis_kelamin'] ?? ''; ?>", null);
    document.getElementById("tempatLahir").value = "<?php echo $_SESSION['tempat_lahir'] ?? ''; ?>";
    document.getElementById("tanggalLahir").value = "<?php echo $_SESSION['tanggal_lahir'] ?? ''; ?>";
    document.getElementById("umur").value = "<?php echo $_SESSION['umur'] ?? ''; ?>";
    setRadioOrInput("agama", "<?php echo $_SESSION['agama'] ?? ''; ?>", null);
    setRadioOrInput("pendidikan", "<?php echo $_SESSION['pendidikan'] ?? ''; ?>", null);
    setRadioOrInput("pekerjaan", "<?php echo $_SESSION['pekerjaan'] ?? ''; ?>", null);
    setRadioOrInput("berkebutuhanKhusus", "<?php echo $_SESSION['berkebutuhan_khusus'] ?? ''; ?>", null);
    setRadioOrInput("pancasila", "<?php echo $_SESSION['penghayatan_pengamalan_pancasila'] ?? ''; ?>", null);
    setRadioOrInput("gotongRoyong", "<?php echo $_SESSION['gotong_royong'] ?? ''; ?>", null);
    setRadioOrInput("pendidikanKeterampilan", "<?php echo $_SESSION['pendidikan_keterampilan'] ?? ''; ?>", null);
    setRadioOrInput("pengembanganKehBerkoperasi", "<?php echo $_SESSION['pengembangan_keh_berkoperasi'] ?? ''; ?>", null);
    setRadioOrInput("pangan", "<?php echo $_SESSION['pangan'] ?? ''; ?>", null);
    setRadioOrInput("sandang", "<?php echo $_SESSION['sandang'] ?? ''; ?>", null);
    setRadioOrInput("kesehatan", "<?php echo $_SESSION['kesehatan'] ?? ''; ?>", null);
    setRadioOrInput("perencanaanSehat", "<?php echo $_SESSION['perencanaan_sehat'] ?? ''; ?>", null);
    setRadioOrInput("kriteriaRumah", "<?php echo $_SESSION['kriteria_rumah'] ?? ''; ?>", null);
    setRadioOrInput("jambanKeluarga", "<?php echo $_SESSION['jamban_keluarga'] ?? ''; ?>", null);
    document.getElementById("jumlahJamban").value = "<?php echo $_SESSION['jumlah_jamban_keluarga'] ?? ''; ?>";
    setRadioOrInput("sumberAir", "<?php echo $_SESSION['sumber_air'] ?? ''; ?>", "sumberAirLainnyaText");
    setRadioOrInput("tempatSampah", "<?php echo $_SESSION['memiliki_tempat_sampah'] ?? ''; ?>", null);

    // Inisialisasi variabel dan fungsi untuk navigasi form
    let currentSectionIndex = 0;
    const sections = document.querySelectorAll('.form-section');
    const navLinks = document.querySelectorAll('.nav-link');

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
</script>
</body>
</html>