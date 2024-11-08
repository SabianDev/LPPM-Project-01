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
        $formTitle1 = "Form 1";
        $formTitle2 = "Form 2";
        $formTitle3 = "Form 3";
        $formTitle4 = "Form 4";
        $formTitle5 = "Form 5";

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

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget4; ?>"><?php echo $formTitle5; ?></a></li>  
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
                            <label for="item-1" class="form-label">Item 1</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item 2</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item 3</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item 4</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Masukkan item">
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
                            <label for="item-1" class="form-label">Item1</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item2</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item3</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item4</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
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
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item1</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item2</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item3</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item4</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 3 -->
                <div class="ctn-form form-section" id="<?php echo $formTarget4; ?>">
                    <h4 class="mt-4"><?php echo $formTitle4; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item1</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item2</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item3</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item4</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 4 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item1</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item2</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item3</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
                        </div>
                        <div class="col-md-12">
                            <label for="item-1" class="form-label">Item4</label>
                            <input type="number" class="form-control"id="hamil" placeholder="Masukkan item">
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