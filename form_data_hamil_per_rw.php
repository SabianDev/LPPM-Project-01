<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPLATE : FORM</title>
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
        $formTitle1 = "Informasi Data";
        $formTitle2 = "Jumlah Ibu";
        $formTitle3 = "Jumlah Bayi";
        $formTitle4 = "Jumlah Balita";
        $formTitle5 = "Opsional";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
        $formTarget3 = "form-3";
        $formTarget4 = "form-4";
        $formTarget5 = "form-5";
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
                <h2>CATATAN IBU HAMIL,KELAHIRAN,KEMATIAN BAYI,KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK PKK RW  KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT </h2>
            </div>
            
            <form>
                
                <!-- FORM Informasi -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label bold">Kelurahan</label>
                            <select class="form-select" id="kelurahan">
                                <option value="">Pilih</option>
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
                            <label for="rw" class="form-label bold">Kelompok PKK RW</label>
                            <select class="form-select" id="rw">
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
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                        </div>
                        <div class="mb-3">
                            <label for="kelompok" class="form-label bold">Nama Kelompok Dasawisma</label>
                            <input type="text" class="form-control" id="kelompok" placeholder="Masukkan Nama Kelompok Dasawisma">
                        </div>
                        <div class="ctn-form-button">

                            <button type="button" class="btn btn-secondary back">Kembali</button>

                            <button type="button" class="btn btn-secondary next">Next</button>

                        </div>
                    </div>
                </div>

                <!-- FORM Jumlah Ibu -->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <p></p>
                    <div class="row">
                    <div class="col-md-12">
                            <label for="hamil" class="form-label bold">Hamil</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="melahirkan" class="form-label bold">Melahirkan</label>
                            <input type="number" class="form-control" id="melahirkan" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="nifas" class="form-label bold">Nifas</label>
                            <input type="number" class="form-control" id="nifas" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="ibuMeninggal" class="form-label bold">Meninggal</label>
                            <input type="number" class="form-control" id="ibuMeninggal" placeholder="Jawaban Anda">
                        </div>
                    </div>
                    <div class="ctn-form-button">

<button type="button" class="btn btn-secondary back">Kembali</button>

<button type="button" class="btn btn-secondary next">Next</button>

</div>
                </div>

                <!-- FORM Jumlah Bayi -->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <p></p>
                    <div class="row">
                    <div class="col-md-12">
                            <label for="lahirLaki" class="form-label bold">Lahir Laki-Laki</label>
                            <input type="number" class="form-control" id="lahirLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="lahirPerempuan" class="form-label bold">Lahir Perempuan</label>
                            <input type="number" class="form-control" id="lahirPerempuan" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="akteAda" class="form-label bold">Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="akteAda" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="akteTidakAda" class="form-label bold">Tidak Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="akteTidakAda" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="bayiMeninggalLaki" class="form-label bold">Meninggal Laki-Laki</label>
                            <input type="number" class="form-control" id="bayiMeninggalLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="bayiMeninggalPerempuan" class="form-label bold">Meninggal Perempuan</label>
                            <input type="number" class="form-control" id="bayiMeninggalPerempuan" placeholder="Jawaban Anda">
                        </div>
                    </div>
                    <div class="ctn-form-button">

<button type="button" class="btn btn-secondary back">Kembali</button>

<button type="button" class="btn btn-secondary next">Next</button>

</div>
                </div>

                <!-- FORM Jumlah Balita -->
                <div class="ctn-form form-section" id="<?php echo $formTarget4; ?>">
                    <h4 class="mt-4"><?php echo $formTitle4; ?></h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <p></p>
                    <div class="row">
                    <div class="col-md-12">
                            <label for="balitaMeninggalLaki" class="form-label bold">Meninggal Laki-Laki</label>
                            <input type="number" class="form-control" id="balitaMeninggalLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="balitaMeninggalPerempuan" class="form-label bold">Meninggal Perempuan</label>
                            <input type="number" class="form-control" id="balitaMeninggalPerempuan" placeholder="Jawaban Anda">
                        </div>
                    </div>
                    <div class="ctn-form-button">

                        <button type="button" class="btn btn-secondary back">Kembali</button>

                        <button type="button" class="btn btn-secondary next">Next</button>
                    </div>
                </div>

                <!-- FORM 4 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label bold">Isi jika diperlukan</label>
                        <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
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
                        Form ini untuk membantu pelaksanaan Program Kerja Kelompok Kerja 2 yang Membidangi Kesehatan tingkat RW. <br><br>Form ini merupakan Rekapitulasi dari ibu hamil,kelahiran,kematian bayi, kematian balita dan kematian ibu hamil, melahirkan dan nifas tingkat RT.<br><br>Apabila ada perubahan data maka di laporkan pada kelompok PKK setingkat diatasnya pada saat pertemuan rutin.
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