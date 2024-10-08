<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PKK dan Dasa Wisma</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="style.css" rel="stylesheet">
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
        <h1 class="text-center mb-4">Form Data PKK RW</h1>
    </header>
    
    <div class="main-content">
        <div class="ctn-nav">
            <div class="navigation">
                <h4>List Form</h4>
                <ul>
                    <li><a href="#" class="nav-link" data-target="informasi-kelurahan">Informasi Kelurahan</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-anggota-keluarga">Jumlah Anggota Keluarga</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-kriteria-rumah">Jumlah Kriteria Rumah</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-sumber-air">Jumlah Sumber Air</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-makanan-pokok">Jumlah Makanan Pokok</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-kegiatan">Jumlah Kegiatan</a></li>
                    <li><a href="#" class="nav-link" data-target="opsional">Opsional</a></li>
                </ul>
            </div>
        </div>
    
        <div class="container mt-5">
            <form>   
                <!-- Informasi Umum -->
                <div id="informasi-umum" class="form-section active">
                <h4>Form Catatan Data dan Kegiatan Warga</h4>
                <p>Form ini digunakan untuk mengetahui dan rekapitulasi jumlah, keadaan, dan kegiatan-kegiatan yang diikuti oleh anggota keluarga. Pendataan dilakukan pada kelompok RT. Data kegiatan tersebut meliputi:</p>
                <ol>
                    <li>Data Umum TP PKK</li>
                    <li>Data Kegiatan Pokja I</li>
                    <li>Data Kegiatan Pokja II</li>
                    <li>Data Kegiatan Pokja III</li>
                    <li>Data Kegiatan Pokja IV</li>
                    <li>Data Posyandu</li>
                </ol>
                    <h4>Informasi Kelurahan</h4>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">KELURAHAN</label>
                        <select class="form-control" id="kelurahan">
                            <option value="" disabled selected>PILIH KELURAHAN</option>
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
                        <label for="AnggotaPKKRW" class="form-label">Anggota PKK RW</label>
                        <select class="form-control" id="AnggotaPKKRW">
                            <option value="" disabled selected>PILIH ANGGOTA PKK RW</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="AnggotaPKKRT" class="form-label">Anggota PKK RT</label>
                        <select class="form-control" id="AnggotaPKKRT">
                            <option value="" disabled selected>PILIH ANGGOTA PKK RT</option>
                            <?php for ($i = 1; $i <= 15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                                    <?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">TAHUN</label>
                        <input type="number" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select class="form-control" id="bulan">
                        <option value="" disabled selected>PILIH BULAN</option>
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
                        <label for="NoRW" class="form-label">No. RW</label>
                        <input type="text" class="form-control" id="NoRW" placeholder="Masukkan No. RW">
                    </div>
                    <div class="mb-3">
                        <label for="JUMLAH DASA WISMA" class="form-label">JUMLAH DASA WISMA</label>
                        <input type="text" class="form-control" id="JUMLAHDASAWISMA" placeholder="Masukkan JUMLAH DASA WISMA">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahRT" class="form-label">JUMLAH RT</label>
                        <input type="number" class="form-control" id="jumlahRT" placeholder="Masukkan JUMLAH RT">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKK" class="form-label">JUMLAH KK</label>
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
                        <input type="number" class="form-control" id="totalLakiLaki" placeholder="Masukan Jumlah Total Laki-Laki">
                    </div>
                    <div class="mb-3">
                        <label for="totalPerempuan" class="form-label">Total Perempuan</label>
                        <input type="number" class="form-control" id="totalPerempuan" placeholder="Masukan Jumlah Total Perempuan">
                    </div>
                    <div class="mb-3">
                        <label for="balitaLakiLaki" class="form-label">Balita Laki-Laki</label>
                        <input type="number" class="form-control" id="balitaLakiLaki" placeholder="Masukan Jumlah Balita Laki-Laki">
                    </div>
                    <div class="mb-3">
                        <label for="balitaPerempuan" class="form-label">Balita Perempuan</label>
                        <input type="number" class="form-control" id="balitaPerempuan" placeholder="Masukan Jumlah Balita Perempuan">
                    </div>
                    <div class="mb-3">
                        <label for="pus" class="form-label">Pasangan Usia Subur (PUS)</label>
                        <input type="number" class="form-control" id="pus" placeholder="Masukan Jumlah Pasangan Usia Subur (PUS)">
                    </div>
                    <div class="mb-3">
                        <label for="wus" class="form-label">Wanita Usia Subur (WUS)</label>
                        <input type="number" class="form-control" id="wus" placeholder="Masukan Jumlah Wanita Usia Subur (WUS)">
                    </div>
                    <div class="mb-3">
                        <label for="ibuHamil" class="form-label">Ibu Hamil</label>
                        <input type="number" class="form-control" id="ibuHamil" placeholder="Masukan Jumlah Ibu Hamil">
                    </div>
                    <div class="mb-3">
                        <label for="ibuMenyusui" class="form-label">Ibu Menyusui</label>
                        <input type="number" class="form-control" id="ibuMenyusui" placeholder="Masukan Jumlah Ibu Menyusui">
                    </div>
                    <div class="mb-3">
                        <label for="lansia" class="form-label">LANSIA</label>
                        <input type="number" class="form-control" id="lansia" placeholder="Masukan Jumlah LANSIA">
                    </div>
                    <div class="mb-3">
                        <label for="buta" class="form-label">3 Buta</label>
                        <input type="number" class="form-control" id="buta" placeholder="Masukan Jumlah 3 Buta">
                    </div>
                    <div class="mb-3">
                        <label for="kebutuhanKhusus" class="form-label">Berkebutuhan Khusus</label>
                        <input type="number" class="form-control" id="kebutuhanKhusus" placeholder="Masukan JumlahBerkebutuhan Khusus">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Kriteria Rumah -->
                <div class="form-section" id="jumlah-kriteria-rumah">
                    <h3>Jumlah Kriteria Rumah</h3>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="rumahSehat" class="form-label">Sehat</label>
                        <input type="number" class="form-control" id="rumahSehat" placeholder="Masukan Jumlah Sehat">
                    </div>
                    <div class="mb-3">
                        <label for="rumahKurangSehat" class="form-label">Kurang Sehat</label>
                        <input type="number" class="form-control" id="rumahKurangSehat" placeholder="Masukan Jumlah Kurang Sehat">
                    </div>
                    <div class="mb-3">
                        <label for="tempatSampah" class="form-label">Memiliki Tempat Pembuangan Sampah</label>
                        <input type="number" class="form-control" id="tempatSampah" placeholder="Masukan Jumlah Memiliki Tempat Pembuangan Sampah">
                    </div>
                    <div class="mb-3">
                        <label for="spal" class="form-label">Memiliki SPAL</label>
                        <input type="number" class="form-control" id="spal" placeholder="Masukan Jumlah Memiliki SPAL">
                    </div>
                    <div class="mb-3">
                        <label for="jamban" class="form-label">Memiliki Jamban Keluarga</label>
                        <input type="number" class="form-control" id="jamban" placeholder="Masukan Jumlah Memiliki Jamban Keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="stikerP4K" class="form-label">Menempel Stiker P4K</label>
                        <input type="number" class="form-control" id="stikerP4K" placeholder="Masukan Jumlah Menempel Stiker P4K">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Sumber Air Keluarga -->
                <div class="form-section" id="jumlah-sumber-air">
                    <h3>Jumlah Sumber Air Keluarga</h3>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="pdam" class="form-label">PDAM</label>
                        <input type="number" class="form-control" id="pdam" placeholder="Masukkan Jumlah PDAM">
                    </div>
                    <div class="mb-3">
                        <label for="sumur" class="form-label">SUMUR</label>
                        <input type="number" class="form-control" id="sumur" placeholder="Masukkan Jumlah SUMUR">
                    </div>
                    <div class="mb-3">
                        <label for="dll" class="form-label">DLL</label>
                        <input type="number" class="form-control" id="dll" placeholder="Masukkan Jumlah DLL">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Makanan Pokok Warga -->
                <div class="form-section" id="jumlah-makanan-pokok">
                    <h3>Jumlah Makanan Pokok Warga</h3>
                    <p class="text-muted">*Isi dengan angka</p>
                    <div class="mb-3">
                        <label for="beras" class="form-label">Beras</label>
                        <input type="number" class="form-control" id="beras" placeholder="Masukkan Jumlah Warga yang Konsumsi Beras">
                    </div>
                    <div class="mb-3">
                        <label for="non-beras" class="form-label">Non Beras</label>
                        <input type="number" class="form-control" id="non-beras" placeholder="Masukkan Jumlah Warga yang Konsumsi Non Beras">
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
                        <input type="number" class="form-control" id="up2k">
                    </div>
                    <div class="mb-3">
                        <label for="pemanfaatanTanah" class="form-label">Pemanfaatan Tanah Pekarangan</label>
                        <input type="number" class="form-control" id="pemanfaatanTanah" placeholder="Masukkan Jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="industriRumahTangga" class="form-label">Industri Rumah Tangga</label>
                        <input type="number" class="form-control" id="industriRumahTangga" placeholder="Masukkan Jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="kesehatanLingkungan" class="form-label">Kesehatan Lingkungan</label>
                        <input type="number" class="form-control" id="kesehatanLingkungan" placeholder="Masukkan Jumlah">
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