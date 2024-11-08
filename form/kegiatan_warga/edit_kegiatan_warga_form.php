<?php
session_start(); // Pastikan session dimulai

// Sertakan file koneksi database
include('../connect.php');

// Cek apakah ID disediakan di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM kegiatan_warga WHERE id = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Simpan data ke variabel session
        $_SESSION['kegiatan'] = $row['kegiatan'];
        $_SESSION['keterangan'] = $row['keterangan'];
        $_SESSION['pemilihan_sampah'] = $row['pemilihan_sampah'];
        $_SESSION['lubang_biopori'] = $row['lubang_biopori'];
        $_SESSION['tanaman_obat_keluarga'] = $row['tanaman_obat_keluarga'];
        $_SESSION['kampung_berkebun'] = $row['kampung_berkebun'];
        $_SESSION['buruan_sae'] = $row['buruan_sae'];
        $_SESSION['sumur_resapan'] = $row['sumur_resapan'];
        $_SESSION['loseda'] = $row['loseda'];
        $_SESSION['industri_makanan'] = $row['industri_makanan'];
        $_SESSION['industri_minuman'] = $row['industri_minuman'];
        $_SESSION['industri_kerajinan'] = $row['industri_kerajinan'];
        $_SESSION['industri_rajut'] = $row['industri_rajut'];
        $_SESSION['edit_id'] = $id; // Simpan ID untuk digunakan nanti
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location.href='edit_kegiatan_warga.php';</script>";
        exit();
    }
    $conn->close();
}

