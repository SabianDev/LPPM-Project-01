<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA KELUARGA</title>
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
                    <li><a href="#" class="nav-link" data-target="informasi-data">Informasi Data</a></li>
                    <li><a href="#" class="nav-link" data-target="bagian-pilihan">Bagian Pilihan</a></li>
                </ul>
            </div>
        </div>
    
        <div class="container mt-5">
            <form>
                <!-- Informasi Data -->
                <div class="form-section active" id="informasi-data">
                    <h5 class="text-center"><strong>DATA KELUARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG</strong></p><strong>PROVINSI JAWA BARAT</strong></h5>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label"><strong>Kelurahan</strong></label>
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
                        <label for="rw" class="form-label"><strong>RW</strong></label>
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
                        <label for="rt" class="form-label"><strong>RT</strong></label>
                        <select class="form-control" id="rt">
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
                        <label for="dasadisma" class="form-label"><strong>Dasa Disma</strong></label>
                        <input type="text" class="form-control" id="dasadisma" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="kepalarumahtangga" class="form-label"><strong>Nama Kepala Rumah Tangga</strong></label>
                        <input type="text" class="form-control" id="kepalarumahtangga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="noreg" class="form-label"><strong>No. Reg (RW.RT.Dasa Wisma. No Rumah. No Urut KK. No Anggota Keluarga), Contoh: 01.03.003.05.01.03</strong></label>
                        <input type="text" class="form-control" id="noreg" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="anggotakeluarga" class="form-label"><strong>Nama Anggota Keluarga</strong></label>
                        <input type="text" class="form-control" id="anggotakeluarga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Status Dalam Keluarga</strong></label>
                        <div>
                            <input type="radio" id="kepalakeluarga" name="statusdalamkeluarga" value="Kepala Keluarga">
                            <label for="kepalakeluarga">Kepala Keluarga</label>
                            <input type="radio" id="istri" name="statusdalamkeluarga" value="Istri">
                            <label for="istri">Istri</label>
                            <input type="radio" id="anak" name="statusdalamkeluarga" value="Anak">
                            <label for="anak">Anak</label>
                            <input type="radio" id="statusLainnya" name="statusdalamkeluarga" value="Lainnya">
                            <label for="statusdalamkeluargaLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="statusdalamkeluargaLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statusdalamperkawinan" class="form-label"><strong>Status Dalam Perkawinan</strong></label>
                        <select class="form-control" id="statusdalamperkawinan">
                            <option value="">Pilih</option>
                            <option value="menikah">Menikah</option>
                            <option value="belumenikah">Belum Menikah</option>
                            <option value="ceraimati">Cerai Mati</option>
                            <option value="ceraihidup">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Jenis Kelamin</strong></label>
                        <div>
                            <input type="radio" id="lakilaki" name="jeniskelamin" value="Laki Laki">
                            <label for="lakilaki">Laki-Laki</label>
                            <input type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tempatlahir" class="form-label"><strong>Tempat Lahir</strong></label>
                        <input type="text" class="form-control" id="tempatlahir" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label"><strong>Tanggal Lahir</strong></label>
                        <input type="date" class="form-control" id="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label"><strong>Umur</strong></label>
                        <input type="text" class="form-control" id="umur" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Pendidikan</strong></label>
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
                        <label class="form-label"><strong>Pekerjaan</strong></label>
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
                        <label class="form-label"><strong>Kelompok Umur</strong></label>
                        <div>
                            <input type="radio" id="bayi" name="kelumur" value="Bayi">
                            <label for="bayi">Bayi (0-2 tahun)</label>
                            <input type="radio" id="balita" name="kelumur" value="Balita">
                            <label for="balita">Balita (3-5 tahun)</label>
                            <input type="radio" id="kanakkanak" name="kelumur" value="Kanak Kanak">
                            <label for="kanakkanak">Kanak-Kanak (6-10 tahun)</label>
                            <input type="radio" id="remaja" name="kelumur" value="Remaja">
                            <label for="remaja">Remaja (11-24 tahun)</label>
                            <input type="radio" id="dewasa" name="kelumur" value="Dewasa">
                            <label for="dewasa">Dewasa (25-59 tahun)</label>
                            <input type="radio" id="lansia" name="kelumur" value="Lansia">
                            <label for="lansia">Lansia (>59 tahun)</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Bumil (Orang)</strong></label>
                        <div>
                            <input type="radio" id="bumilYa" name="bumil" value="Ya">
                            <label for="bumilYa">Ya</label>
                            <input type="radio" id="bumilTidak" name="bumil" value="Tidak">
                            <label for="bumilTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Ibu Menyusui (Orang)</strong></label>
                        <div>
                            <input type="radio" id="ibumenyusuiYa" name="ibumenyusui" value="Ya">
                            <label for="ibumenyusuiYa">Ya</label>
                            <input type="radio" id="ibumenyusuiTidak" name="ibumenyusui" value="Tidak">
                            <label for="ibumenyusuiTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Apakah Pasangan Subur (PUS)</strong></label>
                        <div>
                            <input type="radio" id="pasangansuburYa" name="pasangansubur" value="Ya">
                            <label for="pasangansuburYa">Ya</label>
                            <input type="radio" id="pasangansuburTidak" name="pasangansubur" value="Tidak">
                            <label for="pasangansuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Apakah Termasuk Wanita Usia Subur (WUS)</strong></label>
                        <div>
                            <input type="radio" id="wanitausiasuburYa" name="wanitausiasubur" value="Ya">
                            <label for="wanitausiasuburYa">Ya</label>
                            <input type="radio" id="wanitausiasuburTidak" name="wanitausiasubur" value="Tidak">
                            <label for="wanitausiasuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Apa 3Buta</strong></label>
                        <div>
                            <input type="radio" id="butaYa" name="buta" value="Ya">
                            <label for="butaYa">Ya</label>
                            <input type="radio" id="butaTidak" name="buta" value="Tidak">
                            <label for="butaTidak">Tidak</label>
                        </div>
                    </div>
                    </fieldset>
                    <p></p>
                    <button type="button" class="btn btn-primary next">Next</button>
                </div>

                <!-- Form Bagian Pilihan -->
                <div class="form-section" id="bagian-pilihan">
                    <h4 class="mt-4"><strong>Bagian Piliha</strong></h4>
                    <fieldset class="row" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
                    <div class="mb-3">
                        <label class="form-label"><strong>3. Makanan Pokok Sehari-hari</strong></label>
                        <div>
                            <input type="radio" id="beras" name="makananPokok" value="Beras">
                            <label for="beras">Beras</label>
                            <input type="radio" id="nonberas" name="makananPokok" value="Beras">
                            <label for="nonberas">Beras</label>
                            <input type="radio" id="makananpokokLainnya" name="makananPokok" value="Lainnya">
                            <label for="makananpokokLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="makananpokokLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label"><strong>4. Mempunyai Jaminan Keluarga</strong></label>
                        <div>
                            <input type="radio" id="jaminanYa" name="jaminanKeluarga" value="Ya">
                            <label for="jaminanYa">Ya</label>
                            <input type="radio" id="jaminanTidak" name="jaminanKeluarga" value="Tidak">
                            <label for="jaminanTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>Jika ya, jumlah jaminan keluarga</strong></label>
                        <div>
                            <input type="radio" id="jumlahSatu" name="jumlahJaminan" value="1">
                            <label for="jumlahSatu">1</label>
                            <input type="radio" id="jumlahDua" name="jumlahJaminan" value="2">
                            <label for="jumlahDua">2</label>
                            <input type="radio" id="jumlahTiga" name="jumlahJaminan" value="3">
                            <label for="jumlahTiga">3</label>
                            <input type="radio" id="jumlahEmpat" name="jumlahJaminan" value="4">
                            <label for="jumlahEmpat">4</label>
                            <input type="radio" id="jumlahLima" name="jumlahJaminan" value="5">
                            <label for="jumlahLima">5</label>
                            <input type="radio" id="jumlahEnam" name="jumlahJaminan" value="6">
                            <label for="jumlahEnam">6</label>
                            <input type="radio" id="jumlahTujuh" name="jumlahJaminan" value="7">
                            <label for="jumlahTujuh">7</label>
                            <input type="radio" id="jumlahDelapan" name="jumlahJaminan" value="8">
                            <label for="jumlahDelapan">8</label>
                            <input type="radio" id="jumlahSembilan" name="jumlahJaminan" value="9">
                            <label for="jumlahSembilan">9</label>
                            <input type="radio" id="jumlahLainnya" name="jumlahJaminan" value="Lainnya">
                            <label for="jumlahLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="jumlahLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>5. Sumber Air Keluarga</strong></label>
                        <div>
                            <input type="radio" id="pdam" name="sumberAir" value="PDAM">
                            <label for="pdam">PDAM</label>
                            <input type="radio" id="sumur" name="sumberAir" value="Sumur">
                            <label for="sumur">Sumur</label>
                            <input type="radio" id="sungai" name="sumberAir" value="Sungai">
                            <label for="sungai">Sungai</label>
                            <input type="radio" id="sumberAirLainnya" name="sumberAir" value="Lainnya">
                            <label for="sumberAirLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>6. Memiliki Tempat Pembuangan Sampah</strong></strong></label>
                        <div>
                            <input type="radio" id="pembuanganSampahYa" name="pembuanganSampah" value="Ya">
                            <label for="pembuanganSampahYa">Ya</label>
                            <input type="radio" id="pembuanganSampahTidak" name="pembuanganSampah" value="Tidak">
                            <label for="pembuanganSampahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>7. Memiliki Saluran Pembuangan Air Limbah (SPAL)</strong></label>
                        <div>
                            <input type="radio" id="pembuanganAirLimbahYa" name="pembuanganAirLimbah" value="Ya">
                            <label for="pembuanganAirLimbahYa">Ya</label>
                            <input type="radio" id="pembuanganAirLimbahTidak" name="pembuanganAirLimbah" value="Tidak">
                            <label for="pembuanganAirLimbahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>8. Menempel Stiker P4K</strong></label>
                        <div>
                            <input type="radio" id="stikerYa" name="stiker" value="Ya">
                            <label for="stikerYa">Ya</label>
                            <input type="radio" id="stikerTidak" name="stiker" value="Tidak">
                            <label for="stikerTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>9. Kriteria Rumah</strong></label>
                        <div>
                            <input type="radio" id="kriteriaSehat" name="kriteriaRumah" value="Sehat">
                            <label for="kriteriaSehat">Sehat</label>
                            <input type="radio" id="kriteriatidakSehat" name="kriteriaRumah" value="Tidak Sehat">
                            <label for="kriteriatidakSehat">Tidak Sehat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>10. Aktifitas UP2K</strong></label>
                        <div>
                            <input type="radio" id="aktifitasupYa" name="aktifitasUP2k" value="Ya">
                            <label for="aktifitasupYa">Ya</label>
                            <input type="radio" id="aktifitasupTidak" name="aktifitasUP2k" value="Tidak">
                            <label for="aktifitasupTidak">Tidak</label>
                            <input type="radio" id="aktifitasLainnya" name="aktifitasUP2k" value="Lainnya">
                            <label for="aktifitasLainnya">Lainnya</label>
                            <input type="text" class="form-control" id="aktifitasLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><strong>11. Aktifitas Usaha KesLing</strong></label>
                        <div>
                            <input type="radio" id="keslingYa" name="usahaKesling" value="Ya">
                            <label for="keslingYa">Ya</label>
                            <input type="radio" id="keslingTidak" name="usahaKesling" value="Tidak">
                            <label for="keslingTidak">Tidak</label>
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
                const requiredFields = [
                    'anggotakeluarga',
                    'statusdalamkeluarga',
                    'statusdalamperkawinan',
                    'jeniskelamin',
                    'tempatlahir',
                    'tanggalLahir',
                    'pendidikan',
                    'pekerjaan'
                ];

                for (let fieldId of requiredFields) {
                    const field = document.getElementById(fieldId);
                    if (field && field.value.trim() === '') {
                        alert('Harap isi semua kolom yang diperlukan.');
                        field.focus();
                        return false;
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