<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPLATE : FORM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
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
        $formTitle2 = "Bagian Pilihan";

        $formTarget1 = "form-1";
        $formTarget2 = "form-2";
    ?>
</head>
<body class="bg-light">
    
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
                </ul>
            </div>
            <a href="mainmenu.php" class="btn btn-secondary btn-nav-kembali">Kembali</a>
        </div>
    
        <div class="master-form-container">
            <div class="form-title">
                <h2>DATA KELUARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG</h2>
            </div>
            
            <form>
                
                <!-- FORM 1 -->
                <div class="ctn-form form-section active" id="<?php echo $formTarget1; ?>">
                    <h4 class="mt-4"><?php echo $formTitle1; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label bold mt-3"><strong>Kelurahan</strong></label>
                        <select class="form-select"" id="kelurahan">
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
                        <label for="rw" class="form-label bold mt-3"><strong>RW</strong></label>
                        <select class="form-select"" id="rw">
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
                        <label for="rt" class="form-label bold mt-3"><strong>RT</strong></label>
                        <select class="form-select"" id="rt">
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
                        <label for="dasadisma" class="form-label bold mt-3"><strong>Dasa Disma</strong></label>
                        <input type="text" class="form-control" id="dasadisma" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="kepalarumahtangga" class="form-label bold mt-3"><strong>Nama Kepala Rumah Tangga</strong></label>
                        <input type="text" class="form-control" id="kepalarumahtangga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="noreg" class="form-label bold mt-3"><strong>No. Reg (RW.RT.Dasa Wisma. No Rumah. No Urut KK. No Anggota Keluarga), Contoh: 01.03.003.05.01.03</strong></label>
                        <input type="text" class="form-control" id="noreg" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="anggotakeluarga" class="form-label bold mt-3"><strong>Nama Anggota Keluarga</strong></label>
                        <input type="text" class="form-control" id="anggotakeluarga" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Status Dalam Keluarga</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="kepalakeluarga" name="statusdalamkeluarga" value="Kepala Keluarga">
                                <label for="kepalakeluarga">Kepala Keluarga</label>
                            </div>
                            <div>
                                <input type="radio" id="istri" name="statusdalamkeluarga" value="Istri">
                                <label for="istri">Istri</label>
                            </div>
                            <div>
                                <input type="radio" id="anak" name="statusdalamkeluarga" value="Anak">
                                <label for="anak">Anak</label>
                            </div>
                            <div>
                                <input type="radio" id="statusLainnya" name="statusdalamkeluarga" value="Lainnya">
                                <label for="statusdalamkeluargaLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="statusdalamkeluargaLainnyaText" placeholder="Sebutkan Lainnya">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="statusdalamperkawinan" class="form-label bold mt-3"><strong>Status Dalam Perkawinan</strong></label>
                        <select class="form-select"" id="statusdalamperkawinan">
                            <option value="">Pilih</option>
                            <option value="menikah">Menikah</option>
                            <option value="belumenikah">Belum Menikah</option>
                            <option value="ceraimati">Cerai Mati</option>
                            <option value="ceraihidup">Cerai Hidup</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Jenis Kelamin</strong></label>
                        <div>
                            <input type="radio" id="lakilaki" name="jeniskelamin" value="Laki Laki">
                            <label for="lakilaki">Laki-Laki</label>
                            <input type="radio" id="perempuan" name="jeniskelamin" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tempatlahir" class="form-label bold mt-3"><strong>Tempat Lahir</strong></label>
                        <input type="text" class="form-control" id="tempatlahir" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label bold mt-3"><strong>Tanggal Lahir</strong></label>
                        <input type="date" class="form-control" id="tanggalLahir">
                    </div>
                    <div class="mb-3">
                        <label for="umur" class="form-label bold mt-3"><strong>Umur</strong></label>
                        <input type="text" class="form-control" id="umur" placeholder="Jawaban Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Pendidikan</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="sd" name="pendidikan" value="SD">
                                <label for="sd">SD</label>
                            </div>
                            <div>
                                <input type="radio" id="smp" name="pendidikan" value="SMP">
                                <label for="smp">SMP</label>
                            </div>
                            <div>
                                <input type="radio" id="sma" name="pendidikan" value="SMA">
                                <label for="sma">SMA</label>
                            </div>
                            <div>
                                <input type="radio" id="s1" name="pendidikan" value="S1">
                                <label for="s1">S1</label>
                            </div>
                            <div>
                                <input type="radio" id="s2" name="pendidikan" value="S2">
                                <label for="s2">S2</label>
                            </div>
                            <div>
                                <input type="radio" id="s3" name="pendidikan" value="S3">
                                <label for="s3">S3</label>
                            </div>
                            <div>
                                <input type="radio" id="pendidikanLainnya" name="pendidikan" value="Lainnya">
                                <label for="pendidikanLainnya">Lainnya</label>
                            </div>
                            <input type="text" class="form-control" id="pendidikanLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Pekerjaan</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="asn" name="pekerjaan" value="ASN">
                                <label for="asn">ASN</label>
                            </div>
                            <div>
                                <input type="radio" id="tniPolri" name="pekerjaan" value="TNI/Polri">
                                <label for="tniPolri">TNI/Polri</label>
                            </div>
                            <div>
                                <input type="radio" id="pegawaiSwasta" name="pekerjaan" value="Pegawai Swasta">
                                <label for="pegawaiSwasta">Pegawai Swasta</label>
                            </div>
                            <div>
                                <input type="radio" id="wiraswasta" name="pekerjaan" value="Wiraswasta">
                                <label for="wiraswasta">Wiraswasta</label>
                            </div>
                            <div>
                                <input type="radio" id="mengurusRumahTangga" name="pekerjaan" value="Mengurus Rumah Tangga">
                                <label for="mengurusRumahTangga">Mengurus Rumah Tangga</label>
                            </div>
                            <div>
                                <input type="radio" id="pelajar" name="pekerjaan" value="Pelajar">
                                <label for="pelajar">Pelajar</label>
                            </div>
                            <div>
                                <input type="radio" id="mahasiswa" name="pekerjaan" value="Mahasiswa">
                                <label for="mahasiswa">Mahasiswa</label>
                            </div>
                            <div>
                                <input type="radio" id="pekerjaanLainnya" name="pekerjaan" value="Lainnya">
                                <label for="pekerjaanLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="pekerjaanLainnyaText" placeholder="Sebutkan Lainnya">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Kelompok Umur</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="bayi" name="kelumur" value="Bayi">
                                <label for="bayi">Bayi (0-2 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="balita" name="kelumur" value="Balita">
                                <label for="balita">Balita (3-5 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="kanakkanak" name="kelumur" value="Kanak Kanak">
                                <label for="kanakkanak">Kanak-Kanak (6-10 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="remaja" name="kelumur" value="Remaja">
                                <label for="remaja">Remaja (11-24 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="dewasa" name="kelumur" value="Dewasa">
                                <label for="dewasa">Dewasa (25-59 tahun)</label>
                            </div>
                            <div>
                                <input type="radio" id="lansia" name="kelumur" value="Lansia">
                                <label for="lansia">Lansia (>59 tahun)</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Bumil (Orang)</strong></label>
                        <div>
                            <input type="radio" id="bumilYa" name="bumil" value="Ya">
                            <label for="bumilYa">Ya</label>
                            <input type="radio" id="bumilTidak" name="bumil" value="Tidak">
                            <label for="bumilTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Ibu Menyusui (Orang)</strong></label>
                        <div>
                            <input type="radio" id="ibumenyusuiYa" name="ibumenyusui" value="Ya">
                            <label for="ibumenyusuiYa">Ya</label>
                            <input type="radio" id="ibumenyusuiTidak" name="ibumenyusui" value="Tidak">
                            <label for="ibumenyusuiTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apakah Pasangan Subur (PUS)</strong></label>
                        <div>
                            <input type="radio" id="pasangansuburYa" name="pasangansubur" value="Ya">
                            <label for="pasangansuburYa">Ya</label>
                            <input type="radio" id="pasangansuburTidak" name="pasangansubur" value="Tidak">
                            <label for="pasangansuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apakah Termasuk Wanita Usia Subur (WUS)</strong></label>
                        <div>
                            <input type="radio" id="wanitausiasuburYa" name="wanitausiasubur" value="Ya">
                            <label for="wanitausiasuburYa">Ya</label>
                            <input type="radio" id="wanitausiasuburTidak" name="wanitausiasubur" value="Tidak">
                            <label for="wanitausiasuburTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Apa 3Buta</strong></label>
                        <div>
                            <input type="radio" id="butaYa" name="buta" value="Ya">
                            <label for="butaYa">Ya</label>
                            <input type="radio" id="butaTidak" name="buta" value="Tidak">
                            <label for="butaTidak">Tidak</label>
                        </div>
                    </div>
                        <br>
                        <div class="ctn-form-button">
                            <button type="button" class="btn btn-secondary next">Next</button>
                        </div>
                    </div>
                </div>

                <!-- FORM 4 submit-->
                <div class="ctn-form form-section" id="<?php echo $formTarget2; ?>">
                    <h4 class="mt-4"><?php echo $formTitle2; ?></h4><br>
                    <div class="row">
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>3. Makanan Pokok Sehari-hari</strong></label>
                        <div>
                            <div>
                                <input type="radio" id="beras" name="makananPokok" value="Beras">
                                <label for="beras">Beras</label>
                            </div>
                            <div>
                                <input type="radio" id="nonberas" name="makananPokok" value="NonBeras">
                                <label for="nonberas">Non Beras</label>
                            </div>
                            <div>
                                <input type="radio" id="makananLainnya" name="makananPokok" value="Lainnya">
                                <label for="makananpokokLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="makananpokokLainnyaText" placeholder="Sebutkan Lainnya">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>4. Mempunyai Jaminan Keluarga</strong></label>
                        <div>
                            <input type="radio" id="jaminanYa" name="jaminanKeluarga" value="Ya">
                            <label for="jaminanYa">Ya</label>
                            <input type="radio" id="jaminanTidak" name="jaminanKeluarga" value="Tidak">
                            <label for="jaminanTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>Jika ya, jumlah jaminan keluarga</strong></label>
                        <div class="d-flex flex-column">
                            <label for="jumlahSatu">
                                <input type="radio" id="jumlahSatu" name="jumlahJaminan" value="1" style="margin-right: 5px;">1
                            </label>
                            <label for="jumlahDua">
                                <input type="radio" id="jumlahDua" name="jumlahJaminan" value="2" style="margin-right: 5px;">2
                            </label>
                            <label for="jumlahTiga">
                                <input type="radio" id="jumlahTiga" name="jumlahJaminan" value="3" style="margin-right: 5px;">3
                            </label>
                            <label for="jumlahEmpat">
                                <input type="radio" id="jumlahEmpat" name="jumlahJaminan" value="4" style="margin-right: 5px;">4
                            </label>
                            <label for="jumlahLima">
                                <input type="radio" id="jumlahLima" name="jumlahJaminan" value="5" style="margin-right: 5px;">5
                            </label>
                            <label for="jumlahEnam">
                                <input type="radio" id="jumlahEnam" name="jumlahJaminan" value="6" style="margin-right: 5px;">6
                            </label>
                            <label for="jumlahTujuh">
                                <input type="radio" id="jumlahTujuh" name="jumlahJaminan" value="7" style="margin-right: 5px;">7
                            </label>
                            <label for="jumlahDelapan">
                                <input type="radio" id="jumlahDelapan" name="jumlahJaminan" value="8" style="margin-right: 5px;">8
                            </label>
                            <label for="jumlahSembilan">
                                <input type="radio" id="jumlahSembilan" name="jumlahJaminan" value="9" style="margin-right: 5px;">9
                            </label>
                            <label for="jumlahLainnya">
                                <input type="radio" id="jumlahLainnya" name="jumlahJaminan" value="Lainnya" style="margin-right: 5px;">Lainnya
                            </label>
                            <input type="text" class="form-control" id="jumlahLainnyaText" placeholder="Sebutkan Lainnya">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>5. Sumber Air Keluarga</strong></label>
                        <div class="d-flex flex-column"> <!-- Tambahkan kelas ini -->
                            <div>
                                <input type="radio" id="pdam" name="sumberAir" value="PDAM">
                                <label for="pdam">PDAM</label>
                            </div>
                            <div>
                                <input type="radio" id="sumur" name="sumberAir" value="Sumur">
                                <label for="sumur">Sumur</label>
                            </div>
                            <div>
                                <input type="radio" id="sungai" name="sumberAir" value="Sungai">
                                <label for="sungai">Sungai</label>
                            </div>
                            <div>
                                <input type="radio" id="sumberAirLainnya" name="sumberAir" value="Lainnya">
                                <label for="sumberAirLainnya">Lainnya</label>
                                <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>6. Memiliki Tempat Pembuangan Sampah</strong></strong></label>
                        <div>
                            <input type="radio" id="pembuanganSampahYa" name="pembuanganSampah" value="Ya">
                            <label for="pembuanganSampahYa">Ya</label>
                            <input type="radio" id="pembuanganSampahTidak" name="pembuanganSampah" value="Tidak">
                            <label for="pembuanganSampahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>7. Memiliki Saluran Pembuangan Air Limbah (SPAL)</strong></label>
                        <div>
                            <input type="radio" id="pembuanganAirLimbahYa" name="pembuanganAirLimbah" value="Ya">
                            <label for="pembuanganAirLimbahYa">Ya</label>
                            <input type="radio" id="pembuanganAirLimbahTidak" name="pembuanganAirLimbah" value="Tidak">
                            <label for="pembuanganAirLimbahTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>8. Menempel Stiker P4K</strong></label>
                        <div>
                            <input type="radio" id="stikerYa" name="stiker" value="Ya">
                            <label for="stikerYa">Ya</label>
                            <input type="radio" id="stikerTidak" name="stiker" value="Tidak">
                            <label for="stikerTidak">Tidak</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>9. Kriteria Rumah</strong></label>
                        <div>
                            <input type="radio" id="kriteriaSehat" name="kriteriaRumah" value="Sehat">
                            <label for="kriteriaSehat">Sehat</label>
                            <input type="radio" id="kriteriatidakSehat" name="kriteriaRumah" value="Tidak Sehat">
                            <label for="kriteriatidakSehat">Tidak Sehat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>10. Aktifitas UP2K</strong></label>
                            <div>
                                <input type="radio" id="up2k_ya" name="up2k_ya" value="Ya">
                                <label for="pdam">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="up2k_tidak" name="up2k_tidak" value="Tidak">
                                <label for="sumur">Tidak</label>
                            </div>
                            <div>
                                <input type="radio" id="up2k_lainnya" name="sumberAir" value="Lainnya">
                                <label for="sumberAirLainnya">Lainnya:</label>
                                <input type="text" class="form-control" id="sumberAirLainnyaText" placeholder="Sebutkan Lainnya">
                            </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label bold mt-3"><strong>11. Aktifitas Usaha KesLing</strong></label>
                        <div>
                            <input type="radio" id="keslingYa" name="usahaKesling" value="Ya">
                            <label for="keslingYa">Ya</label>
                            <input type="radio" id="keslingTidak" name="usahaKesling" value="Tidak">
                            <label for="keslingTidak">Tidak</label>
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
                        Form ini untuk membantu Program Kerja Kelompok Kerja 1 untuk menyusun data dasar dengan:<br>
                        <ul>
                            <li>Pendataan jumlah Keluarga Pra Keluarga Sejahtera (KS)</li>
                            <li>Pendataan Pemukiman tidak layak huni</li>
                            <li>Pendataan pemanfaatan pekarangan</li>
                            <li>Pendataan jumlah penduduk usia 15 s.d.60 tahun yang buta huruf.</li>
                        </ul>
                    </div>
                </div>
            </div>
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