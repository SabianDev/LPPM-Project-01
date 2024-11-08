<?php
   include('../connect.php');
   // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM data_per_dasawisma";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : DATA PER DASAWISMA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
    <style>
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-left">
            <h3>EDIT : DATA PER DASAWISMA</h3>
        </div>
        <div class="header-right">
            <a href="../mainmenu-admin.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
        </div>
    </header>

    <div class="content mt-5">

        <!-- PESAN UNTUK FUNGSI HAPUS (JGN DIEDIT)-->
        <?php if (isset($_GET['id'])): ?>
            <div class="alert-container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data dengan id <?= htmlspecialchars($_GET['id']); ?> berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <script>
                // Auto close the alert after 7 seconds
                setTimeout(function() {
                    var alert = document.querySelector('.alert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                    }
                }, 7000);
            </script>
        <?php endif; ?>
        
        <!-- PESAN UNTUK FUNGSI EDIT (JGN DIEDIT)-->
        <?php if (isset($_GET['message'])): ?>
            <div class="alert-container">
                <?php if ($_GET['message'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil diperbarui!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php elseif ($_GET['message'] == 'error' && isset($_GET['error'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error: <?= htmlspecialchars($_GET['error']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
            <script>
                // Auto close the alert after 7 seconds
                setTimeout(function() {
                    var alert = document.querySelector('.alert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                    }
                }, 7000);
            </script>
        <?php endif; ?>
        

        <!-- MAIN TABLE (Edit Sesuai Kebutuhan)-->
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-edit">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">ID</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Kelompok PKK RW</th>
                        <th scope="col">Kelompok PKK RT</th>
                        <th scope="col">Kelompok PKK Dasa Wisma</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">No Reg</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">Jumlah KK</th>
                        <th scope="col">Total Laki Laki</th>
                        <th scope="col">Total Perempuan</th>
                        <th scope="col">Balita Laki Laki</th>
                        <th scope="col">Balita Perempuan</th>
                        <th scope="col">Pasangan Usia Subur</th>
                        <th scope="col">Wanita Usia Subur</th>
                        <th scope="col">Ibu Hamil</th>
                        <th scope="col">Ibu Menyusui</th>
                        <th scope="col">Lansia</th>
                        <th scope="col">Tiga Buta</th>
                        <th scope="col">Berkebutuhan Khusus</th>
                        <th scope="col">Sehat Dan Layak Huni</th>
                        <th scope="col">Memiliki Tempat Pembuangan Sampah</th>
                        <th scope="col">Memiliki Spal</th>
                        <th scope="col">Memiliki Jamban</th>
                        <th scope="col">Sumber Air Keluarga</th>
                        <th scope="col">Makanan Pokok</th>
                        <th scope="col">Kegiatan Up2k</th>
                        <th scope="col">Pemanfaatan Tanah</th>
                        <th scope="col">Industri Rumah</th>
                        <th scope="col">Kerja Bakti</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // iterasi No.
                        $num = 1;
                        if ($result->num_rows > 0): 
                    ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td>
                                    <!-- Button View, Edit, Delete (Edit linknya aja) -->
                                    <div class="tbl-item-button">
                                        <a class="a-link" href="#" data-bs-toggle="modal" data-bs-target="#dataModal" onclick="showData(<?= $row['id']; ?>)">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/view-eye-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_data_per_dasawisma_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <!-- Edit ke halaman edit_x_hapus.php -->
                                        <a class="a-link" href="edit_data_per_dasawisma_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="../../img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kelurahan']; ?></td>
                                <td><?php echo $row['kelompok_pkk_rw']; ?></td>
                                <td><?php echo $row['kelompok_pkk_rt']; ?></td>
                                <td><?php echo $row['kelompok_pkk_dasa_wisma']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['no_reg']; ?></td>
                                <td><?php echo $row['nama_kepala_keluarga']; ?></td>
                                <td><?php echo $row['jumlah_kk']; ?></td>
                                <td><?php echo $row['total_laki_laki']; ?></td>
                                <td><?php echo $row['total_perempuan']; ?></td>
                                <td><?php echo $row['balita_laki_laki']; ?></td>
                                <td><?php echo $row['balita_perempuan']; ?></td>
                                <td><?php echo $row['pasangan_usia_subur']; ?></td>
                                <td><?php echo $row['wanita_usia_subur']; ?></td>
                                <td><?php echo $row['ibu_hamil']; ?></td>
                                <td><?php echo $row['ibu_menyusui']; ?></td>
                                <td><?php echo $row['lansia']; ?></td>
                                <td><?php echo $row['tiga_buta']; ?></td>
                                <td><?php echo $row['berkebutuhan_khusus']; ?></td>
                                <td><?php echo $row['sehat_dan_layak_huni']; ?></td>
                                <td><?php echo $row['memiliki_tempat_pembuangan_sampah']; ?></td>
                                <td><?php echo $row['memiliki_spal']; ?></td>
                                <td><?php echo $row['memiliki_jamban']; ?></td>
                                <td><?php echo $row['sumber_air_keluarga']; ?></td>
                                <td><?php echo $row['makanan_pokok']; ?></td>
                                <td><?php echo $row['kegiatan_up2k']; ?></td>
                                <td><?php echo $row['pemanfaatan_tanah']; ?></td>
                                <td><?php echo $row['industri_rumah']; ?></td>
                                <td><?php echo $row['kerja_bakti']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                            </tr>
                        <?php 
                        $num = $num + 1;
                        endwhile; 
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="30" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <!-- MODAL UNTUK VIEW DATA -->
    <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dataModalLabel">Detail Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                    <div id="modalDataContent">
                        <!-- Display form record disini (Edit sesuai kebutuhan) -->
                        <div>

                            <label>ID:</label>
                            <input type="text" id="modalId" class="form-control mb-3" readonly>
                            
                            <label>Kelurahan:</label>
                            <input type="text" id="modalKelurahan" class="form-control mb-3" readonly>
                            
                            <label>Kelompok PKK RW:</label>
                            <input type="text" id="pkkrw" class="form-control mb-3" readonly>
                            
                            <label>Kelompok PKK RT:</label> <!-- Changed label to match main table -->
                            <input type="text" id="pkkrt" class="form-control mb-3" readonly> <!-- Added input for RW -->
                            
                            <label>Kelompok PKK Dasa Wisma:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalPkkdasawisma" class="form-control mb-3" readonly> <!-- Added input for RT -->
                            
                            <label>Tahun:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalTahun" class="form-control mb-3" readonly> <!-- Added input for Dasa Wisma -->
                            
                            <label>No. Reg:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalNoreg" class="form-control mb-3" readonly> <!-- Added input for Nama Kepala Rumah Tangga -->
                            
                            <label>Nama Kepala Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalNamaKK" class="form-control mb-3" readonly> <!-- Added input for No Reg -->
                            
                            <label>Jumlah KK:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJumalahKK" class="form-control mb-3" readonly> <!-- Added input for Nama Anggota Keluarga -->
                            
                            <label>Jumlah Laki-laki:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJml_laki" class="form-control mb-3" readonly> <!-- Added input for Status Dalam Keluarga -->
                            
                            <label>Jumlah Perempuan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJml_perempuan" class="form-control mb-3" readonly> <!-- Added input for Status Dalam Perkawinan -->
                            
                            <label>Balita Laki-laki:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalBalita_L" class="form-control mb-3" readonly> <!-- Added input for Jenis Kelamin -->
                            
                            <label>Balita Perempuan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalBalita_P" class="form-control mb-3" readonly> <!-- Added input for Tempat Lahir -->
                            
                            <label>Pasangan Usia Subur (PUS):</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalPUS" class="form-control mb-3" readonly> <!-- Added input for Tanggal Lahir -->
                            
                            <label>Wanita Usia Subur (WUS):</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalWus" class="form-control mb-3" readonly> <!-- Added input for Umur -->
                            
                            <label>Ibu Hamil:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalBumil" class="form-control mb-3" readonly> <!-- Added input for Pendidikan Terakhir -->
                            
                            <label>Ibu Menyusui:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalIbu_menyusui" class="form-control mb-3" readonly> <!-- Added input for Pekerjaan -->
                            
                            <label>Lansia:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalLansia" class="form-control mb-3" readonly> <!-- Added input for Kelompok Umur -->
                            
                            <label>3Buta:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modal3buta" class="form-control mb-3" readonly> <!-- Added input for Bumil -->
                            
                            <label>Berkebutuhan Khusus:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalBK" class="form-control mb-3" readonly> <!-- Added input for Ibu Menyusui -->
                            
                            <label>Sehat dan layak huni:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modal_SLH" class="form-control mb-3" readonly> <!-- Added input for Pasangan Subur -->
                            
                            <label>Memiliki tempat pembuangan sampah:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalMemiliki_TPS" class="form-control mb-3" readonly> <!-- Added input for Wanita Usia Subur -->
                            
                            <label>Memiliki SPAL:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalSPAL" class="form-control mb-3" readonly> <!-- Added input for Apa 3 Buta -->
                            
                            <label>Memiliki jamban:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJamban" class="form-control mb-3" readonly> <!-- Added input for Makanan Pokok Sehari-hari -->
                            
                            <label>Sumber air keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalSumber_air" class="form-control mb-3" readonly> <!-- Added input for Mempunyai Jaminan Keluarga -->
                            
                            <label>Makanan Pokok:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalMakananPokok" class="form-control mb-3" readonly> <!-- Added input for Jumlah Jaminan Keluarga -->
                            
                            <label>Kegiatan UP2K:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalKegiatanUP2K" class="form-control mb-3" readonly> <!-- Added input for Sumber Air Keluarga -->
                            
                            <label>Pemanfaatan Tanah Pekarangan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalTanahPerkarangan" class="form-control mb-3" readonly> <!-- Added input for Memiliki Tempat Pembuangan Sampah -->
                            
                            <label>Industri Rumah Tangga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalIndustriRT" class="form-control mb-3" readonly> <!-- Added input for Memiliki Saluran Pembuangan Air Limbah -->
                            
                            <label>Kerja Bakti:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalKerjaBakti" class="form-control mb-3" readonly> <!-- Added input for Menempel Stiker P4K -->
                            
                            <label>Keterangan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalKeterangan" class="form-control mb-3" readonly> <!-- Added input for Kriteria Rumah --> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>

    <!-- Add JavaScript function to fetch and display data in the modal -->
    <script>
    function showData(id) {
        // Fetch data using AJAX
        $.ajax({
            url: 'edit_data_per_dasawisma_fetch.php', // ini ubah ke edit_x_fetch.php
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data (Edit sesuai kebutuhan, ini ngambil dari id view data)
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#pkkrw').val(data.kelompok_pkk_rw); // Update to match modal view
                    $('#pkkrt').val(data.kelompok_pkk_rt); // Update to match modal view
                    $('#modalPkkdasawisma').val(data.kelompok_pkk_dasa_wisma); // Update to match modal view
                    $('#modalTahun').val(data.tahun);
                    $('#modalNoreg').val(data.no_reg); // Update to match modal view
                    $('#modalNamaKK').val(data.nama_kepala_keluarga); // Update to match modal view
                    $('#modalJumalahKK').val(data.jumlah_kk); // Update to match modal view
                    $('#modalJml_laki').val(data.total_laki_laki); // Update to match modal view
                    $('#modalJml_perempuan').val(data.total_perempuan); // Update to match modal view
                    $('#modalBalita_L').val(data.balita_laki_laki); // Update to match modal view
                    $('#modalBalita_P').val(data.balita_perempuan); // Update to match modal view
                    $('#modalPUS').val(data.pasangan_usia_subur); // Update to match modal view
                    $('#modalWus').val(data.wanita_usia_subur); // Update to match modal view
                    $('#modalBumil').val(data.ibu_hamil); // Update to match modal view
                    $('#modalIbu_menyusui').val(data.ibu_menyusui); // Update to match modal view
                    $('#modalLansia').val(data.lansia); // Update to match modal view
                    $('#modal3buta').val(data.tiga_buta); // Update to match modal view
                    $('#modalBK').val(data.berkebutuhan_khusus);
                    $('#modal_SLH').val(data.sehat_dan_layak_huni); // Update to match modal view
                    $('#modalMemiliki_TPS').val(data.memiliki_tempat_pembuangan_sampah); // Update to match modal view
                    $('#modalSPAL').val(data.memiliki_spal); // Update to match modal view
                    $('#modalJamban').val(data.memiliki_jamban); // Update to match modal view
                    $('#modalSumber_air').val(data.sumber_air_keluarga); // Update to match modal view
                    $('#modalMakananPokok').val(data.makanan_pokok); // Update to match modal view
                    $('#modalKegiatanUP2K').val(data.kegiatan_up2k); // Update to match modal view
                    $('#modalTanahPerkarangan').val(data.pemanfaatan_tanah); // Update to match modal view
                    $('#modalIndustriRT').val(data.industri_rumah); // Update to match modal view
                    $('#modalKerjaBakti').val(data.kerja_bakti); // Update to match modal view
                    $('#modalKeterangan').val(data.keterangan); // Update to match modal view


                } else {
                    alert('Data not found');
                }
            },
            error: function() {
                alert('Error fetching data');
            }
        });
    }

    // Fetch data using AJAX
    $.ajax({
        url: 'edit_data_keluarga_fetch.php', // ini ubah ke edit_x_fetch.php
        type: 'GET',
        data: { id: id },
        dataType: 'json', // Expect a JSON response
        success: function(data) {
            if (data) {
                // Populate modal with data (Edit sesuai kebutuhan, ini ngambil dari id edit data)
                $('#editId').val(data.id);
                $('#editKelurahan').val(data.kelurahan);
                $('#editRW').val(data.rw); // Update to match modal edit
                $('#editRT').val(data.rt); // Added to match modal edit
                $('#editDasaWisma').val(data.dasa_wisma); // Added to match modal edit
                $('#editNamaKepala').val(data.nama_kepala_rumah_tangga); // Added to match modal edit
                $('#editNoReg').val(data.no_reg); // Added to match modal edit
                $('#editNamaAnggota').val(data.nama_anggota_keluarga); // Added to match modal edit
                $('#editStatusKeluarga').val(data.status_dalam_keluarga); // Added to match modal edit
                $('#editStatusPerkawinan').val(data.status_dalam_perkawinan); // Added to match modal edit
                $('#editJenisKelamin').val(data.jenis_kelamin); // Added to match modal edit
                $('#editTempatLahir').val(data.tempat_lahir); // Added to match modal edit
                $('#editTanggalLahir').val(data.tanggal_lahir); // Added to match modal edit
                $('#editUmur').val(data.umur); // Added to match modal edit
                $('#editPendidikan').val(data.pendidikan); // Added to match modal edit
                $('#editPekerjaan').val(data.pekerjaan); // Added to match modal edit
                $('#editKelompokUmur').val(data.kelompok_umur); // Added to match modal edit
                $('#editBumil').val(data.bumil); // Added to match modal edit
                $('#editIbuMenyusui').val(data.ibu_menyusui); // Added to match modal edit
                $('#editPasanganSubur').val(data.pasangan_subur); // Added to match modal edit
                $('#editWanitaUsiaSubur').val(data.wanita_usia_subur); // Added to match modal edit
                $('#editApa3Buta').val(data.apa_3buta); // Added to match modal edit
                $('#editMakananPokok').val(data.makanan_pokok_sehari_hari); // Added to match modal edit
                $('#editJaminanKeluarga').val(data.mempunyai_jaminan_keluarga); // Added to match modal edit
                $('#editJumlahJaminan').val(data.jumlah_jaminan_keluarga); // Added to match modal edit
                $('#editSumberAir').val(data.sumber_air_keluarga); // Added to match modal edit
                $('#editTempatPembuangan').val(data.tempat_pembuangan_sampah); // Added to match modal edit
                $('#editSaluranPembuangan').val(data.saluran_pembuangan_air_limbah); // Added to match modal edit
                $('#editStikerP4K').val(data.stiker_p4k); // Added to match modal edit
                $('#editKriteriaRumah').val(data.kriteria_rumah); // Added to match modal edit
                $('#editAktifitasUP2K').val(data.aktifitas_up2k); // Added to match modal edit
                $('#editAktifitasUsahaKesling').val(data.aktifitas_usaha_kesling); // Added to match modal edit
                $('#editKeterangan').val(data.keterangan); // Added to match modal edit
                
                // Show the modal
                $('#editDataModal').modal('show');
            } else {
                alert('Data not found');
            }
        },
        error: function() {
            alert('Error fetching data');
        }
    });
    
    </script>
</body>
</html>