// Tangani pengiriman form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah semua input yang diperlukan sudah diisi
    $requiredFields = [
        'kegiatan', 'keterangan', 'pemilihan_sampah', 'lubang_biopori','tanaman_obat', 'kampung_berkebun', 'buruan_sae', 'sumur_resapan', 'loseda', 'industri_makanan', 'industri_minuman', 'industri_kerajinan', 'industri_rajut'
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
        $kegiatan = $_POST['kegiatan'];
        $keterangan = $_POST['keterangan'];
        $pemilihan_sampah = $_POST['pemilihan_sampah'];
        $lubang_biopori = $_POST['lubang_biopori'];
        $tanaman_obat_keluarga = $_POST['tanaman_obat'];
        $kampung_berkebun = $_POST['kampung_berkebun'];
        $buruan_sae = $_POST['buruan_sae'];
        $sumur_resapan = $_POST['sumur_resapan'];
        $loseda = $_POST['loseda'];
        $industri_makanan = $_POST['industri_makanan'];
        $industri_minuman = $_POST['industri_minuman'];
        $industri_kerajinan = $_POST['industri_kerajinan'];
        $industri_rajut = $_POST['industri_rajut'];

        // Koneksi ke database
        include('../connect.php');

        // Query untuk memperbarui data
        $sql = "UPDATE kegiatan_warga SET 
        kegiatan = '$kegiatan', 
        keterangan = '$keterangan', 
        pemilihan_sampah = '$pemilihan_sampah', 
        lubang_biopori = '$lubang_biopori', 
        tanaman_obat_keluarga = '$tanaman_obat_keluarga', 
        kampung_berkebun = '$kampung_berkebun', 
        buruan_sae = '$buruan_sae', 
        sumur_resapan = '$sumur_resapan', 
        loseda = '$loseda', 
        industri_makanan = '$industri_makanan', 
        industri_minuman = '$industri_minuman', 
        industri_kerajinan = '$industri_kerajinan', 
        industri_rajut = '$industri_rajut' 
        WHERE id = '$id'"; // Tambahkan klausa WHERE untuk menentukan record yang akan diperbarui

        if ($conn->query($sql) === TRUE) {
            // Simpan pesan notifikasi ke session
            $_SESSION['success_message'] = "Data dengan ID $id berhasil diubah!";
            // Redirect setelah berhasil menyimpan data
            echo "<script>
                    alert('Data dengan ID $id berhasil diubah!'); 
                    window.location.href = 'edit_kegiatan_warga.php';
                  </script>";
            exit();
        } else {
            echo '<script>alert("Error: ' . $conn->error . '");</script>';
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></title>
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
            <h1>SIPEDAS BERANI</h1>
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
            <a href="edit_kegiatan_warga.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>EDIT : KEGIATAN WARGA</h2>
                <span class="edit-form-span">DATA ID : <?php echo $_SESSION['edit_id'] ?? ''; ?></span>
            </div>
            
            <form method="POST" action="" id="kegiatanForm">
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">

                        <div class="col-md-12">
                            <label for="kegiatan" class="form-label bold">Kegiatan</label>
                            <div>
                                <input type="radio" id="pancasila" name="kegiatan" value="Penghayatan & Pengamalan Pancasila" onchange="handleChangeKegiatan()">
                                <label for="pancasila">Penghayatan & Pengamalan Pancasila</label>
                            </div>
                            <div>
                                <input type="radio" id="kerja_bakti" name="kegiatan" value="Kerja Bakti" onchange="handleChangeKegiatan()">
                                <label for="kerja_bakti">Kerja Bakti</label>
                            </div>
                            <div>
                                <input type="radio" id="rukun_kematian" name="kegiatan" value="Rukun Kematian" onchange="handleChangeKegiatan()">
                                <label for="rukun_kematian">Rukun Kematian</label>
                            </div>
                            <div>
                                <input type="radio" id="kegiatan_keagamaan" name="kegiatan" value="Kegiatan Keagamaan" onchange="handleChangeKegiatan()">
                                <label for="kegiatan_keagamaan">Kegiatan Keagamaan</label>
                            </div>
                            <div>
                                <input type="radio" id="jimpitan" name="kegiatan" value="Jimpitan" onchange="handleChangeKegiatan()">
                                <label for="jimpitan">Jimpitan</label>
                            </div>
                            <div>
                                <input type="radio" id="arisan" name="kegiatan" value="Arisan" onchange="handleChangeKegiatan()">
                                <label for="arisan">Arisan</label>
                            </div>
                            <div>
                                <input type="radio" id="other" name="kegiatan" value="" onchange="handleChangeKegiatan()">
                                <label for="other">Lainnya:</label>
                                <input class="form-control" type="text" id="custom_kegiatan" placeholder="Sebutkan Lainnya" oninput="updateOtherKegiatan()" onclick="selectRadioKegiatan()">
                            </div>
                        </div>
                        <div class="col-md-12 mt-5 ">
                            <label for="keterangan" class="form-label bold">Keterangan nama kegiatan yang diikuti.</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Isi...">
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
                                <input type="radio" id="rajut_ya" name="industri_rajut" value="Ya" onchange="handleChangeRajut()">
                                <label for="rajut_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="rajut_tidak" name="industri_rajut" value="Tidak" onchange="handleChangeRajut()">
                                <label for="rajut_tidak">Tidak</label>
                            </div>
                            <div>
                                <input type="radio" id="rajut_other" name="industri_rajut" value="" onchange="handleChangeRajut()">
                                <label for="rajut_other">Lainnya:</label>
                                <input class="form-control" type="text" id="custom_industri_rajut" placeholder="Sebutkan Lainnya" oninput="updateRajutOther()" onclick="selectRadioRajut()">
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
    

    <script src="../../js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Function untuk radio dengan pilihan "lainnya"
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

        // Fungsi untuk mengatur nilai elemen form dari sesi
        function fetchGlobalData() {
            setRadioOrInput("kegiatan", "<?php echo $_SESSION['kegiatan'] ?? ''; ?>", "custom_kegiatan");
            setRadioOrInput("pemilihan_sampah", "<?php echo $_SESSION['pemilihan_sampah'] ?? ''; ?>", "pemilihanSampahLainnyaText");
            setRadioOrInput("lubang_biopori", "<?php echo $_SESSION['lubang_biopori'] ?? ''; ?>", "lubangBioporiLainnyaText");
            setRadioOrInput("tanaman_obat", "<?php echo $_SESSION['tanaman_obat_keluarga'] ?? ''; ?>", "tanamanObatLainnyaText");
            setRadioOrInput("kampung_berkebun", "<?php echo $_SESSION['kampung_berkebun'] ?? ''; ?>", "kampungBerkebunLainnyaText");
            setRadioOrInput("buruan_sae", "<?php echo $_SESSION['buruan_sae'] ?? ''; ?>", "buruanSaeLainnyaText");
            setRadioOrInput("sumur_resapan", "<?php echo $_SESSION['sumur_resapan'] ?? ''; ?>", "sumurResapanLainnyaText");
            setRadioOrInput("loseda", "<?php echo $_SESSION['loseda'] ?? ''; ?>", "losedaLainnyaText");
            setRadioOrInput("industri_makanan", "<?php echo $_SESSION['industri_makanan'] ?? ''; ?>", "industriMakananLainnyaText");
            setRadioOrInput("industri_minuman", "<?php echo $_SESSION['industri_minuman'] ?? ''; ?>", "industriMinumanLainnyaText");
            setRadioOrInput("industri_kerajinan", "<?php echo $_SESSION['industri_kerajinan'] ?? ''; ?>", "industriKerajinanLainnyaText");
            setRadioOrInput("industri_rajut", "<?php echo $_SESSION['industri_rajut'] ?? ''; ?>", "custom_industri_rajut");

            // Set nilai input teks langsung
            document.getElementById("keterangan").value = "<?php echo $_SESSION['keterangan'] ?? ''; ?>";
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchGlobalData(); // Panggil fungsi untuk mengatur nilai elemen form

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

            // Tambahkan validasi sebelum mengirim form
            document.getElementById('kegiatanForm').addEventListener('submit', function(e) {
           
            });

        });

        //Cegah data null dengan override value radio
        document.addEventListener('DOMContentLoaded', function() {
            const statusKegiatanLainnyaText = "<?php echo $_SESSION['kegiatan'] ?? ''; ?>";
            if (statusKegiatanLainnyaText && !['Penghayatan & Pengamalan Pancasila', 'Kerja Bakti', 'Rukun Kematian', 'Kegiatan Keagamaan', 'Jimpitan', 'Arisan'].includes(statusKegiatanLainnyaText)) {
                document.getElementById('custom_kegiatan').value = statusKegiatanLainnyaText;
                document.getElementById('other').value = statusKegiatanLainnyaText;
                document.getElementById('other').checked = true;
            }

            const statusRajutLainnyaText = "<?php echo $_SESSION['industri_rajut'] ?? ''; ?>";
            if (statusRajutLainnyaText && !['Ya', 'Tidak'].includes(statusRajutLainnyaText)) {
                document.getElementById('custom_industri_rajut').value = statusRajutLainnyaText;
                document.getElementById('rajut_other').value = statusRajutLainnyaText;
                document.getElementById('rajut_other').checked = true;
            }
        });

        //Radio reset khusus yang lainnya
        function updateOtherKegiatan() {
            const textInput = document.getElementById('custom_kegiatan');
            const radioInput = document.getElementById('other');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }

        function updateRajutOther() {
            const textInput = document.getElementById('custom_industri_rajut');
            const radioInput = document.getElementById('rajut_other');
            radioInput.value = textInput.value; // Set the radio button's value to the text input's value
        }
    </script>

    <script>
        //Auto hapus pilihan lainnya kalau pindah radio, dan sebaliknya.
        //selectXXRadio() buat ngecek kalau radio lainnya sudah dicek atau belum.
        //xxStatusChange() buat reset value radio, selalu sebelum selectXXRadio()

        function handleChangeKegiatan() {
            const otherInput = document.getElementById('custom_kegiatan');
            const otherRadio = document.getElementById('other');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }

        function selectRadioKegiatan() {
            const otherRadio = document.getElementById('other');
            otherRadio.checked = true;
            handleChangeKegiatan();
        }

        function handleChangeRajut() {
            const otherInput = document.getElementById('custom_industri_rajut');
            const otherRadio = document.getElementById('rajut_other');

            // Jika radio "Lainnya" dipilih, fokuskan input teks
            if (otherRadio.checked) {
                otherInput.focus();
            } else {
                // Kosongkan input teks jika radio lain dipilih
                otherInput.value = '';
            }
        }

        function selectRadioRajut() {
            const otherRadio = document.getElementById('rajut_other');
            otherRadio.checked = true;
            handleChangeRajut();
        }
    </script>

    
</body>
</html>
