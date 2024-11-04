<?php
    include 'connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM data_keluarga";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : DATA KELUARGA</title>

    <!-- LINKS -->
     
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-table.css">
    <style>
    </style>
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-left">
            <h3>EDIT : DATA KELUARGA</h3>
        </div>
        <div class="header-right">
            <a href="mainmenu.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
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
                        <th scope="col">RW</th>
                        <th scope="col">RT</th>
                        <th scope="col">Dasa Wisma</th>
                        <th scope="col">Nama Kepala Rumah Tangga</th>
                        <th scope="col">No Reg</th>
                        <th scope="col">Nama Anggota Keluarga</th>
                        <th scope="col">Status Dalam Keluarga</th>
                        <th scope="col">Status Dalam Perkawinan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Pendidikan Terakhir</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Kelompok Umur</th>
                        <th scope="col">Bumil</th>
                        <th scope="col">Ibu Menyusui</th>
                        <th scope="col">Pasangan Subur</th>
                        <th scope="col">Wanita Usia Subur</th>
                        <th scope="col">Apa 3 Buta</th>
                        <th scope="col">Makanan Pokok Sehari-hari</th>
                        <th scope="col">Mempunyai Jaminan Keluarga</th>
                        <th scope="col">Jumlah Jaminan Keluarga</th>
                        <th scope="col">Sumber Air Keluarga</th>
                        <th scope="col">Memiliki Tempat Pembuangan Sampah</th>
                        <th scope="col">Memiliki Saluran Pembuangan Air Limbah</th>
                        <th scope="col">Menempel Stiker P4K</th>
                        <th scope="col">Kriteria Rumah</th>
                        <th scope="col">Aktifitas UP2K</th>
                        <th scope="col">Aktifitas Usaha Kesling</th>
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
                                                <img class="span-img" src="img/view-eye-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_data_keluarga_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <!-- Edit ke halaman edit_x_hapus.php -->
                                        <a class="a-link" href="edit_data_keluarga_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kelurahan']; ?></td>
                                <td><?php echo $row['rw']; ?></td>
                                <td><?php echo $row['rt']; ?></td>
                                <td><?php echo $row['dasa_wisma']; ?></td>
                                <td><?php echo $row['nama_kepala_rumah_tangga']; ?></td>
                                <td><?php echo $row['no_reg']; ?></td>
                                <td><?php echo $row['nama_anggota_keluarga']; ?></td>
                                <td><?php echo $row['status_dalam_keluarga']; ?></td>
                                <td><?php echo $row['status_dalam_perkawinan']; ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['tempat_lahir']; ?></td>
                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                <td><?php echo $row['umur']; ?></td>
                                <td><?php echo $row['pendidikan_terakhir']; ?></td>
                                <td><?php echo $row['pekerjaan']; ?></td>
                                <td><?php echo $row['kelompok_umur']; ?></td>
                                <td><?php echo $row['bumil']; ?></td>
                                <td><?php echo $row['ibu_menyusui']; ?></td>
                                <td><?php echo $row['pasangan_subur']; ?></td>
                                <td><?php echo $row['wanita_usia_subur']; ?></td>
                                <td><?php echo $row['apa_3buta']; ?></td>
                                <td><?php echo $row['makanan_pokok_sehari_hari']; ?></td>
                                <td><?php echo $row['mempunyai_jaminan_keluarga']; ?></td>
                                <td><?php echo $row['jumlah_jaminan_keluarga']; ?></td>
                                <td><?php echo $row['sumber_air_keluarga']; ?></td>
                                <td><?php echo $row['tempat_pembuangan_sampah']; ?></td>
                                <td><?php echo $row['saluran_pembuangan_air_limbah']; ?></td>
                                <td><?php echo $row['stiker_p4k']; ?></td>
                                <td><?php echo $row['kriteria_rumah']; ?></td>
                                <td><?php echo $row['aktifitas_up2k']; ?></td>
                                <td><?php echo $row['aktifitas_usaha_kesling']; ?></td>
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
                            
                            <label>RW:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalRW" class="form-control mb-3" readonly> <!-- Added input for RW -->
                            
                            <label>RT:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalRT" class="form-control mb-3" readonly> <!-- Added input for RT -->
                            
                            <label>Dasa Wisma:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalDasaWisma" class="form-control mb-3" readonly> <!-- Added input for Dasa Wisma -->
                            
                            <label>Nama Kepala Rumah Tangga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalNamaKepala" class="form-control mb-3" readonly> <!-- Added input for Nama Kepala Rumah Tangga -->
                            
                            <label>No Reg:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalNoReg" class="form-control mb-3" readonly> <!-- Added input for No Reg -->
                            
                            <label>Nama Anggota Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalNamaAnggota" class="form-control mb-3" readonly> <!-- Added input for Nama Anggota Keluarga -->
                            
                            <label>Status Dalam Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalStatusKeluarga" class="form-control mb-3" readonly> <!-- Added input for Status Dalam Keluarga -->
                            
                            <label>Status Dalam Perkawinan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalStatusPerkawinan" class="form-control mb-3" readonly> <!-- Added input for Status Dalam Perkawinan -->
                            
                            <label>Jenis Kelamin:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJenisKelamin" class="form-control mb-3" readonly> <!-- Added input for Jenis Kelamin -->
                            
                            <label>Tempat Lahir:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalTempatLahir" class="form-control mb-3" readonly> <!-- Added input for Tempat Lahir -->
                            
                            <label>Tanggal Lahir:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalTanggalLahir" class="form-control mb-3" readonly> <!-- Added input for Tanggal Lahir -->
                            
                            <label>Umur:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalUmur" class="form-control mb-3" readonly> <!-- Added input for Umur -->
                            
                            <label>Pendidikan Terakhir:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalPendidikanTerakhir" class="form-control mb-3" readonly> <!-- Added input for Pendidikan Terakhir -->
                            
                            <label>Pekerjaan:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalPekerjaan" class="form-control mb-3" readonly> <!-- Added input for Pekerjaan -->
                            
                            <label>Kelompok Umur:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalKelompokUmur" class="form-control mb-3" readonly> <!-- Added input for Kelompok Umur -->
                            
                            <label>Bumil:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalBumil" class="form-control mb-3" readonly> <!-- Added input for Bumil -->
                            
                            <label>Ibu Menyusui:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalIbuMenyusui" class="form-control mb-3" readonly> <!-- Added input for Ibu Menyusui -->
                            
                            <label>Pasangan Subur:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalPasanganSubur" class="form-control mb-3" readonly> <!-- Added input for Pasangan Subur -->
                            
                            <label>Wanita Usia Subur:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalWanitaUsiaSubur" class="form-control mb-3" readonly> <!-- Added input for Wanita Usia Subur -->
                            
                            <label>Apa 3 Buta:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalApa3Buta" class="form-control mb-3" readonly> <!-- Added input for Apa 3 Buta -->
                            
                            <label>Makanan Pokok Sehari-hari:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalMakananPokok" class="form-control mb-3" readonly> <!-- Added input for Makanan Pokok Sehari-hari -->
                            
                            <label>Mempunyai Jaminan Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJaminanKeluarga" class="form-control mb-3" readonly> <!-- Added input for Mempunyai Jaminan Keluarga -->
                            
                            <label>Jumlah Jaminan Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalJumlahJaminan" class="form-control mb-3" readonly> <!-- Added input for Jumlah Jaminan Keluarga -->
                            
                            <label>Sumber Air Keluarga:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalSumberAir" class="form-control mb-3" readonly> <!-- Added input for Sumber Air Keluarga -->
                            
                            <label>Memiliki Tempat Pembuangan Sampah:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalTempatPembuangan" class="form-control mb-3" readonly> <!-- Added input for Memiliki Tempat Pembuangan Sampah -->
                            
                            <label>Memiliki Saluran Pembuangan Air Limbah:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalSaluranPembuangan" class="form-control mb-3" readonly> <!-- Added input for Memiliki Saluran Pembuangan Air Limbah -->
                            
                            <label>Menempel Stiker P4K:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalStikerP4K" class="form-control mb-3" readonly> <!-- Added input for Menempel Stiker P4K -->
                            
                            <label>Kriteria Rumah:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalKriteriaRumah" class="form-control mb-3" readonly> <!-- Added input for Kriteria Rumah -->
                            
                            <label>Aktifitas UP2K:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalAktifitasUP2K" class="form-control mb-3" readonly> <!-- Added input for Aktifitas UP2K -->
                            
                            <label>Aktifitas Usaha Kesling:</label> <!-- Changed label to match main table -->
                            <input type="text" id="modalAktifitasUsahaKesling" class="form-control mb-3" readonly> <!-- Added input for Aktifitas Usaha Kesling -->
                            
                            <label>Keterangan:</label>
                            <input type="text" id="modalKeterangan" class="form-control mb-3" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/app.js"></script>

    <!-- Add JavaScript function to fetch and display data in the modal -->
    <script>
    function showData(id) {
        // Fetch data using AJAX
        $.ajax({
            url: 'edit_data_keluarga_fetch.php', // ini ubah ke edit_x_fetch.php
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data (Edit sesuai kebutuhan, ini ngambil dari id view data)
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#modalRW').val(data.rw); // Update to match modal view
                    $('#modalRT').val(data.rt); // Update to match modal view
                    $('#modalDasaWisma').val(data.dasa_wisma); // Update to match modal view
                    $('#modalNamaKepala').val(data.nama_kepala_rumah_tangga); // Update to match modal view
                    $('#modalNoReg').val(data.no_reg); // Update to match modal view
                    $('#modalNamaAnggota').val(data.nama_anggota_keluarga); // Update to match modal view
                    $('#modalStatusKeluarga').val(data.status_dalam_keluarga); // Update to match modal view
                    $('#modalStatusPerkawinan').val(data.status_dalam_perkawinan); // Update to match modal view
                    $('#modalJenisKelamin').val(data.jenis_kelamin); // Update to match modal view
                    $('#modalTempatLahir').val(data.tempat_lahir); // Update to match modal view
                    $('#modalTanggalLahir').val(data.tanggal_lahir); // Update to match modal view
                    $('#modalUmur').val(data.umur); // Update to match modal view
                    $('#modalPendidikanTerakhir').val(data.pendidikan_terakhir); // Update to match modal view
                    $('#modalPekerjaan').val(data.pekerjaan); // Update to match modal view
                    $('#modalKelompokUmur').val(data.kelompok_umur); // Update to match modal view
                    $('#modalBumil').val(data.bumil); // Update to match modal view
                    $('#modalIbuMenyusui').val(data.ibu_menyusui); // Update to match modal view
                    $('#modalPasanganSubur').val(data.pasangan_subur); // Update to match modal view
                    $('#modalWanitaUsiaSubur').val(data.wanita_usia_subur); // Update to match modal view
                    $('#modalApa3Buta').val(data.apa_3buta); // Update to match modal view
                    $('#modalMakananPokok').val(data.makanan_pokok_sehari_hari); // Update to match modal view
                    $('#modalJaminanKeluarga').val(data.mempunyai_jaminan_keluarga); // Update to match modal view
                    $('#modalJumlahJaminan').val(data.jumlah_jaminan_keluarga); // Update to match modal view
                    $('#modalSumberAir').val(data.sumber_air_keluarga); // Update to match modal view
                    $('#modalTempatPembuangan').val(data.tempat_pembuangan_sampah); // Update to match modal view
                    $('#modalSaluranPembuangan').val(data.saluran_pembuangan_air_limbah); // Update to match modal view
                    $('#modalStikerP4K').val(data.stiker_p4k); // Update to match modal view
                    $('#modalKriteriaRumah').val(data.kriteria_rumah); // Update to match modal view
                    $('#modalAktifitasUP2K').val(data.aktifitas_up2k); // Update to match modal view
                    $('#modalAktifitasUsahaKesling').val(data.aktifitas_usaha_kesling); // Update to match modal view
                    $('#modalKeterangan').val(data.keterangan);


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
