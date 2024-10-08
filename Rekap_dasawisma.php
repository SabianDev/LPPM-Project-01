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
                    <li><a href="#" class="nav-link" data-target="jumlah-anggota-keluarga">Tabel</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-rumah">Kriteria</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-sumber-air">Kegiatan warga</a></li>
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
                        </select>                    </div>
                    <div class="mb-3">
                        <label for="pkk_rt" class="form-label">Kelompok PKK RT</label>
                        <select class="form-select" id="pkk_rt">
                            <option selected disabled>Pilih RT</option>
                            <?php for($i=1; $i<=15; $i++): ?>
                                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pkk_dasa_wisma" class="form-label">Kelompok PKK Dasa Wisma</label>
                        <input type="text" class="form-control" id="pkk_dasa_wisma">
                    </div>

                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun">
                    </div>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Table -->
                <div id="jumlah-anggota-keluarga" class="form-section">
                                        <h4 class="class-header">Tabel</h4>

                    <div class="mb-3">
                        <label for="no_reg" class="form-label">No. Reg (RW.RT.Dasa Wisma. No Rumah. No Urut KK. No Anggota Keluarga)</label>
                        <input type="text" class="form-control" id="no_reg" placeholder="Contoh: 01.03.003.05.01.03">
                    </div>

                    <div class="mb-3">
                        <label for="nama_kk" class="form-label">Nama Kepala Keluarga (KK)</label>
                        <input type="text" class="form-control" id="nama_kk">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_kk" class="form-label">Jumlah KK</label>
                        <input type="text" class="form-control" id="jumlah_kk">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Kesehatan dan kelayakan hunian -->
                <div id="jumlah-rumah" class="form-section">
                    <h4 class="class-header">Kriteria</h4>

                    <div class="mb-3">
                        <label class="form-label">Sehat dan layak huni</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sehat_layak_huni" id="sehat_layak_huni_ya" value="ya">
                                <label class="form-check-label" for="sehat_layak_huni_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sehat_layak_huni" id="sehat_layak_huni_tidak" value="tidak">
                                <label class="form-check-label" for="sehat_layak_huni_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Memiliki tempat pembuangan sampah</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah_ya" value="ya">
                                <label class="form-check-label" for="tempat_sampah_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tempat_sampah" id="tempat_sampah_tidak" value="tidak">
                                <label class="form-check-label" for="tempat_sampah_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Memiliki SPALi</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="spali" id="spali_ya" value="ya">
                                <label class="form-check-label" for="spali_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="spali" id="spali_tidak" value="tidak">
                                <label class="form-check-label" for="spali_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Memiliki jamban</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jamban" id="jamban_ya" value="ya">
                                <label class="form-check-label" for="jamban_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jamban" id="jamban_tidak" value="tidak">
                                <label class="form-check-label" for="jamban_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sumber air keluarga</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sumber_air_sumur" value="Sumur">
                                <label class="form-check-label" for="sumber_air_sumur">Sumur</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sumber_air_pdam" value="PDAM">
                                <label class="form-check-label" for="sumber_air_pdam">PDAM</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sumber_air_lainnya" value="Lainnya">
                                <label class="form-check-label" for="sumber_air_lainnya">Lainnya</label>
                                <input type="text" class="form-control mt-2" id="sumber_air_lainnya_text" placeholder="Sebutkan">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Makanan Pokok</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok_beras" value="Beras">
                                <label class="form-check-label" for="makanan_pokok_beras">Beras</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="makanan_pokok" id="makanan_pokok_non_beras" value="Non-Beras">
                                <label class="form-check-label" for="makanan_pokok_non_beras">Non-Beras</label>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Jumlah Sumber Air -->
                <div id="jumlah-sumber-air" class="form-section">
                     <h4 class="class-header">Warga Mengikuti Kegiatan</h4>

                    <div class="mb-3">
                        <label class="form-label">Kegiatan UP2K</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kegiatan_up2k" id="kegiatan_up2k_ya" value="ya">
                                <label class="form-check-label" for="kegiatan_up2k_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kegiatan_up2k" id="kegiatan_up2k_tidak" value="tidak">
                                <label class="form-check-label" for="kegiatan_up2k_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pemanfaatan Tanah Pekarangan</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pemanfaatan_tanah" id="pemanfaatan_tanah_ya" value="ya">
                                <label class="form-check-label" for="pemanfaatan_tanah_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pemanfaatan_tanah" id="pemanfaatan_tanah_tidak" value="tidak">
                                <label class="form-check-label" for="pemanfaatan_tanah_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Industri Rumah Tangga</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="industri_rumah" id="industri_rumah_ya" value="ya">
                                <label class="form-check-label" for="industri_rumah_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="industri_rumah" id="industri_rumah_tidak" value="tidak">
                                <label class="form-check-label" for="industri_rumah_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kerja Bakti</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kerja_bakti" id="kerja_bakti_ya" value="ya">
                                <label class="form-check-label" for="kerja_bakti_ya">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kerja_bakti" id="kerja_bakti_tidak" value="tidak">
                                <label class="form-check-label" for="kerja_bakti_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan">
                    </div>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Submit</button>
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