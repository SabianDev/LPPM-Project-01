<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM : REKAP CATATAN PKK RT</title>
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
        $formTitle1 = "Informasi Umum";
        $formTitle2 = "Jumlah Anggota Keluarga";
        $formTitle3 = "Jumlah Rumah";
        $formTitle4 = "Jumlah Sumber Air";
        $formTitle5 = "Jumlah Makanan Pokok";
        $formTitle6 = "Jumlah Warga Mengikuti Kegiatan";
        $formTitle7 = "Opsional";

        $formTarget1 = "Informasi-umum";
        $formTarget2 = "Jumlah-Anggota-Keluarga";
        $formTarget3 = "Jumlah-Rumah";
        $formTarget4 = "Jumlah-Sumber-Air";
        $formTarget5 = "Jumlah-Makanan-Pokok";
        $formTarget6 = "Jumlah-Warga-Mengikuti-Kegiatan";
        $formTarget7 = "Opsional";
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

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget4; ?>"><?php echo $formTitle4; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget5; ?>"><?php echo $formTitle5; ?></a></li>  
                    
                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget6; ?>"><?php echo $formTitle6; ?></a></li>

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget7; ?>"><?php echo $formTitle7; ?></a></li>  
                </ul>
            </div>
            <a href="../mainmenu-admin.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>TAMBAH : REKAP CATATAN PKK RT</h2>
            </div>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include '../connect.php'; // Pastikan file connect.php sudah ada dan berfungsi

                // Ambil data dari form
                $kelurahan = $_POST['kelurahan'];
                $kelompok_pkk_rw = $_POST['kelompokPKKRW'];
                $kelompok_pkk_rt = $_POST['kelompokPKKRT'];
                $tahun = $_POST['tahun'];
                $bulan = $_POST['bulan'];
                $nama_dasa_wisma = $_POST['namaDasaWisma'];
                $jumlah_krt = $_POST['jumlahKRT'];
                $jumlah_kk = $_POST['jumlahKK'];
                $total_laki_laki = $_POST['totalLakiLaki'];
                $total_perempuan = $_POST['totalPerempuan'];
                $balita_laki_laki = $_POST['balitaLakiLaki'];
                $balita_perempuan = $_POST['balitaPerempuan'];
                $pus = $_POST['pus'];
                $wus = $_POST['wus'];
                $ibu_hamil = $_POST['ibuHamil'];
                $ibu_menyusui = $_POST['ibuMenyusui'];
                $lansia = $_POST['lansia'];
                $buta = $_POST['buta'];
                $kebutuhan_khusus = $_POST['kebutuhanKhusus'];
                $sehat = $_POST['rumahSehat'];
                $kurang_sehat = $_POST['rumahKurangSehat'];
                $tempat_sampah = $_POST['tempatSampah'];
                $spal = $_POST['spal'];
                $jamban = $_POST['jamban'];
                $stiker_p4k = $_POST['stikerP4K'];
                $pdam = $_POST['pdam'];
                $sumur = $_POST['sumur'];
                $dll = $_POST['dll'];
                $beras = $_POST['beras'];
                $non_beras = $_POST['nonBeras'];
                $up2k = $_POST['up2k'];
                $pemanfaatan_tanah = $_POST['pemanfaatanTanah'];
                $industri_rumah_tangga = $_POST['industriRumahTangga'];
                $kesehatan_lingkungan = $_POST['kesehatanLingkungan'];
                $keterangan = $_POST['keterangan'];

                // Query untuk memasukkan data ke database
                $sql = "INSERT INTO rekap_catatan_pkk_rt (
                    kelurahan, kelompok_pkk_rw, kelompok_pkk_rt, tahun, bulan, nama_dasa_wisma, jumlah_krt, jumlah_kk,
                    total_laki_laki, total_perempuan, balita_laki_laki, balita_perempuan, pasangan_usia_subur, wanita_usia_subur,
                    ibu_hamil, ibu_menyusui, lansia, tiga_buta, berkebutuhan_khusus, sehat, kurang_sehat,
                    memiliki_tempat_pembuangan_sampah, memiliki_spal, memiliki_jamban_keluarga, menempel_stiker_p4k,
                    pdam, sumur, dll, beras, non_beras, up2k, pemanfaatan_tanah, industri_rumah_tangga, kesehatan_lingkungan, keterangan
                ) VALUES (
                    '$kelurahan', '$kelompok_pkk_rw', '$kelompok_pkk_rt', '$tahun', '$bulan', '$nama_dasa_wisma', '$jumlah_krt', '$jumlah_kk',
                    '$total_laki_laki', '$total_perempuan', '$balita_laki_laki', '$balita_perempuan', '$pus', '$wus',
                    '$ibu_hamil', '$ibu_menyusui', '$lansia', '$buta', '$kebutuhan_khusus', '$sehat', '$kurang_sehat',
                    '$tempat_sampah', '$spal', '$jamban', '$stiker_p4k',
                    '$pdam', '$sumur', '$dll', '$beras', '$non_beras', '$up2k', '$pemanfaatan_tanah', '$industri_rumah_tangga', '$kesehatan_lingkungan', '$keterangan'
                )";

                if ($conn->query($sql) === TRUE) {
                    $_SESSION['success_message'] = "Data berhasil disimpan!";
                    // Redirect setelah berhasil menyimpan data
                    echo "<script>
                            alert('Data berhasil disimpan!'); 
                            window.location.href = 'view_rekap_catatan_pkk_rt.php';
                        </script>";
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                mysqli_close($conn);
            }
            ?>

            <form method="POST" action="">
                
                <!-- Jumlah anggota keluarga -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
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
                        <label for="kelompokPKKRW" class="form-label bold mt-3">Kelompok PKK RW</label>
                        <select class="form-select" id="kelompokPKKRW" name="kelompokPKKRW">
                        <option value="" disabled selected>Pilih RW</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="kelompokPKKRT" class="form-label bold mt-3">Kelompok PKK RT</label>
                        <select class="form-select" id="kelompokPKKRT" name="kelompokPKKRT">
                        <option value="" disabled selected>Pilih PKK RT</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
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
                        <label for="namaDasaWisma" class="form-label bold mt-3">Nama Dasa Wisma</label>
                        <input type="text" class="form-control" id="namaDasaWisma" name="namaDasaWisma" placeholder="Isi...">
                    </div>
                    <div class="col-md-12">
                        <label for="jumlahKRT" class="form-label bold mt-3">Jumlah KRT</label>
                        <input type="number" class="form-control" id="jumlahKRT" name="jumlahKRT" placeholder="Isi dengan angka...">
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

                <!--Jumlah anggota keluarga -->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
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
                        <input type="number" class="form-control" id="balitaLakiLaki" name="balitaLakiLaki" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="balitaPerempuan" class="form-label bold mt-3">Balita Perempuan</label>
                        <input type="number" class="form-control" id="balitaPerempuan" name="balitaPerempuan" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="pus" class="form-label bold mt-3">Pasangan Usia Subur (PUS)</label>
                        <input type="number" class="form-control" id="pus" name="pus" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="wus" class="form-label bold mt-3">Wanita Usia Subur (WUS)</label>
                        <input type="number" class="form-control" id="wus" name="wus" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="ibuHamil" class="form-label bold mt-3">Ibu Hamil</label>
                        <input type="number" class="form-control" id="ibuHamil" name="ibuHamil" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="ibuMenyusui" class="form-label bold mt-3">Ibu Menyusui</label>
                        <input type="number" class="form-control" id="ibuMenyusui" name="ibuMenyusui" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="lansia" class="form-label bold mt-3">Lansia</label>
                        <input type="number" class="form-control" id="lansia" name="lansia" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="buta" class="form-label bold mt-3">3 Buta</label>
                        <input type="number" class="form-control" id="buta" name="buta" placeholder="Isi dengan angka,,,">
                    </div>
                    <div class="col-md-12">
                        <label for="kebutuhanKhusus" class="form-label bold mt-3">Berkebutuhan Khusus</label>
                        <input type="number" class="form-control" id="kebutuhanKhusus" name="kebutuhanKhusus" placeholder="Isi dengan angka,,,">
                    </div>
                    <br>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Jumlah rumah -->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
                    <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="rumahSehat" class="form-label bold mt-3">Sehat</label>
                        <input type="number" class="form-control" id="rumahSehat" name="rumahSehat" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="rumahKurangSehat" class="form-label bold mt-3">Kurang Sehat</label>
                        <input type="number" class="form-control" id="rumahKurangSehat" name="rumahKurangSehat" placeholder="Isi dengan angka...">
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

                <!-- Jumlah sumber air -->
                <div class="ctn-form form-section" id="<?php echo $formTarget4; ?>">
                    <h4 class="mt-4"><?php echo $formTitle4; ?></h4><br>
                    <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col=md=12">
                        <label for="pdam" class="form-label bold mt-3">PDAM</label>
                        <input type="number" class="form-control" id="pdam" name="pdam" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col=md=12">
                        <label for="sumur" class="form-label bold mt-3">Sumur</label>
                        <input type="number" class="form-control" id="sumur" name="sumur" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col=md=12">
                        <label for="dll" class="form-label bold mt-3">DLL</label>
                        <input type="number" class="form-control" id="dll" name="dll" placeholder="Isi dengan angka...">
                    </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Jumlah makanan pokok -->

                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
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

                <!-- Jumlah warga mengikuti kegiatan -->

                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
                    <div class="row">
                        <p class="text-muted">*Isi dengan angka</p>
                        <div class="col-md-12">
                            <label for="up2k" class="form-label bold mt-3">UP2K</label>
                            <input type="number" class="form-control" id="up2k" name="up2k" placeholder="Isi dengan angka...">
                        </div>
                        <div class="col-md-12">
                            <label for="pemanfaatanTanah" class="form-label bold mt-3">Pemanfaatan Tanah</label>
                            <input type="number" class="form-control" id="pemanfaatanTanah" name="pemanfaatanTanah" placeholder="Isi dengan angka...">
                        </div>
                        <div class="col-md-12">
                            <label for="industriRumahTangga" class="form-label bold mt-3">Industri Rumah Tangga</label>
                            <input type="number" class="form-control" id="industriRumahTangga" name="industriRumahTangga" placeholder="Isi dengan angka...">
                        </div>
                        <div class="col-md-12">
                            <label for="kesehatanLingkungan" class="form-label bold mt-3">Kesehatan Lingkungan</label>
                            <input type="number" class="form-control" id="kesehatanLingkungan" name="kesehatanLingkungan" placeholder="Isi dengan angka...">
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>
            

                <!-- FORM 4 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
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
                        Form Catatan Data dan Kegiatan Warga yaitu form untuk mengetahui dan rekapitulasi jumlah, keadaan dan kegiatan-kegiatan yang diikuti dari anggota keluarga pendataan dilakukan pada kelompok RT.<br><br>
                        Data kegiatan tersebut meliputi:<br>
                        <ul>
                            
                        </ul>
                        <li>Data Umum TP PKK</li>
                        <li>Data Kegiatan Pokja I</li>
                        <li>Data Kegiatan Pokja II</li>
                        <li>Data Kegiatan Pokja III</li>
                        <li>Data Kegiatan Pokja IV</li>
                        <li>Data Posyandu</li>
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

            // Form validation
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const textInputs = form.querySelectorAll('input[type="text"]');
                let isValid = true;

                textInputs.forEach(input => {
                    if (input.value.trim() === '') {
                        isValid = false;
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Form tidak boleh ada yang kosong');
                }
            });

            // Modal behavior
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            document.getElementById('successModal').addEventListener('hidden.bs.modal', function () {
                window.location.href = 'view_rekap_catatan_pkk_rt.php'; // Redirect after modal is closed
            });
        });
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
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="closeModalButton">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        // Redirect only when "Tutup" button is clicked
        document.getElementById('closeModalButton').addEventListener('click', function() {
            window.location.href = 'view_rekap_catatan_pkk_rt.php';
        });
    </script>
</body>
</html>
