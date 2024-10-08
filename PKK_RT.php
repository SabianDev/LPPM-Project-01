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
                    <li><a href="#" class="nav-link" data-target="jumlah-anggota-keluarga">Jumlah Anggota Keluarga</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-rumah">Jumlah Rumah</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-sumber-air">Jumlah Sumber Air</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-makanan-pokok">Jumlah Makanan Pokok</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-warga-kegiatan">Jumlah Warga Mengikuti Kegiatan</a></li>
                    <li><a href="#" class="nav-link" data-target="opsional">Opsional</a></li>
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
                        <select class="form-control" id="kelurahan">
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
                        <label for="kelompokPKKRW" class="form-label">Kelompok PKK RW</label>
                        <select class="form-control" id="kelompokPKKRW">
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kelompokPKKRT" class="form-label">Kelompok PKK RT</label>
                        <select class="form-control" id="kelompokPKKRT">
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select class="form-control" id="bulan">
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
                        <label for="namaDasaWisma" class="form-label">Nama Dasa Wisma</label>
                        <input type="text" class="form-control" id="namaDasaWisma" placeholder="Masukkan Nama Dasa Wisma">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKRT" class="form-label">Jumlah KRT</label>
                        <input type="number" class="form-control" id="jumlahKRT" placeholder="Masukkan Jumlah KRT">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKK" class="form-label">Jumlah KK</label>
                        <input type="number" class="form-control" id="jumlahKK" placeholder="Masukkan Jumlah KK">
                    </div>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Anggota Keluarga -->
                <div id="jumlah-anggota-keluarga" class="form-section">
                    <h4>Jumlah Anggota Keluarga</h4>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="totalLakiLaki" class="form-label">Total Laki-Laki</label>
                        <input type="number" class="form-control" id="totalLakiLaki" placeholder="Masukkan Jumlah Total Laki-Laki">
                    </div>
                    <div class="mb-3">
                        <label for="totalPerempuan" class="form-label">Total Perempuan</label>
                        <input type="number" class="form-control" id="totalPerempuan" placeholder="Masukkan Jumlah Total Perempuan">
                    </div>
                    <div class="mb-3">
                        <label for="balitaLakiLaki" class="form-label">Balita Laki-Laki</label>
                        <input type="number" class="form-control" id="balitaLakiLaki" placeholder="Masukkan Jumlah Balita Laki-Laki">
                    </div>
                    <div class="mb-3">
                        <label for="balitaPerempuan" class="form-label">Balita Perempuan</label>
                        <input type="number" class="form-control" id="balitaPerempuan" placeholder="Masukkan Jumlah Balita Perempuan">
                    </div>
                    <div class="mb-3">
                        <label for="pus" class="form-label">Pasangan Usia Subur (PUS)</label>
                        <input type="number" class="form-control" id="pus" placeholder="Masukkan Jumlah Pasangan Usia Subur">
                    </div>
                    <div class="mb-3">
                        <label for="wus" class="form-label">Wanita Usia Subur (WUS)</label>
                        <input type="number" class="form-control" id="wus" placeholder="Masukkan Jumlah Wanita Usia Subur">
                    </div>
                    <div class="mb-3">
                        <label for="ibuHamil" class="form-label">Ibu Hamil</label>
                        <input type="number" class="form-control" id="ibuHamil" placeholder="Masukkan Jumlah Ibu Hamil">
                    </div>
                    <div class="mb-3">
                        <label for="ibuMenyusui" class="form-label">Ibu Menyusui</label>
                        <input type="number" class="form-control" id="ibuMenyusui" placeholder="Masukkan Jumlah Ibu Menyusui">
                    </div>
                    <div class="mb-3">
                        <label for="lansia" class="form-label">Lansia</label>
                        <input type="number" class="form-control" id="lansia" placeholder="Masukkan Jumlah Lansia">
                    </div>
                    <div class="mb-3">
                        <label for="buta" class="form-label">3 Buta</label>
                        <input type="number" class="form-control" id="buta" placeholder="Masukkan Jumlah 3 Buta">
                    </div>
                    <div class="mb-3">
                        <label for="kebutuhanKhusus" class="form-label">Berkebutuhan Khusus</label>
                        <input type="number" class="form-control" id="kebutuhanKhusus" placeholder="Masukkan Jumlah Berkebutuhan Khusus">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Rumah -->
                <div id="jumlah-rumah" class="form-section">
                    <h4>Jumlah Rumah</h4>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="rumahSehat" class="form-label">Sehat</label>
                        <input type="number" class="form-control" id="rumahSehat" placeholder="Masukkan Jumlah Rumah Sehat">
                    </div>
                    <div class="mb-3">
                        <label for="rumahKurangSehat" class="form-label">Kurang Sehat</label>
                        <input type="number" class="form-control" id="rumahKurangSehat" placeholder="Masukkan Jumlah Rumah Kurang Sehat">
                    </div>
                    <div class="mb-3">
                        <label for="tempatSampah" class="form-label">Memiliki Tempat Pembuangan Sampah</label>
                        <input type="number" class="form-control" id="tempatSampah" placeholder="Masukkan Jumlah Memiliki Tempat Pembuangan Sampah">
                    </div>
                    <div class="mb-3">
                        <label for="spal" class="form-label">Memiliki SPAL</label>
                        <input type="number" class="form-control" id="spal" placeholder="Masukkan Jumlah Memiliki SPAL">
                    </div>
                    <div class="mb-3">
                        <label for="jamban" class="form-label">Memiliki Jamban Keluarga</label>
                        <input type="number" class="form-control" id="jamban" placeholder="Masukkan Jumlah Memiliki Jamban Keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="stikerP4K" class="form-label">Menempel Stiker P4K</label>
                        <input type="number" class="form-control" id="stikerP4K" placeholder="Masukkan Jumlah Menempel Stiker P4K">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Sumber Air -->
                <div id="jumlah-sumber-air" class="form-section">
                    <h4>Jumlah Sumber Air Keluarga</h4>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="pdam" class="form-label">PDAM</label>
                        <input type="number" class="form-control" id="pdam" placeholder="Masukkan Jumlah PDAM">
                    </div>
                    <div class="mb-3">
                        <label for="sumur" class="form-label">Sumur</label>
                        <input type="number" class="form-control" id="sumur" placeholder="Masukkan Jumlah Sumur">
                    </div>
                    <div class="mb-3">
                        <label for="dll" class="form-label">DLL</label>
                        <input type="number" class="form-control" id="dll" placeholder="Masukkan Jumlah DLL">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Makanan Pokok -->
                <div id="jumlah-makanan-pokok" class="form-section">
                    <h4>Jumlah Makanan Pokok</h4>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="beras" class="form-label">Beras</label>
                        <input type="number" class="form-control" id="beras" placeholder="Masukkan Jumlah Beras">
                    </div>
                    <div class="mb-3">
                        <label for="nonBeras" class="form-label">Non Beras</label>
                        <input type="number" class="form-control" id="nonBeras" placeholder="Masukkan Jumlah Non Beras">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Warga Mengikuti Kegiatan -->
                <div id="jumlah-warga-kegiatan" class="form-section">
                    <h4>Jumlah Warga Mengikuti Kegiatan</h4>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="up2k" class="form-label">UP2K</label>
                        <input type="number" class="form-control" id="up2k" placeholder="Masukkan Jumlah UP2K">
                    </div>
                    <div class="mb-3">
                        <label for="pemanfaatanTanah" class="form-label">Pemanfaatan Tanah</label>
                        <input type="number" class="form-control" id="pemanfaatanTanah" placeholder="Masukkan Jumlah Pemanfaatan Tanah">
                    </div>
                    <div class="mb-3">
                        <label for="industriRumahTangga" class="form-label">Industri Rumah Tangga</label>
                        <input type="number" class="form-control" id="industriRumahTangga" placeholder="Masukkan Jumlah Industri Rumah Tangga">
                    </div>
                    <div class="mb-3">
                        <label for="kesehatanLingkungan" class="form-label">Kesehatan Lingkungan</label>
                        <input type="number" class="form-control" id="kesehatanLingkungan" placeholder="Masukkan Jumlah Kesehatan Lingkungan">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Opsional -->
                <div id="opsional" class="form-section">
                    <h4>Opsional</h4>
                    <p class="text-muted">*Isi jika dibutuhkan</p>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
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