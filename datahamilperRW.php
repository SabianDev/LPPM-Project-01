<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA IBU HAMIL PER RW</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        /* Tambahkan margin bawah untuk ruang lebih */
        .main-content {
            margin-bottom: 100px; /* Atur nilai sesuai kebutuhan */
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
                <h4>Navigation</h4>
                <ul>
                    <li><a href="#" class="nav-link" data-target="informasi-kelurahan">Informasi Kelurahan</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-ibu">Jumlah Ibu</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-bayi">Jumlah Bayi</a></li>
                    <li><a href="#" class="nav-link" data-target="jumlah-balita">Jumlah Balita</a></li>
                    <li><a href="#" class="nav-link" data-target="keterangan-opsional">Keterangan *Opsional</a></li>
                </ul>
            </div>
        </div>
    
        <div class="container mt-5">
            <form>
                <!-- Informasi Kelurahan -->
                <div class="form-section active" id="informasi-kelurahan">
                    <h5 class="text-center">CATATAN IBU HAMIL,KELAHIRAN,KEMATIAN BAYI,KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK PKK RW  <p>KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</p></h5>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-control" id="kelurahan">
                            <option value="">Pilih</option>
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
                        <label for="rw" class="form-label">Kelompok PKK RW</label>
                        <select class="form-control" id="rw">
                            <option value="">Pilih</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="kelompok" class="form-label">Nama Kelompok Dasawisma</label>
                        <input type="text" class="form-control" id="kelompok" placeholder="Masukkan Nama Kelompok Dasawisma">
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Ibu -->
                <div class="form-section" id="jumlah-ibu">
                    <h4 class="mt-4">Jumlah Ibu</h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                        <div class="col-md-12">
                            <label for="hamil" class="form-label">Hamil</label>
                            <input type="number" class="form-control" id="hamil" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="melahirkan" class="form-label">Melahirkan</label>
                            <input type="number" class="form-control" id="melahirkan" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="nifas" class="form-label">Nifas</label>
                            <input type="number" class="form-control" id="nifas" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="ibuMeninggal" class="form-label">Meninggal</label>
                            <input type="number" class="form-control" id="ibuMeninggal" placeholder="Jawaban Anda">
                        </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Bayi -->
                <div class="form-section" id="jumlah-bayi">
                    <h4 class="mt-4">Jumlah Bayi</h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="lahirLaki" class="form-label">Lahir Laki-Laki</label>
                            <input type="number" class="form-control" id="lahirLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="lahirPerempuan" class="form-label">Lahir Perempuan</label>
                            <input type="number" class="form-control" id="lahirPerempuan" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="akteAda" class="form-label">Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="akteAda" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="akteTidakAda" class="form-label">Tidak Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="akteTidakAda" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="bayiMeninggalLaki" class="form-label">Meninggal Laki-Laki</label>
                            <input type="number" class="form-control" id="bayiMeninggalLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="bayiMeninggalPerempuan" class="form-label">Meninggal Perempuan</label>
                            <input type="number" class="form-control" id="bayiMeninggalPerempuan" placeholder="Jawaban Anda">
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Jumlah Balita -->
                <div class="form-section" id="jumlah-balita">
                    <h4 class="mt-4">Jumlah Balita</h4>
                    <em class="mt-4">Catatan : Isi dengan angka</em>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="balitaMeninggalLaki" class="form-label">Meninggal Laki-Laki</label>
                            <input type="number" class="form-control" id="balitaMeninggalLaki" placeholder="Jawaban Anda">
                        </div>
                        <div class="col-md-12">
                            <label for="balitaMeninggalPerempuan" class="form-label">Meninggal Perempuan</label>
                            <input type="number" class="form-control" id="balitaMeninggalPerempuan" placeholder="Jawaban Anda">
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-secondary back">Kembali</button>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Opsional -->
                <div class="form-section" id="keterangan-opsional">
                    <h4 class="mt-4">Keterangan *Opsional</h4>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Isi jika diperlukan</label>
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

            function validateForm() {
                for (let i = 0; i < sections.length - 1; i++) { // Exclude the last section (optional)
                    const inputs = sections[i].querySelectorAll('input, select');
                    for (let input of inputs) {
                        if (input.value.trim() === '') {
                            currentSectionIndex = i;
                            showSection(currentSectionIndex);
                            alert('Harap isi semua kolom yang diperlukan.');
                            return false;
                        }
                    }
                }
                return true;
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

            document.querySelector('form').addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                }
            });

            showSection(currentSectionIndex);
        });
    </script>
</body>
</html>