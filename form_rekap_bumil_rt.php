<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
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
        $formTitle2 = "Jumlah Ibu";
        $formTitle3 = "Jumlah Bayi";
        $formTitle4 = "Jumlah Balita";
        $formTitle5 = "Keterangan";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
        $formTarget4 = "form-4";
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
                </ul>
            </div>
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>CATATAN IBU HAMIL, KELAHIRAN, KEMATIAN BAYI, KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK PKK RT KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT </h2>
            </div>
            
            <form>
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label bold">Kelurahan</label>
                        <select class="form-select" id="kelurahan">
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
                        <select class="form-select" id="pkk_rw">
                            <option selected disabled>Pilih RW</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Isi dengan angka...">
                        </div>

                        <div class="mb-3">
                            <label for="pkk_dasa_wisma" class="form-label bold">Kelompok PKK Dasa Wisma</label>
                            <input type="text" class="form-control" id="pkk_dasa_wisma" placeholder="Isi...">
                        </div>
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
                            <label for="hamil" class="form-label bold">Hamil</label>
                            <input type="text" class="form-control" id="hamil" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="melahirkan" class="form-label bold">Melahirkan</label>
                            <input type="text" class="form-control" id="melahirkan" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="nifas" class="form-label bold">Nifas</label>
                            <input type="text" class="form-control" id="nifas" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal" class="form-label bold">Meninggal</label>
                            <input type="text" class="form-control" id="meninggal" placeholder="Isi...">
                        </div>
                        <br>
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
                            <label for="lahir_laki" class="form-label bold">Lahir laki-laki</label>
                            <input type="text" class="form-control" id="lahir_laki" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="lahir_perempuan" class="form-label bold">Lahir perempuan</label>
                            <input type="text" class="form-control" id="lahir_perempuan" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="akte_kelahiran" class="form-label bold">Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="akte_kelahiran" placeholder="Isi...">
                        </div>   
                        
                        <div class="mb-3">
                            <label for="tak_ada_akte_kelahiran" class="form-label bold">Tidak Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="tak_ada_akte_kelahiran" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_laki_bayi" class="form-label bold">Meninggal laki-laki</label>
                            <input type="text" class="form-control" id="meninggal_laki_bayi" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_perempuan_bayi" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="meninggal_perempuan_bayi" placeholder="Isi...">
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
                            <label for="meninggal_laki_balita" class="form-label bold">Meninggal laki-laki</label>
                            <input type="text" class="form-control" id="meninggal_laki_balita" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_perempuan_balita" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="meninggal_perempuan_balita" placeholder="Isi...">
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 5 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label bold">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="3" placeholder="Isi sesuai keperluan..."></textarea>
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
                        Form ini untuk membantu pelaksanaan  Program Kerja Kelompok Kerja 2 yang Membidangi Kesehatan tingkat RT. <br><br>Form ini merupakan Rekapitulasi dari ibu hamil, kelahiran, kematian bayi, kematian balita dan kematian ibu hamil, melahirkan dan nifas tingkat Dasa Wisma.<br><br>
                        Apabila ada perubahan data maka di laporkan pada kelompok PKK setingkat diatasnya pada saat pertemuan rutin.
                        <ul>
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