<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FORM : DATA REKAP IBU HAMIL PER RT</title>
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
        session_start(); // Mulai sesi di bagian atas file

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validasi form kosong
            $requiredFields = [
                'kelurahan', 'pkk_rw', 'pkk_rt', 'tahun', 'bulan', 
                'pkk_dasa_wisma', 'hamil', 'melahirkan', 'nifas', 
                'meninggal', 'lahir_laki', 'lahir_perempuan', 
                'akte_kelahiran', 'tak_ada_akte_kelahiran', 
                'meninggal_laki_bayi', 'meninggal_perempuan_bayi', 
                'meninggal_laki_balita', 'meninggal_perempuan_balita', 
                'keterangan'
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
                $kelompok_pkk_rw = $_POST['pkk_rw'];
                $kelompok_pkk_rt = $_POST['pkk_rt'];
                $tahun = $_POST['tahun'];
                $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : 'Januari'; // Set default bulan jika tidak dipilih
                $kelompok_pkk_dasawisma = $_POST['pkk_dasa_wisma'];
                $hamil = $_POST['hamil'];
                $melahirkan = $_POST['melahirkan'];
                $nifas = $_POST['nifas'];
                $meninggal = $_POST['meninggal'];
                $lahir_laki_laki = $_POST['lahir_laki'];
                $lahir_perempuan = $_POST['lahir_perempuan'];
                $memiliki_akte_kelahiran = $_POST['akte_kelahiran'];
                $tidak_memiliki_akte_kelahiran = $_POST['tak_ada_akte_kelahiran'];
                $meninggal_laki_laki_bayi = $_POST['meninggal_laki_bayi'];
                $meninggal_perempuan_bayi = $_POST['meninggal_perempuan_bayi'];
                $meninggal_laki_laki_balita = $_POST['meninggal_laki_balita'];
                $meninggal_perempuan_balita = $_POST['meninggal_perempuan_balita'];
                $keterangan = $_POST['keterangan'];

                // Validasi bulan
                if (is_null($bulan)) {
                    echo "Bulan harus dipilih.";
                    exit;
                }

                include 'connect.php'; // Pastikan file connect.php sudah ada dan berfungsi

                $sql = "INSERT INTO form_rekap_bumil_rt (kelurahan, kelompok_pkk_rw, kelompok_pkk_rt, tahun, bulan, kelompok_pkk_dasawisma, hamil, melahirkan, nifas, meninggal, lahir_laki_laki, lahir_perempuan, memiliki_akte_kelahiran, tidak_memiliki_akte_kelahiran, meninggal_laki_laki_bayi, meninggal_perempuan_bayi, meninggal_laki_laki_balita, meninggal_perempuan_balita, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssiiiiiiiiiss", $kelurahan, $kelompok_pkk_rw, $kelompok_pkk_rt, $tahun, $bulan, $kelompok_pkk_dasawisma, $hamil, $melahirkan, $nifas, $meninggal, $lahir_laki_laki, $lahir_perempuan, $memiliki_akte_kelahiran, $tidak_memiliki_akte_kelahiran, $meninggal_laki_laki_bayi, $meninggal_perempuan_bayi, $meninggal_laki_laki_balita, $meninggal_perempuan_balita, $keterangan);

                if ($stmt->execute()) {
                    // Simpan status notifikasi dalam sesi
                    $_SESSION['success'] = true;
                    // Redirect to the same page to prevent resubmission
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
        }
        
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
            
            <form method="POST" action="">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label bold">Kelurahan</label>
                        <select class="form-select" id="kelurahan" name="kelurahan">
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
                        <select class="form-select" id="pkk_rw" name="pkk_rw">
                            <option selected disabled>Pilih RW</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pkk_rt" class="form-label bold">Kelompok PKK RT</label>
                        <select class="form-select" id="pkk_rt" name="pkk_rt">
                            <option selected disabled>Pilih RT</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Isi dengan angka...">
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
                    
                        <div class="mb-3">
                            <label for="pkk_dasa_wisma" class="form-label bold">Kelompok PKK Dasa Wisma</label>
                            <input type="text" class="form-control" id="pkk_dasa_wisma" name="pkk_dasa_wisma" placeholder="Isi...">
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
                            <input type="text" class="form-control" id="hamil" name="hamil" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="melahirkan" class="form-label bold">Melahirkan</label>
                            <input type="text" class="form-control" id="melahirkan" name="melahirkan" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="nifas" class="form-label bold">Nifas</label>
                            <input type="text" class="form-control" id="nifas" name="nifas" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal" class="form-label bold">Meninggal</label>
                            <input type="text" class="form-control" id="meninggal" name="meninggal" placeholder="Isi...">
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
                            <input type="text" class="form-control" id="lahir_laki" name="lahir_laki" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="lahir_perempuan" class="form-label bold">Lahir perempuan</label>
                            <input type="text" class="form-control" id="lahir_perempuan" name="lahir_perempuan" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="akte_kelahiran" class="form-label bold">Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="akte_kelahiran" name="akte_kelahiran" placeholder="Isi...">
                        </div>   
                        
                        <div class="mb-3">
                            <label for="tak_ada_akte_kelahiran" class="form-label bold">Tidak Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="tak_ada_akte_kelahiran" name="tak_ada_akte_kelahiran" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_laki_bayi" class="form-label bold">Meninggal laki-laki</label>
                            <input type="text" class="form-control" id="meninggal_laki_bayi" name="meninggal_laki_bayi" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_perempuan_bayi" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="meninggal_perempuan_bayi" name="meninggal_perempuan_bayi" placeholder="Isi...">
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
                            <input type="text" class="form-control" id="meninggal_laki_balita" name="meninggal_laki_balita" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="meninggal_perempuan_balita" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="meninggal_perempuan_balita" name="meninggal_perempuan_balita" placeholder="Isi...">
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
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Isi sesuai keperluan..."></textarea>
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
                        Form ini untuk membantu pelaksanaan  Program Kerja Kelompok  Kerja 2 yang Membidangi Kesehatan tingkat RT. <br><br>Form ini merupakan Rekapitulasi dari ibu hamil, kelahiran, kematian bayi, kematian balita dan kematian ibu hamil, melahirkan dan nifas tingkat Dasa Wisma.<br><br>
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
            <button type="button" class="btn btn-primary" id="closeModalButton">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Cek apakah ada status success di sesi -->
    <?php if (isset($_SESSION['success'])) : ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
        <!-- Hapus status success dari sesi setelah ditampilkan -->
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <script>
        // Tambahkan event listener untuk tombol tutup
        document.getElementById('closeModalButton').addEventListener('click', function() {
            window.location.href = 'view_rekap_bumil_rt.php'; // Arahkan ke halaman data_bumil_rt.php
        });
    </script>
</body>
</html>
