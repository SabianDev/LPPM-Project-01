<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATATAN DASA WISMA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .form-section .form-label {
            display: block;
            margin-bottom: 0.5rem;
        }
        .form-section input[type="radio"] {
            display: inline-block; /* Ubah dari block ke inline-block */
            margin-bottom: 0.5rem;
        }
        .form-section label {
            display: inline-block; /* Tambahkan ini untuk label */
            margin-right: 1rem; /* Tambahkan jarak antara radio button dan label berikutnya */
        }
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
                    <li><a href="#" class="nav-link" data-target="informasi-data">Informasi Data</a></li>
                    <li><a href="#" class="nav-link" data-target="kegiatan-pkk">Kegiatan PKK yang Diikuti</a></li>
                    <li><a href="#" class="nav-link" data-target="bagian-isi">Bagian Isian</a></li>
                </ul>
            </div>
        </div>
    
        <div class="container mt-5">
            <form>
                <!-- Informasi Data -->
                <div class="form-section active" id="informasi-data">
                    <h4 class="text-center">CATATAN DATA KEGIATAN WARGA KELOMPOK DASA WISMA <p>KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</p></h4>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label for="kelompok" class="form-label">Kelompok Dasa Wisma</label>
                        <input type="text" class="form-control" id="kelompok" placeholder="Masukkan Kelompok Dasa Wisma">
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="text" class="form-control" id="tahun" placeholder="Masukkan Tahun">
                    </div>
                    <div class="mb-3">
                        <label for="namaAnggota" class="form-label">Nama Anggota Keluarga</label>
                        <input type="text" class="form-control" id="namaAnggota" placeholder="Masukkan Nama Anggota Keluarga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Perkawinan</label>
                        <div>
                            <input type="radio" id="menikah" name="statusPerkawinan" value="Menikah">
                            <label for="menikah">Menikah</label>
                            <input type="radio" id="belumMenikah" name="statusPerkawinan" value="Belum Menikah">
                            <label for="belumMenikah">Belum Menikah</label>
                            <input type="radio" id="ceraiMati" name="statusPerkawinan" value="Cerai Mati">
                            <label for="ceraiMati">Cerai Mati</label>
                            <input type="radio" id="ceraiHidup" name="statusPerkawinan" value="Cerai Hidup">
                            <label for="ceraiHidup">Cerai Hidup</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <input type="radio" id="lakiLaki" name="jenisKelamin" value="Laki-Laki">
                            <label for="lakiLaki">Laki-Laki</label>
                            <input type="radio" id="perempuan" name="jenisKelamin" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatLahir" placeholder="Masukkan Tempat Lahir">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="text" class="form-control" id="umur" placeholder="Masukkan Umur">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <div>
                            <input type="radio" id="islam" name="agama" value="Islam">
                            <label for="islam">Islam</label>
                            <input type="radio" id="kristen" name="agama" value="Kristen">
                            <label for="kristen">Kristen</label>
                            <input type="radio" id="katolik" name="agama" value="Katolik">
                            <label for="katolik">Katolik</label>
                            <input type="radio" id="hindu" name="agama" value="Hindu">
                            <label for="hindu">Hindu</label>
                            <input type="radio" id="budha" name="agama" value="Budha">
                            <label for="budha">Budha</label>
                            <input type="radio" id="khonghucu" name="agama" value="Khonghucu">
                            <label for="khonghucu">Khonghucu</label>
                            <input type="radio" id="agamaLainnya" name="agama" value="Lainnya">
                            <label for="agamaLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="agamaLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan</label>
                        <div>
                            <input type="radio" id="sd" name="pendidikan" value="SD">
                            <label for="sd">SD</label>
                            <input type="radio" id="smp" name="pendidikan" value="SMP">
                            <label for="smp">SMP</label>
                            <input type="radio" id="sma" name="pendidikan" value="SMA">
                            <label for="sma">SMA</label>
                            <input type="radio" id="s1" name="pendidikan" value="S1">
                            <label for="s1">S1</label>
                            <input type="radio" id="s2" name="pendidikan" value="S2">
                            <label for="s2">S2</label>
                            <input type="radio" id="s3" name="pendidikan" value="S3">
                            <label for="s3">S3</label>
                            <input type="radio" id="pendidikanLainnya" name="pendidikan" value="Lainnya">
                            <label for="pendidikanLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="pendidikanLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <div>
                            <input type="radio" id="asn" name="pekerjaan" value="ASN">
                            <label for="asn">ASN</label>
                            <input type="radio" id="tniPolri" name="pekerjaan" value="TNI/Polri">
                            <label for="tniPolri">TNI/Polri</label>
                            <input type="radio" id="pegawaiSwasta" name="pekerjaan" value="Pegawai Swasta">
                            <label for="pegawaiSwasta">Pegawai Swasta</label>
                            <input type="radio" id="wiraswasta" name="pekerjaan" value="Wiraswasta">
                            <label for="wiraswasta">Wiraswasta</label>
                            <input type="radio" id="mengurusRumahTangga" name="pekerjaan" value="Mengurus Rumah Tangga">
                            <label for="mengurusRumahTangga">Mengurus Rumah Tangga</label>
                            <input type="radio" id="pelajar" name="pekerjaan" value="Pelajar">
                            <label for="pelajar">Pelajar</label>
                            <input type="radio" id="mahasiswa" name="pekerjaan" value="Mahasiswa">
                            <label for="mahasiswa">Mahasiswa</label>
                            <input type="radio" id="pekerjaanLainnya" name="pekerjaan" value="Lainnya">
                            <label for="pekerjaanLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="pekerjaanLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Berkebutuhan Khusus</label>
                        <div>
                            <input type="radio" id="fisik" name="berkebutuhanKhusus" value="Fisik">
                            <label for="fisik">Fisik</label>
                            <input type="radio" id="mental" name="berkebutuhanKhusus" value="Mental">
                            <label for="mental">Mental</label>
                            <input type="radio" id="intelektual" name="berkebutuhanKhusus" value="Intelektual">
                            <label for="intelektual">Intelektual</label>
                            <input type="radio" id="sensorik" name="berkebutuhanKhusus" value="Sensorik">
                            <label for="sensorik">Sensorik</label>
                            <input type="radio" id="berkebutuhanKhususLainnya" name="berkebutuhanKhusus" value="Lainnya">
                            <label for="berkebutuhanKhususLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="berkebutuhanKhususLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Kegiatan PKK -->
                <div class="form-section" id="kegiatan-pkk">
                    <h4 class="mt-4">Kegiatan PKK yang Diikuti</h4>
                    <em class="mt-4">Isi dengan Ya/Tidak</em>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label class="form-label">Penghayatan dan Pengamalan Pancasila</label>
                        <div>
                            <input type="radio" id="pancasilaYa" name="pancasila" value="Ya">
                            <label for="pancasilaYa">Ya</label>
                            <input type="radio" id="pancasilaTidak" name="pancasila" value="Tidak">
                            <label for="pancasilaTidak">Tidak</label>
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Gotong Royong</label>
                        <div>
                            <input type="radio" id="gotongRoyongYa" name="gotongRoyong" value="Ya">
                            <label for="gotongRoyongYa">Ya</label>
                            <input type="radio" id="gotongRoyongTidak" name="gotongRoyong" value="Tidak">
                            <label for="gotongRoyongTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan dan Keterampilan</label>
                        <div>
                            <input type="radio" id="pendidikanYa" name="pendidikan" value="Ya">
                            <label for="pendidikanYa">Ya</label>
                            <input type="radio" id="pendidikanTidak" name="pendidikan" value="Tidak">
                            <label for="pendidikanTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengembangan Kehidupan Berkoperasi</label>
                        <div>
                            <input type="radio" id="koperasiYa" name="koperasi" value="Ya">
                            <label for="koperasiYa">Ya</label>
                            <input type="radio" id="koperasiTidak" name="koperasi" value="Tidak">
                            <label for="koperasiTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pangan</label>
                        <div>
                            <input type="radio" id="panganYa" name="pangan" value="Ya">
                            <label for="panganYa">Ya</label>
                            <input type="radio" id="panganTidak" name="pangan" value="Tidak">
                            <label for="panganTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sandang</label>
                        <div>
                            <input type="radio" id="sandangYa" name="sandang" value="Ya">
                            <label for="sandangYa">Ya</label>
                            <input type="radio" id="sandangTidak" name="sandang" value="Tidak">
                            <label for="sandangTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kesehatan</label>
                        <div>
                            <input type="radio" id="kesehatanYa" name="kesehatan" value="Ya">
                            <label for="kesehatanYa">Ya</label>
                            <input type="radio" id="kesehatanTidak" name="kesehatan" value="Tidak">
                            <label for="kesehatanTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Perencanaan Sehat</label>
                        <div>
                            <input type="radio" id="perencanaanSehatYa" name="perencanaanSehat" value="Ya">
                            <label for="perencanaanSehatYa">Ya</label>
                            <input type="radio" id="perencanaanSehatTidak" name="perencanaanSehat" value="Tidak">
                            <label for="perencanaanSehatTidak">Tidak</label>
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Bagian Isian -->
                <div class="form-section" id="bagian-isi">
                    <h4 class="mt-4">Bagian Isian</h4>
                    <em class="mt-4">Isi sesuai Keperluan</em>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label class="form-label">Rumah Layak Huni</label>
                        <div>
                            <input type="radio" id="layakHuni" name="kriteriaRumah" value="kriteriaRumah">
                            <label for="layakHuni">Layak Huni</label>
                            <input type="radio" id="tidakLayakHuni" name="kriteriaRumah" value="Tidak Layak Huni">
                            <label for="tidakLayakHuni">Tidak Layak Huni</label>
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Jamban Keluarga</label>
                        <div>
                            <input type="radio" id="jambanAda" name="jambanKeluarga" value="Ada">
                            <label for="jambanAda">Ada</label>
                            <input type="radio" id="jambanTidakAda" name="jambanKeluarga" value="Tidak Ada">
                            <label for="jambanTidakAda">Tidak Ada</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Jamban Keluarga</label>
                        <input type="number" class="form-control" id="jumlahJamban" placeholder="Jumlah Jamban Keluarga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sumber Air</label>
                        <div>
                            <input type="radio" id="pdam" name="sumberAir" value="PDAM">
                            <label for="pdam">PDAM</label>
                            <input type="radio" id="sumur" name="sumberAir" value="Sumur">
                            <label for="sumur">Sumur</label>
                            <input type="radio" id="sumberAirLainnya" name="sumberAir" value="Lainnya">
                            <label for="sumberAirLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Memiliki Tempat Sampah</label>
                        <div>
                            <input type="radio" id="tempatSampahYa" name="tempatSampah" value="Ya">
                            <label for="tempatSampahYa">Ya</label>
                            <input type="radio" id="tempatSampahTidak" name="tempatSampah" value="Tidak">
                            <label for="tempatSampahTidak">Tidak</label>
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
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