<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPEDAS BERANI</title>
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
        $formTitle2 = "Anggota keluarga";
        $formTitle3 = "Jumlah kriteria rumah";
        $formTitle4 = "Jumlah sumber air";
        $formTitle5 = "Jumlah makanan pokok";
        $formTitle6 = "Opsional";

        $formTarget1 = "Informasi";
        $formTarget2 = "Anggota-keluarga";
        $formTarget3 = "Jumlah-kriteria-rumah";
        $formTarget4 = "Jumlah-sumber-air";
        $formTarget5 = "Jumlah-makanan-pokok";
        $formTarget6 = "Opsional"

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

                    <li><a href="#" class="nav-link" data-target="<?php echo $formTarget5; ?>"><?php echo $formTitle6; ?></a></li>  
                </ul>
            </div>
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>CATATAN DATA KEGIATAN WARGA KELOMPOK PKK RW KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h2>
            </div>
            
            <form>
                
                <!-- Informasi kelurahan -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                        <label for="kelurahan" class="form-label bold mt-3">Kelurahan</label>
                        <select class="form-select" id="kelurahan">
                            <option value="" disabled selected>Pilih Kelurahan</option>
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
                        <label for="AnggotaPKKRW" class="form-label bold mt-3">Anggota PKK RW</label>
                        <select class="form-select" id="AnggotaPKKRW">
                            <option value="" disabled selected>Pilih anggota PKK RW</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        </div>
                        <div class="col-md-12">
                        <label for="AnggotaPKKRT" class="form-label bold mt-3">Anggota PKK RT</label>
                        <select class="form-select" id="AnggotaPKKRT">
                            <option value="" disabled selected>Pilih Anggota PKK RT</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="tahun" class="form-label bold mt-3">Tahun</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="col-md-12">
                        <label for="bulan" class="form-label bold mt-3">Bulan</label>
                        <select class="form-select" id="bulan">
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
                        <label for="tahun" class="form-label bold mt-3">No. RW</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Isi...">
                    </div>
                    <div class="col-md-12">
                        <label for="tahun" class="form-label bold mt-3">Jumlah Dasa wisma</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="tahun" class="form-label bold mt-3">Jumlah RT</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="tahun" class="form-label bold mt-3">Jumlah KK</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Isi dengan angka...">
                    </div>                    
                        <br>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Jumlah anggota keluarga -->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
                    <div class="row">
                        <p class="text-muted">*Isi dengan angka</p>
                            <div class="col-md-12">
                                <label for="totalLakiLaki" class="form-label bold mt-3">Total Laki-Laki</label>
                                <input type="number" class="form-control" id="totalLakiLaki" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="totalPerempuan" class="form-label bold mt-3">Total Perempuan</label>
                                <input type="number" class="form-control" id="totalPerempuan" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="balitaLakiLaki" class="form-label bold mt-3">Balita Laki-Laki</label>
                                <input type="number" class="form-control" id="balitaLakiLaki" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="balitaPerempuan" class="form-label bold mt-3">Balita Perempuan</label>
                                <input type="number" class="form-control" id="balitaPerempuan" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="pus" class="form-label bold mt-3">Pasangan Usia Subur (PUS)</label>
                                <input type="number" class="form-control" id="pus" placeholder="Isi dengan angka">
                            </div>
                            <div class="col-md-12">
                                <label for="wus" class="form-label bold mt-3">Wanita Usia Subur (WUS)</label>
                                <input type="number" class="form-control" id="wus" placeholder="Isi dengan angka..">
                            </div>
                            <div class="col-md-12">
                                <label for="ibuHamil" class="form-label bold mt-3">Ibu Hamil</label>
                                <input type="number" class="form-control" id="ibuHamil" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="ibuMenyusui" class="form-label bold mt-3">Ibu Menyusui</label>
                                <input type="number" class="form-control" id="ibuMenyusui" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="lansia" class="form-label bold mt-3">LANSIA</label>
                                <input type="number" class="form-control" id="lansia" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="buta" class="form-label bold mt-3">3 Buta</label>
                                <input type="number" class="form-control" id="buta" placeholder="Isi dengan angka...">
                            </div>
                            <div class="col-md-12">
                                <label for="kebutuhanKhusus" class="form-label bold mt-3">Berkebutuhan Khusus</label>
                                <input type="number" class="form-control" id="kebutuhanKhusus" placeholder="Isi dengan angka...">
                            </div>
                            <br>
                            <div class="ctn-form-button">
                                <button type="button" class="btn btn-secondary back">Kembali</button>
                                <button type="button" class="btn btn-secondary next">Next</button>
                            </div>
                    </div>
                </div>

                <!-- Jumlah kriteria rumah -->
                <div class="ctn-form form-section" id="<?php echo $formTarget3; ?>">
                    <h4 class="mt-4"><?php echo $formTitle3; ?></h4><br>
                    <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="rumahSehat" class="form-label bold mt-3">Sehat</label>
                        <input type="number" class="form-control" id="rumahSehat" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="rumahKurangSehat" class="form-label bold mt-3">Kurang Sehat</label>
                        <input type="number" class="form-control" id="rumahKurangSehat" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="tempatSampah" class="form-label bold mt-3">Memiliki Tempat Pembuangan Sampah</label>
                        <input type="number" class="form-control" id="tempatSampah" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="spal" class="form-label bold mt-3">Memiliki SPAL</label>
                        <input type="number" class="form-control" id="spal" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="jamban" class="form-label bold mt-3">Memiliki Jamban Keluarga</label>
                        <input type="number" class="form-control" id="jamban" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="stikerP4K" class="form-label bold mt-3">Menempel Stiker P4K</label>
                        <input type="number" class="form-control" id="stikerP4K" placeholder="Isi dengan angka...">
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
                    <div class="col-md-12">
                        <label for="pdam" class="form-label bold mt-3">PDAM</label>
                        <input type="number" class="form-control" id="pdam" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="sumur" class="form-label bold mt-3">Sumur</label>
                        <input type="number" class="form-control" id="sumur" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="dll" class="form-label bold mt-3">DLL</label>
                        <input type="number" class="form-control" id="dll" placeholder= "Isi dengan angka...">
                    </div>
                        <div class="ctn-form-button mt-4">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- Jumlah makanan pokok-->
                <div class="ctn-form form-section" id="<?php echo $formTarget5; ?>">
                    <h4 class="mt-4"><?php echo $formTitle5; ?></h4><br>
                    <div class="row">
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="col-md-12">
                        <label for="beras" class="form-label bold mt-3">Beras</label>
                        <input type="number" class="form-control" id="beras" placeholder="Isi dengan angka...">
                    </div>
                    <div class="col-md-12">
                        <label for="non-beras" class="form-label bold mt-3">Non Beras</label>
                        <input type="number" class="form-control" id="non-beras" placeholder="Isi dengan angka...">
                    </div>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary back">Kembali</button>
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>
                <div class="ctn-form form-section" id="<?php echo $formTarget6; ?>">
                    <h4 class="mt-4"><?php echo $formTitle6; ?></h4><br>
                    <div class="row">
                    <p class="text-muted">*Isi jika dibutuhkan</p>
                    <div class="col-md-12">
                        <label for="keterangan" class="form-label bold mt-3">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                    <br>
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
                        Form Catatan Data dan Kegiatan Warga yaitu form untuk mengetahui dan rekapitulasi jumlah, keadaan dan kegiatan-kegiatan yang diikuti dari anggota keluarga pendataan dilakukan pada kelompok RW.
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