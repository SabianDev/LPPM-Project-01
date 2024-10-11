<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEGIATAN WARGA</title>
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
        $formTitle1 = "Kegiatan Warga";
        $formTitle2 = "Pemanfaatan Tanah Perkarangan Keluarga";
        $formTitle3 = "Industri Rumah Tangga";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
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
                </ul>
            </div>
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>KEGIATAN WARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h2>
            </div>
            
            <form>
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="kegiatan" class="form-label bold">Kegiatan</label>
                            <div>
                                <input type="radio" id="pancasila" name="kegiatan" value="Penghayatan & Pengamalan Pancasila">
                                <label for="pancasila">Penghayatan & Pengamalan Pancasila</label>
                            </div>
                            <div>
                                <input type="radio" id="kerja_bakti" name="kegiatan" value="Kerja Bakti">
                                <label for="kerja_bakti">Kerja Bakti</label>
                            </div>
                            <div>
                                <input type="radio" id="rukun_kematian" name="kegiatan" value="Rukun Kematian">
                                <label for="rukun_kematian">Rukun Kematian</label>
                            </div>
                            <div>
                                <input type="radio" id="kegiatan_keagamaan" name="kegiatan" value="Kegiatan Keagamaan">
                                <label for="kegiatan_keagamaan">Kegiatan Keagamaan</label>
                            </div>
                            <div>
                                <input type="radio" id="jimpitan" name="kegiatan" value="Jimpitan">
                                <label for="jimpitan">Jimpitan</label>
                            </div>
                            <div>
                                <input type="radio" id="arisan" name="kegiatan" value="Arisan">
                                <label for="arisan">Arisan</label>
                            </div>
                            <div>
                                <input type="radio" id="other" name="kegiatan" value="Other">
                                <label for="other">Other:</label>
                                <input class="form-control" type="text" id="custom_kegiatan" placeholder="Masukkan pilihan custom">
                            </div>
                        </div>
                        <div class="col-md-12 mt-5 ">
                            <label for="keterangan" class="form-label bold">Keterangan nama kegiatan yang diikuti.</label>
                            <input type="text" class="form-control" id="keterangan" placeholder="Isi...">
                        </div>
                        <!-- ... existing code ... -->
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
                            <label for="pemilihan_sampah" class="form-label  bold">Pemilihan Sampah (Organik/Anorganik)</label>
                            <div>
                                <input type="radio" id="sampah_ya" name="pemilihan_sampah" value="Ya">
                                <label for="sampah_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="sampah_tidak" name="pemilihan_sampah" value="Tidak">
                                <label for="sampah_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="lubang_biopori" class="form-label  bold">Lubang Biopori</label>
                            <div>
                                <input type="radio" id="biopori_ya" name="lubang_biopori" value="Ya">
                                <label for="biopori_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="biopori_tidak" name="lubang_biopori" value="Tidak">
                                <label for="biopori_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tanaman_obat" class="form-label  bold">Tanaman Obat Keluarga</label>
                            <div>
                                <input type="radio" id="obat_ya" name="tanaman_obat" value="Ya">
                                <label for="obat_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="obat_tidak" name="tanaman_obat" value="Tidak">
                                <label for="obat_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="kampung_berkebun" class="form-label  bold">Kampung Berkebun (Sayuran)</label>
                            <div>
                                <input type="radio" id="berkebun_ya" name="kampung_berkebun" value="Ya">
                                <label for="berkebun_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="berkebun_tidak" name="kampung_berkebun" value="Tidak">
                                <label for="berkebun_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="buruan_sae" class="form-label  bold">Buruan Sae (Sayuran, Ternak Lele)</label>
                            <div>
                                <input type="radio" id="sae_ya" name="buruan_sae" value="Ya">
                                <label for="sae_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="sae_tidak" name="buruan_sae" value="Tidak">
                                <label for="sae_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="sumur_resapan" class="form-label  bold">Sumur Resapan</label>
                            <div>
                                <input type="radio" id="resapan_ya" name="sumur_resapan" value="Ya">
                                <label for="resapan_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="resapan_tidak" name="sumur_resapan" value="Tidak">
                                <label for="resapan_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="loseda" class="form-label bold">Loseda (Lodong Sesa Dapur)</label>
                            <div>
                                <input type="radio" id="loseda_ya" name="loseda" value="Ya">
                                <label for="loseda_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="loseda_tidak" name="loseda" value="Tidak">
                                <label for="loseda_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 3 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="industri_makanan" class="form-label bold">Industri Makanan</label>
                            <div>
                                <input type="radio" id="makanan_ya" name="industri_makanan" value="Ya">
                                <label for="makanan_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="makanan_tidak" name="industri_makanan" value="Tidak">
                                <label for="makanan_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="industri_minuman" class="form-label bold">Industri Minuman</label>
                            <div>
                                <input type="radio" id="minuman_ya" name="industri_minuman" value="Ya">
                                <label for="minuman_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="minuman_tidak" name="industri_minuman" value="Tidak">
                                <label for="minuman_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="industri_kerajinan" class="form-label bold">Industri Kerajinan</label>
                            <div>
                                <input type="radio" id="kerajinan_ya" name="industri_kerajinan" value="Ya">
                                <label for="kerajinan_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="kerajinan_tidak" name="industri_kerajinan" value="Tidak">
                                <label for="kerajinan_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="industri_rajut" class="form-label bold">Industri Rajut</label>
                            <div>
                                <input type="radio" id="rajut_ya" name="industri_rajut" value="Ya">
                                <label for="rajut_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="rajut_tidak" name="industri_rajut" value="Tidak">
                                <label for="rajut_tidak">Tidak</label>
                            </div>
                            <div>
                                <input type="radio" id="rajut_other" name="industri_rajut" value="Other">
                                <label for="rajut_other">Other:</label>
                                <input class="form-control" type="text" id="custom_industri_rajut" placeholder="Masukkan pilihan custom">
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
                        Setiap jenjang TP PKK dari Pusat sampai dengan Desa/ Kelurahan, memiliki data kegiatan, baik yang berupa papan data maupun lembar data kegiatan.<br>
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
        });
    </script>
</body>
</html>