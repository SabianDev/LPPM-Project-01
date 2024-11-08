<?php
   include('../connect.php');
   
   $sql = "SELECT * FROM rekap_catatan_per_dasawisma";
   $result = $conn->query($sql);
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : REKAP CATATAN PER DASAWISMA</title>

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
            <h3>EDIT : REKAP CATATAN PER DASAWISMA</h3>
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
                        <th scope="col">Kelompok Dasa Wisma</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Nama Anggota Keluarga</th>
                        <th scope="col">Status Perkawinan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Berkebutuhan Khusus</th>
                        <th scope="col">Penghayatan Pengamalan Pancasila</th>
                        <th scope="col">Gotong Royong</th>
                        <th scope="col">Pendidikan Keterampilan</th>
                        <th scope="col">Pengembangan Keh Berkoperasi</th>
                        <th scope="col">Pangan</th>
                        <th scope="col">Sandang</th>
                        <th scope="col">Kesehatan</th>
                        <th scope="col">Perencanaan Sehat</th>
                        <th scope="col">Kriteria Rumah</th>
                        <th scope="col">Jamban Keluarga</th>
                        <th scope="col">Jumlah Jamban Keluarga</th>
                        <th scope="col">Sumber Air</th>
                        <th scope="col">Memiliki Tempat Sampah</th>
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
                                    <!-- Button View, Edit, Delete -->
                                    <div class="tbl-item-button">
                                        <a class="a-link" href="#" data-bs-toggle="modal" data-bs-target="#dataModal" onclick="showData(<?= $row['id']; ?>)">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/view-eye-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_rekap_catatan_per_dasawisma_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_rekap_catatan_per_dasawisma_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="../../img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo isset($row['kelompok_dasa_wisma']) ? $row['kelompok_dasa_wisma'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['tahun']) ? $row['tahun'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['nama_anggota_keluarga']) ? $row['nama_anggota_keluarga'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['status_perkawinan']) ? $row['status_perkawinan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['jenis_kelamin']) ? $row['jenis_kelamin'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['tempat_lahir']) ? $row['tempat_lahir'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['tanggal_lahir']) ? $row['tanggal_lahir'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['umur']) ? $row['umur'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['agama']) ? $row['agama'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['pendidikan']) ? $row['pendidikan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['pekerjaan']) ? $row['pekerjaan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['berkebutuhan_khusus']) ? $row['berkebutuhan_khusus'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['penghayatan_pengamalan_pancasila']) ? $row['penghayatan_pengamalan_pancasila'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['gotong_royong']) ? $row['gotong_royong'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['pendidikan_keterampilan']) ? $row['pendidikan_keterampilan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['pengembangan_keh_berkoperasi']) ? $row['pengembangan_keh_berkoperasi'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['pangan']) ? $row['pangan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['sandang']) ? $row['sandang'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['kesehatan']) ? $row['kesehatan'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['perencanaan_sehat']) ? $row['perencanaan_sehat'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['kriteria_rumah']) ? $row['kriteria_rumah'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['jamban_keluarga']) ? $row['jamban_keluarga'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['jumlah_jamban_keluarga']) ? $row['jumlah_jamban_keluarga'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['sumber_air']) ? $row['sumber_air'] : 'N/A'; ?></td>
                                <td><?php echo isset($row['memiliki_tempat_sampah']) ? $row['memiliki_tempat_sampah'] : 'N/A'; ?></td>
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
                            
                            <label>Kelompok Dasa Wisma:</label>
                            <input type="text" id="modalKelompokDasaWisma" class="form-control mb-3" readonly>

                            <label>Tahun:</label>
                            <input type="text" id="modalTahun" class="form-control mb-3" readonly>

                            <label>Nama Anggota Keluarga:</label>
                            <input type="text" id="modalNamaAnggotaKeluarga" class="form-control mb-3" readonly>

                            <label>Status Perkawinan:</label>
                            <input type="text" id="modalStatusPerkawinan" class="form-control mb-3" readonly>

                            <label>Jenis Kelamin:</label>
                            <input type="text" id="modalJenisKelamin" class="form-control mb-3" readonly>

                            <label>Tempat Lahir:</label>
                            <input type="text" id="modalTempatLahir" class="form-control mb-3" readonly>

                            <label>Tanggal Lahir:</label>
                            <input type="text" id="modalTanggalLahir" class="form-control mb-3" readonly>

                            <label>Umur:</label>
                            <input type="text" id="modalUmur" class="form-control mb-3" readonly>

                            <label>Agama:</label>
                            <input type="text" id="modalAgama" class="form-control mb-3" readonly>

                            <label>Pendidikan:</label>
                            <input type="text" id="modalPendidikan" class="form-control mb-3" readonly>

                            <label>Pekerjaan:</label>
                            <input type="text" id="modalPekerjaan" class="form-control mb-3" readonly>

                            <label>Berkebutuhan Khusus:</label>
                            <input type="text" id="modalBerkebutuhanKhusus" class="form-control mb-3" readonly>

                            <label>Penghayatan dan Pengamalan Pancasila:</label>
                            <input type="text" id="modalPenghayatanPengamalanPancasila" class="form-control mb-3" readonly>

                            <label>Gotong Royong:</label>
                            <input type="text" id="modalGotongRoyong" class="form-control mb-3" readonly>

                            <label>Pendidikan dan Keterampilan:</label>
                            <input type="text" id="modalPendidikanKeterampilan" class="form-control mb-3" readonly>

                            <label>Pengembangan Kehidupan Berkoperasi:</label>
                            <input type="text" id="modalPengembanganKehBerkoperasi" class="form-control mb-3" readonly>

                            <label>Pangan:</label>
                            <input type="text" id="modalPangan" class="form-control mb-3" readonly>

                            <label>Sandang:</label>
                            <input type="text" id="modalSandang" class="form-control mb-3" readonly>

                            <label>Kesehatan:</label>
                            <input type="text" id="modalKesehatan" class="form-control mb-3" readonly>

                            <label>Perencanaan Sehat:</label>
                            <input type="text" id="modalPerencanaanSehat" class="form-control mb-3" readonly>

                            <label>Rumah Layak Huni:</label>
                            <input type="text" id="modalKriteriaRumah" class="form-control mb-3" readonly>

                            <label>Jamban Keluarga:</label>
                            <input type="text" id="modalJambanKeluarga" class="form-control mb-3" readonly>

                            <label>Jumlah Jamban Keluarga:</label>
                            <input type="text" id="modalJumlahJambanKeluarga" class="form-control mb-3" readonly>

                            <label>Sumber Air:</label>
                            <input type="text" id="modalSumberAir" class="form-control mb-3" readonly>

                            <label>Memiliki Tempat Sampah:</label>
                            <input type="text" id="modalMemilikiTempatSampah" class="form-control mb-3" readonly>
                                <!-- <label>Keterangan:</label>
                                <input type="text" id="modalKeterangan" class="form-control mb-3" readonly> -->
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
           url: 'rekap_catatan_dasawisma_fetch.php', // Pastikan path ini benar
           type: 'GET',
           data: { id: id },
           dataType: 'json', // Expect a JSON response
           success: function(data) {
               console.log(data); // Tambahkan ini untuk melihat data yang diterima
               if (data) {
                   // Populate modal with data
                   $('#modalId').val(data.id);
                   $('#modalKelompokDasaWisma').val(data.kelompok_dasa_wisma);
                   $('#modalTahun').val(data.tahun);
                   $('#modalNamaAnggotaKeluarga').val(data.nama_anggota_keluarga);
                   $('#modalStatusPerkawinan').val(data.status_perkawinan);
                   $('#modalJenisKelamin').val(data.jenis_kelamin);
                   $('#modalTempatLahir').val(data.tempat_lahir);
                   $('#modalTanggalLahir').val(data.tanggal_lahir);
                   $('#modalUmur').val(data.umur);
                   $('#modalAgama').val(data.agama);
                   $('#modalPendidikan').val(data.pendidikan);
                   $('#modalPekerjaan').val(data.pekerjaan);
                   $('#modalBerkebutuhanKhusus').val(data.berkebutuhan_khusus);
                   $('#modalPenghayatanPengamalanPancasila').val(data.penghayatan_pengamalan_pancasila);
                   $('#modalGotongRoyong').val(data.gotong_royong);
                   $('#modalPendidikanKeterampilan').val(data.pendidikan_keterampilan);
                   $('#modalPengembanganKehBerkoperasi').val(data.pengembangan_keh_berkoperasi);
                   $('#modalPangan').val(data.pangan);
                   $('#modalSandang').val(data.sandang);
                   $('#modalKesehatan').val(data.kesehatan);
                   $('#modalPerencanaanSehat').val(data.perencanaan_sehat);
                   $('#modalKriteriaRumah').val(data.kriteria_rumah);
                   $('#modalJambanKeluarga').val(data.jamban_keluarga);
                   $('#modalJumlahJambanKeluarga').val(data.jumlah_jamban_keluarga);
                   $('#modalSumberAir').val(data.sumber_air);
                   $('#modalMemilikiTempatSampah').val(data.memiliki_tempat_sampah);
               } else {
                   alert('Data not found');
               }
           },
           error: function() {
               alert('Error fetching data');
           }
       });
   }
   </script>
</body>
</html>
