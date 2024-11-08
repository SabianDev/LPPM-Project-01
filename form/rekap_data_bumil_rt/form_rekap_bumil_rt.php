<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Cek apakah semua input yang diperlukan sudah diisi
        $requiredFields = [
            'kelurahan', 'rw', 'rt', 'tahun', 'bulan', 'kelompok', 
            'hamil','melahirkan', 'nifas', 'ibuMeninggal', 
            'lahirLaki','lahirPerempuan', 'akteAda', 'akteTidakAda', 
            'bayiMeninggalLaki', 'bayiMeninggalPerempuan', 
            'balitaMeninggalLaki', 'balitaMeninggalPerempuan'
        ];
        
        // $allFilled = true;
        // foreach ($requiredFields as $field) {
        //     if (empty($_POST[$field])) {
        //         $allFilled = false;
        //         break;
        //     }
        // }

        $allFilled = true;
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field]) || $_POST[$field] === "") {
                $allFilled = false;
                break;
            }
        }
        if (!$allFilled) {
            echo "<script>alert('Silakan isi semua form yang diperlukan sebelum mengirim.');</script>";
        } else {
            // Ambil data dari form
            $kelurahan = $_POST['kelurahan'];
            $kelompok_pkk_rw = $_POST['rw'];
            $kelompok_pkk_rt = $_POST['rt'];
            $tahun = $_POST['tahun'];
            $bulan = $_POST['bulan'];
            $kelompok_pkk_dasawisma = $_POST['kelompok'];
            $hamil = $_POST['hamil'];
            $melahirkan = $_POST['melahirkan'];
            $nifas = $_POST['nifas'];
            $meninggal = $_POST['ibuMeninggal'];
            $lahir_laki_laki = $_POST['lahirLaki'];
            $lahir_perempuan = $_POST['lahirPerempuan'];
            $memiliki_akte_kelahiran = $_POST['akteAda'];
            $tidak_memiliki_akte_kelahiran = $_POST['akteTidakAda'];
            $meninggal_laki_laki_bayi = $_POST['bayiMeninggalLaki'];
            $meninggal_perempuan_bayi = $_POST['bayiMeninggalPerempuan'];
            $meninggal_laki_laki_balita = $_POST['balitaMeninggalLaki'];
            $meninggal_perempuan_balita = $_POST['balitaMeninggalPerempuan'];
            $keterangan = $_POST['keterangan'];

            // Koneksi ke database
            include '../connect.php';

            // Query untuk memasukkan data
            $sql = "INSERT INTO form_rekap_bumil_rt (kelurahan, kelompok_pkk_rw, kelompok_pkk_rt, tahun, bulan, kelompok_pkk_dasawisma, hamil, melahirkan, nifas, meninggal, lahir_laki_laki, lahir_perempuan, memiliki_akte_kelahiran, tidak_memiliki_akte_kelahiran, meninggal_laki_laki_bayi, meninggal_perempuan_bayi, meninggal_laki_laki_balita, meninggal_perempuan_balita, keterangan) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssiiiiiiiiiiis", $kelurahan, $kelompok_pkk_rw, $kelompok_pkk_rt, $tahun, $bulan, $kelompok_pkk_dasawisma, $hamil, $melahirkan, $nifas, $meninggal, $lahir_laki_laki, $lahir_perempuan, $memiliki_akte_kelahiran, $tidak_memiliki_akte_kelahiran, $meninggal_laki_laki_bayi, $meninggal_perempuan_bayi, $meninggal_laki_laki_balita, $meninggal_perempuan_balita, $keterangan);

            if ($stmt->execute()) {
                // Set session untuk notifikasi
                $_SESSION['success_message'] = "Data berhasil disimpan!";
                // Redirect setelah berhasil menyimpan data
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM : DATA REKAP IBU HAMIL PER RT</title>
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
    <!-- Konten HTML Anda di sini -->
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
            <a href="../mainmenu-admin.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>TAMBAH : FORM DATA HAMIL PER RT</h2>
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
                        <label for="rw" class="form-label bold">Kelompok PKK RW</label>
                        <select class="form-select" id="rw" name="rw">
                            <option selected disabled>Pilih RW</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label bold">Kelompok PKK RT</label>
                        <select class="form-select" id="rt" name="rt">
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
                            <label for="kelompok" class="form-label bold">Kelompok PKK Dasa Wisma</label>
                            <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Isi...">
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
                            <label for="ibuMeninggal" class="form-label bold">Meninggal</label>
                            <input type="text" class="form-control" id="ibuMeninggal" name="ibuMeninggal" placeholder="Isi...">
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
                            <label for="lahirLaki" class="form-label bold">Lahir laki-laki</label>
                            <input type="text" class="form-control" id="lahirLaki" name="lahirLaki" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="lahirPerempuan" class="form-label bold">Lahir perempuan</label>
                            <input type="text" class="form-control" id="lahirPerempuan" name="lahirPerempuan" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="akteAda" class="form-label bold">Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="akteAda" name="akteAda" placeholder="Isi...">
                        </div>   
                        
                        <div class="mb-3">
                            <label for="akteTidakAda" class="form-label bold">Tidak Memiliki Akte Kelahiran</label>
                            <input type="text" class="form-control" id="akteTidakAda" name="akteTidakAda" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="bayiMeninggalLaki" class="form-label bold">Meninggal laki-laki</label>
                            <input type="text" class="form-control" id="bayiMeninggalLaki" name="bayiMeninggalLaki" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="bayiMeninggalPerempuan" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="bayiMeninggalPerempuan" name="bayiMeninggalPerempuan" placeholder="Isi...">
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
                            <label for="balitaMeninggalLaki" class="form-label bold">Meninggal laki-laki</label>
                            <input type="text" class="form-control" id="balitaMeninggalLaki" name="balitaMeninggalLaki" placeholder="Isi...">
                        </div>

                        <div class="mb-3">
                            <label for="balitaMeninggalPerempuan" class="form-label bold">Meninggal perempuan</label>
                            <input type="text" class="form-control" id="balitaMeninggalPerempuan" name="balitaMeninggalPerempuan" placeholder="Isi...">
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
                        Form ini untuk membantu pelaksanaan Program Kerja Kelompok Kerja 2 yang Membidangi Kesehatan tingkat RW. <br><br>Form ini merupakan Rekapitulasi dari ibu hamil,kelahiran,kematian bayi, kematian balita dan kematian ibu hamil, melahirkan dan nifas tingkat RT.<br><br>Apabila ada perubahan data maka di laporkan pada kelompok PKK setingkat diatasnya pada saat pertemuan rutin.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    
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
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Notifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <?php echo $_SESSION['success_message']; ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="closeModal">OK</button>
              </div>
            </div>
          </div>
        </div>
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();

            // Tambahkan pengalihan setelah menutup modal
            document.getElementById('closeModal').addEventListener('click', function() {
                window.location.href = 'view_rekap_bumil_rt.php'; // Ganti dengan URL yang sesuai
            });
        </script>
        <?php unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan ?>
    <?php endif; ?>
</body>
</html>
