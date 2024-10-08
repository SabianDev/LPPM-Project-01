<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PKK dan Dasa Wisma</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="style.css" rel="stylesheet"> <!-- Tambahkan link ke style.css -->
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
    </style>
</head>
<body class="bg-light">
    <header class="header">
        <h1>Header</h1>
    </header>
    
    <div class="main-content">
        <div class="ctn-nav">
            <div class="navigation">
                <h4>List Form</h4>
                <ul>
                    <li><a href="#" class="nav-link" data-target="informasi-umum">Informasi Umum</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-ibu">Jumlah Ibu</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-bayi">Jumlah Bayi</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-balita">Jumlah Balita</a></li>
                    <li><a href="#" class="nav-link" data-target="keterangan">Keterangan</a></li>
                </ul>
            </div>
        </div>
        <div class="container mt-5">
            <form>
                <!-- Informasi Umum -->
                <div id="informasi-umum" class="form-section active">
                    <h4>Informasi Umum</h4>
                     <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
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
                        <label for="pkk_rw" class="form-label">Kelompok PKK RW</label>
                        <select class="form-select" id="pkk_rw">
                            <option selected disabled>Pilih RW</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun">
                    </div>

                    <div class="mb-3">
                        <label for="pkk_dasa_wisma" class="form-label">Kelompok PKK Dasa Wisma</label>
                        <input type="text" class="form-control" id="pkk_dasa_wisma">
                    </div>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Ibu -->
                <div id="jumlah-ibu" class="form-section">
                   <h4 class="class-header">Jumlah Ibu</h4>

                    <div class="mb-3">
                        <label for="hamil" class="form-label">Hamil</label>
                        <input type="text" class="form-control" id="hamil">
                    </div>

                    <div class="mb-3">
                        <label for="melahirkan" class="form-label">Melahirkan</label>
                        <input type="text" class="form-control" id="melahirkan">
                    </div>

                    <div class="mb-3">
                        <label for="nifas" class="form-label">Nifas</label>
                        <input type="text" class="form-control" id="nifas">
                    </div>

                    <div class="mb-3">
                        <label for="meninggal" class="form-label">Meninggal</label>
                        <input type="text" class="form-control" id="meninggal">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah bayi -->
                <div id="jumlah-bayi" class="form-section">
                    <h4 class="class-header">Jumlah Bayi</h4>

                    <div class="mb-3">
                        <label for="lahir_laki" class="form-label">Lahir laki-laki</label>
                        <input type="text" class="form-control" id="lahir_laki">
                    </div>

                    <div class="mb-3">
                        <label for="lahir_perempuan" class="form-label">Lahir perempuan</label>
                        <input type="text" class="form-control" id="lahir_perempuan">
                    </div>

                    <div class="mb-3">
                        <label for="akte_kelahiran" class="form-label">Memiliki Akte Kelahiran</label>
                        <input type="text" class="form-control" id="akte_kelahiran">
                    </div>                    
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Sumber Air -->
                <div id="jumlah-balita" class="form-section">
                    <h4 class="class-header">Jumlah Balita</h4>

                    <div class="mb-3">
                        <label for="meninggal_laki" class="form-label">Meninggal laki-laki</label>
                        <input type="text" class="form-control" id="meninggal_laki">
                    </div>

                    <div class="mb-3">
                        <label for="meninggal_perempuan" class="form-label">Meninggal perempuan</label>
                        <input type="text" class="form-control" id="meninggal_perempuan">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Makanan Pokok -->
                <div id="keterangan" class="form-section">
                    <h4 class="class-header">Isikan keterangan</h4>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>                    
                    <button type="button" class="btn btn-primary back">Submit</button>
                </div>
            </form>
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