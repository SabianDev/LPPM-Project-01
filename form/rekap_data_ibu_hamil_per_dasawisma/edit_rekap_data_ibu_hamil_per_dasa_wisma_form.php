<?php
ob_start(); // Mulai output buffering
?>

<?php
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        // Koneksi ke database
        include('../connect.php');
    
        // Ambil data berdasarkan ID dengan prepared statement
        $sql = "SELECT * FROM rekap_data_ibu_hamil_per_dasa_wisma WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);  // "i" untuk integer
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    
            // Simpan data dari DB kedalam variabel sesi
            $_SESSION['kelurahan'] = $row['kelurahan']; //non-radio
            $_SESSION['rw'] = $row['kelompok_pkk_rw']; //non-radio
            $_SESSION['rt'] = $row['kelompok_pkk_rt']; //non-radio
            $_SESSION['kelompok_dasa_wisma'] = $row['kelompok_dasa_wisma']; //non-radio
            $_SESSION['tahun'] = $row['tahun']; //non-radio
            $_SESSION['bulan'] = $row['bulan']; //non-radio

            $_SESSION['nama_ibu_hmn'] = $row['nama_ibu_hmn']; //non-radio
            $_SESSION['nama_suami_hmn'] = $row['nama_suami_hmn']; //non-radio
            $_SESSION['hamil_status'] = $row['hamil_status'];
            $_SESSION['melahirkan_status'] = $row['melahirkan_status'];
            $_SESSION['nifas_status'] = $row['nifas_status'];
            $_SESSION['nama_bayi_ml'] = $row['nama_bayi_ml']; //non-radio
            $_SESSION['jenis_kelamin_ml'] = $row['jenis_kelamin_ml'];
            $_SESSION['tempat_lahir'] = $row['tempat_lahir']; //non-radio
            $_SESSION['tanggal_lahir'] = $row['tanggal_lahir']; //non-radio
            $_SESSION['akte_kelahiran'] = $row['akte_kelahiran'];
            
            $_SESSION['nama_ibu_mt'] = $row['nama_ibu_mt']; //non-radio
            $_SESSION['nama_bayi_mt'] = $row['nama_bayi_mt']; //non-radio
            $_SESSION['nama_balita'] = $row['nama_balita']; //non-radio
            $_SESSION['status_mt'] = $row['status_mt'];
            $_SESSION['jenis_kelamin_mt'] = $row['jenis_kelamin_mt'];
            $_SESSION['tanggal_meninggal'] = $row['tanggal_meninggal']; //non-radio
            $_SESSION['sebab_meninggal'] = $row['sebab_meninggal']; //non-radio
            $_SESSION['keterangan'] = $row['keterangan']; //non-radio
            
            
    
            // Simpan id untuk proses update
            $_SESSION['edit_id'] = $id;
        } else {
            echo "<script>alert('Data tidak ditemukan'); window.location.href='edit_rekap_data_ibu_hamil_per_dasa_wisma_form.php';</script>";
            exit();
        }
    
        $stmt->close();
        $conn->close();
    }


    //UPDATE KE DATABASE
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../connect.php'; // Memasukkan file koneksi

        // Mengambil data dari form
        $kelurahan = $_POST['kelurahan'];
        $kelompok_pkk_rw = $_POST['kelompok-pkk-rw'];
        $kelompok_pkk_rt = $_POST['kelompok-pkk-rt'];
        $kelompok_dasa_wisma = $_POST['kelompok-dasa-wisma'];
        $tahun = $_POST['tahun'];
        $bulan = $_POST['bulan'];

        $nama_ibu_hmn = $_POST['nama-ibu'];
        $nama_suami_hmn = $_POST['nama-suami'];
        $hamil_status = $_POST['status-hamil'];
        $melahirkan_status = $_POST['status-melahirkan'];
        $nifas_status = $_POST['status-nifas'];
        $nama_bayi_ml = $_POST['nama-bayi'];
        $jenis_kelamin_ml = $_POST['jenis-kelamin'];
        $tempat_lahir = $_POST['tempat-lahir'];
        $tanggal_lahir = $_POST['tanggal-lahir'];
        $akte_kelahiran = $_POST['akte-kelahiran'];

        $nama_ibu_mt = $_POST['nama-ibu-mt'];
        $nama_bayi_mt = $_POST['nama-bayi-mt'];
        $nama_balita = $_POST['nama-balita'];
        $status_mt = $_POST['status-mt'];
        $jenis_kelamin_mt = $_POST['jenis-kelamin-mt'];
        $tanggal_meninggal = $_POST['tanggal-meninggal'];
        $sebab_meninggal = $_POST['sebab-meninggal'];
        $keterangan = $_POST['keterangan'];

        // Query untuk memasukkan data ke dalam tabel
        $sql = "UPDATE rekap_data_ibu_hamil_per_dasa_wisma SET 
                    kelurahan = '$kelurahan', 
                    kelompok_pkk_rw = '$kelompok_pkk_rw', 
                    kelompok_pkk_rt = '$kelompok_pkk_rt', 
                    kelompok_dasa_wisma = '$kelompok_dasa_wisma', 
                    tahun = '$tahun', 
                    bulan = '$bulan',
                    nama_ibu_hmn = '$nama_ibu_hmn', 
                    nama_suami_hmn = '$nama_suami_hmn', 
                    hamil_status = '$hamil_status', 
                    melahirkan_status = '$melahirkan_status', 
                    nifas_status = '$nifas_status',
                    nama_bayi_ml = '$nama_bayi_ml', 
                    jenis_kelamin_ml = '$jenis_kelamin_ml', 
                    tempat_lahir = '$tempat_lahir', 
                    tanggal_lahir = '$tanggal_lahir', 
                    akte_kelahiran = '$akte_kelahiran',
                    nama_ibu_mt = '$nama_ibu_mt', 
                    nama_bayi_mt = '$nama_bayi_mt', 
                    nama_balita = '$nama_balita', 
                    status_mt = '$status_mt', 
                    jenis_kelamin_mt = '$jenis_kelamin_mt', 
                    tanggal_meninggal = '$tanggal_meninggal',
                    sebab_meninggal = '$sebab_meninggal', 
                    keterangan = '$keterangan'
                WHERE id = '$id'";


        if ($conn->query($sql) === TRUE) {
            // Redirect setelah berhasil menyimpan data
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } else {
            // Mengubah pesan error menjadi alert
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        mysqli_close($conn);
    }

    // Menampilkan notifikasi jika berhasil
    if (isset($_GET['success'])) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                    successModal.show();

                    // Menghapus parameter 'success' dari URL setelah notifikasi ditampilkan
                    var url = new URL(window.location.href);
                    url.searchParams.delete('success');
                    window.history.replaceState({}, document.title, url);

                    // Redirect ke view_rekap_data_ibu_hamil_per_dasa_wisma.php setelah notifikasi ditutup
                    document.getElementById('successModal').addEventListener('hidden.bs.modal', function () {
                        window.location.href = 'edit_rekap_data_ibu_hamil_per_dasa_wisma.php';
                    });
                });
              </script>";
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : REKAP DATA IBU HAMIL PER DASA WISMA</title>
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
                </ul>
                
            </div>
            <a href="edit_rekap_data_ibu_hamil_per_dasa_wisma.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>EDIT : REKAP DATA IBU HAMIL PER DASAWISMA</h2>
                <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
            </div>
            
            <form method="POST" action="">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="kelurahan" class="form-label bold">Kelurahan</label>
                            <select class="form-select" id="kelurahan" name="kelurahan">
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
                            <select class="form-select" id="kelompok-pkk-rw" name="kelompok-pkk-rw">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="kelompok-pkk-rt" class="form-label bold">Kelompok PKK RT</label>
                            <select class="form-select" id="kelompok-pkk-rt" name="kelompok-pkk-rt">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="kelompok-dasa-wisma" class="form-label bold">Kelompok Dasa Wisma</label>
                            <select class="form-select" id="kelompok-dasa-wisma" name="kelompok-dasa-wisma">
                                <?php for ($i = 1; $i <= 15; $i++): ?>
                                    <option value="<?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tahun" class="form-label bold">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="bulan" class="form-label bold">Bulan</label>
                            <select class="form-select" id="bulan" name="bulan">
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
                            <input type="text" class="form-control" id="nama-ibu" name="nama-ibu" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-suami" class="form-label bold">Nama Suami</label>
                            <input type="text" class="form-control" id="nama-suami" name="nama-suami" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Hamil</label>
                            <div>
                                <input type="radio" id="status-hamil-ya" name="status-hamil" value="Ya">
                                <label for="status-hamil-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-hamil-tidak" name="status-hamil" value="Tidak">
                                <label for="status-hamil-tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Melahirkan</label>
                            <div>
                                <input type="radio" id="status-melahirkan-ya" name="status-melahirkan" value="Ya">
                                <label for="status-melahirkan-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-melahirkan-tidak" name="status-melahirkan" value="Tidak">
                                <label for="status-melahirkan-tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status Nifas</label>
                            <div>
                                <input type="radio" id="status-nifas-ya" name="status-nifas" value="Ya">
                                <label for="status-nifas-ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="status-nifas-tidak" name="status-nifas" value="Tidak">
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
                            <input type="text" class="form-control" id="nama-bayi" name="nama-bayi" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Jenis Kelamin</label>
                            <div>
                                <input type="radio" id="jenis-kelamin-laki" name="jenis-kelamin" value="Laki-laki">
                                <label for="jenis-kelamin-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="jenis-kelamin-perempuan" name="jenis-kelamin" value="Perempuan">
                                <label for="jenis-kelamin-perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tempat-lahir" class="form-label bold">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat-lahir" name="tempat-lahir" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tanggal-lahir" class="form-label bold">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Akte Kelahiran</label>
                            <div>
                                <input type="radio" id="akte-ada" name="akte-kelahiran" value="Ada">
                                <label for="akte-ada">Ada</label>
                            </div>
                            <div>
                                <input type="radio" id="akte-tidak-ada" name="akte-kelahiran" value="Tidak Ada">
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
                            <label for="nama-ibu-mt" class="form-label bold">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama-ibu-mt" name="nama-ibu-mt" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-bayi-mt" class="form-label bold">Nama Bayi</label>
                            <input type="text" class="form-control" id="nama-bayi-mt" name="nama-bayi-mt" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="nama-balita" class="form-label bold">Nama Balita</label>
                            <input type="text" class="form-control" id="nama-balita" name="nama-balita" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Status</label>
                            <div>
                                <input type="radio" id="status-hamil" name="status-mt" value="Hamil">
                                <label for="status-hamil">Hamil</label>
                            </div>
                            <div>
                                <input type="radio" id="status-melahirkan" name="status-mt" value="Melahirkan">
                                <label for="status-melahirkan">Melahirkan</label>
                            </div>
                            <div>
                                <input type="radio" id="status-nifas" name="status-mt" value="Nifas">
                                <label for="status-nifas">Nifas</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label bold">Jenis Kelamin</label>
                            <div>
                                <input type="radio" id="jenis-kelamin-laki" name="jenis-kelamin-mt" value="Laki-laki">
                                <label for="jenis-kelamin-laki">Laki-laki</label>
                            </div>
                            <div>
                                <input type="radio" id="jenis-kelamin-perempuan" name="jenis-kelamin-mt" value="Perempuan">
                                <label for="jenis-kelamin-perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="tanggal-meninggal" class="form-label bold">Tanggal Meninggal</label>
                            <input type="date" class="form-control" id="tanggal-meninggal" name="tanggal-meninggal">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="sebab-meninggal" class="form-label bold">Sebab Meninggal</label>
                            <input type="text" class="form-control" id="sebab-meninggal" name="sebab-meninggal" placeholder="Isi...">
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="keterangan" class="form-label bold">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Isi...">
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
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <!-- buat fetch data dari variabel session -->
    <script>
        function setRadioOrInput(name, value, inputId) {
            const radios = document.querySelectorAll(`input[name="${name}"]`);
            let found = false;
            
            // ini kalau pilihannya sesuai opsi radio
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

        document.getElementById("kelurahan").value = "<?php echo $_SESSION['kelurahan'] ?? ''; ?>";
        document.getElementById("kelompok-pkk-rw").value = "<?php echo $_SESSION['rw'] ?? ''; ?>";
        document.getElementById("kelompok-pkk-rt").value = "<?php echo $_SESSION['rt'] ?? ''; ?>";
        document.getElementById("kelompok-dasa-wisma").value = "<?php echo $_SESSION['kelompok_dasa_wisma'] ?? ''; ?>";
        document.getElementById("tahun").value = "<?php echo $_SESSION['tahun'] ?? ''; ?>";
        document.getElementById("bulan").value = "<?php echo $_SESSION['bulan'] ?? ''; ?>";

        document.getElementById("nama-ibu").value = "<?php echo $_SESSION['nama_ibu_hmn'] ?? ''; ?>";
        document.getElementById("nama-suami").value = "<?php echo $_SESSION['nama_suami_hmn'] ?? ''; ?>";
        setRadioOrInput("status-hamil", "<?php echo $_SESSION['hamil_status'] ?? ''; ?>", "-");//hamil status
        setRadioOrInput("status-melahirkan", "<?php echo $_SESSION['melahirkan_status'] ?? ''; ?>", "-");//melahirkan status
        setRadioOrInput("status-nifas", "<?php echo $_SESSION['nifas_status'] ?? ''; ?>", "-");//nifas status
        document.getElementById("nama-bayi").value = "<?php echo $_SESSION['nama_bayi_ml'] ?? ''; ?>";
        setRadioOrInput("jenis-kelamin", "<?php echo $_SESSION['jenis_kelamin_ml'] ?? ''; ?>", "-");//jenis kelamin
        document.getElementById("tempat-lahir").value = "<?php echo $_SESSION['tempat_lahir'] ?? ''; ?>";
        document.getElementById("tanggal-lahir").value = "<?php echo $_SESSION['tanggal_lahir'] ?? ''; ?>";
        setRadioOrInput("akte-kelahiran", "<?php echo $_SESSION['akte_kelahiran'] ?? ''; ?>", "-");//akte kelahiran
        
        document.getElementById("nama-ibu-mt").value = "<?php echo $_SESSION['nama_ibu_mt'] ?? ''; ?>";
        document.getElementById("nama-bayi-mt").value = "<?php echo $_SESSION['nama_bayi_mt'] ?? ''; ?>";
        document.getElementById("nama-balita").value = "<?php echo $_SESSION['nama_balita'] ?? ''; ?>";
        setRadioOrInput("status-mt", "<?php echo $_SESSION['status_mt'] ?? ''; ?>", "-");//status mati
        setRadioOrInput("jenis-kelamin-mt", "<?php echo $_SESSION['jenis_kelamin_mt'] ?? ''; ?>", "-");//jenis kelamin mati
        document.getElementById("tanggal-meninggal").value = "<?php echo $_SESSION['tanggal_meninggal'] ?? ''; ?>";
        document.getElementById("sebab-meninggal").value = "<?php echo $_SESSION['sebab_meninggal'] ?? ''; ?>";
        document.getElementById("keterangan").value = "<?php echo $_SESSION['keterangan'] ?? ''; ?>";

    </script>

<?php
ob_end_flush(); // Mengakhiri output buffering
?>
</body>
</html>