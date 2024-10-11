<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REKAP DATA IBU HAMIL PER DASA WISMA</title>
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
        $formTitle1 = "Informasi";
        $formTitle2 = "Status Ibu Hamil, Melahirkan dan Nifas";
        $formTitle3 = "Catatan Melahirkan";
        $formTitle4 = "Catatan Kematian";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
        $formTarget4 = "form-4";
    ?>
</head>
<body class="bg-light">
    
    <header class="header">
        <div class="header-left">
            <h1><a href="mainmenu.php">SIPEDAS BERANI</a></h1>
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
                </ul>
                
            </div>
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>CATATAN IBU HAMIL, KELAHIRAN, KEMATIAN BAYI, KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK DASA WISMA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT </h2>
            </div>
            
            <form>
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="kelurahan" class="form-label bold">Kelurahan</label>
                            <select class="form-select" id="kelurahan">
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
                        <div class="col-md-12 mt-4">
                            <label for="kelompok-pkk-rw" class="form-label bold">Kelompok PKK RW</label>
                            <select class="form-select" id="kelompok-pkk-rw">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="kelompok-pkk-rt" class="form-label bold">Kelompok PKK RT</label>
                            <select class="form-select" id="kelompok-pkk-rt">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="kelompok-dasa-wisma" class="form-label bold">Kelompok Dasa Wisma</label>
                            <select class="form-select" id="kelompok-dasa-wisma">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="bulan" class="form-label bold">Bulan</label>
                            <select class="form-select" id="bulan">
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
                        <div class="col-md-12">
                            <label for="nama-ibu" class="form-label bold">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama-ibu" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-suami" class="form-label bold">Nama Suami</label>
                            <input type="text" class="form-control" id="nama-suami" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Hamil</label>
                            <div>
                                <input type="radio" id="status-hamil-ya" name="status-hamil" value="ya">
                                <label for="status-hamil-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-hamil-tidak" name="status-hamil" value="tidak">
                                <label for="status-hamil-tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Melahirkan</label>
                            <div>
                                <input type="radio" id="status-melahirkan-ya" name="status-melahirkan" value="ya">
                                <label for="status-melahirkan-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-melahirkan-tidak" name="status-melahirkan" value="tidak">
                                <label for="status-melahirkan-tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Nifas</label>
                            <div>
                                <input type="radio" id="status-nifas-ya" name="status-nifas" value="ya">
                                <label for="status-nifas-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-nifas-tidak" name="status-nifas" value="tidak">
                                <label for="status-nifas-tidak">Tidak</label>
                            </div>
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
                        <div class="col-md-12 mt-4">
                            <label for="nama-bayi" class="form-label bold">Nama Bayi</label>
                            <input type="text" class="form-control" id="nama-bayi" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Jenis Kelamin</label>
                            <div>
                                <input type="radio" id="jenis-kelamin-laki" name="jenis-kelamin" value="laki">
                                <label for="jenis-kelamin-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="jenis-kelamin-perempuan" name="jenis-kelamin" value="perempuan">
                                <label for="jenis-kelamin-perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tempat-lahir" class="form-label bold">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat-lahir" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tanggal-lahir" class="form-label bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal-lahir">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Akte Kelahiran</label>
                            <div>
                                <input type="radio" id="akte-ada" name="akte-kelahiran" value="ada">
                                <label for="akte-ada">Ada</label>
                            </div>
                            <div>
                                <input type="radio" id="akte-tidak-ada" name="akte-kelahiran" value="tidak-ada">
                                <label for="akte-tidak-ada">Tidak Ada</label>
                            </div>
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 4 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle4; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nama-ibu" class="form-label bold">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama-ibu" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-bayi" class="form-label bold">Nama Bayi</label>
                            <input type="text" class="form-control" id="nama-bayi" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-balita" class="form-label bold">Nama Balita</label>
                            <input type="text" class="form-control" id="nama-balita" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status</label>
                            <div>
                                <input type="radio" id="status-hamil" name="status" value="hamil">
                                <label for="status-hamil">Hamil</label>
                            </div>
                            <div>
                                <input type="radio" id="status-melahirkan" name="status" value="melahirkan">
                                <label for="status-melahirkan">Melahirkan</label>
                            </div>
                            <div>
                                <input type="radio" id="status-nifas" name="status" value="nifas">
                                <label for="status-nifas">Nifas</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Jenis Kelamin</label>
                            <div>
                                <input type="radio" id="jenis-kelamin-laki" name="jenis-kelamin" value="laki">
                                <label for="jenis-kelamin-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="jenis-kelamin-perempuan" name="jenis-kelamin" value="perempuan">
                                <label for="jenis-kelamin-perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tanggal-meninggal" class="form-label bold">Tanggal Meninggal</label>
                            <input type="date" class="form-control" id="tanggal-meninggal">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="sebab-meninggal" class="form-label bold">Sebab Meninggal</label>
                            <input type="text" class="form-control" id="sebab-meninggal" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="keterangan" class="form-label bold">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" placeholder="Isi...">
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
                        Dasa wisma adalah kelompok ibu berasal dari 10 KK (kepala keluarga) rumah yang bertetangga untuk mempermudah jalannya suatu program. Form ini diisi setiap bulan pada saat pertemuan kelompok Dasa Wisma dan dilaporkan secara lisan setiap bulan kepada kelompok PKK setingkat di atasnya dan Posyandu.<br><br>Form ini untuk membantu pelaksanaan Program Kerja Kelompok Kerja 2 yang Membidangi Kesehatan.
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
    </script>
</body>
</html>