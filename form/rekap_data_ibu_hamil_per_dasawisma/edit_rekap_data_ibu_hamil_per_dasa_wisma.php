<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM rekap_data_ibu_hamil_per_dasa_wisma";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : REKAP DATA IBU HAMIL PER DASAWISMA</title>

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
            <h3>EDIT : REKAP DATA IBU HAMIL PER DASAWISMA</h3>
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
        

        <!-- MAIN TABLE -->
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-edit">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Id</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Kelompok PKK RW</th>
                        <th scope="col">Kelompok PKK RT</th>
                        <th scope="col">Kelompok Dasawisma</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Nama Ibu</th>
                        <th scope="col">Nama Suami</th>
                        <th scope="col">Status Hamil</th>
                        <th scope="col">Status Melahirkan</th>
                        <th scope="col">Status Nifas</th>
                        <th scope="col">Nama Bayi (Lahir)</th>
                        <th scope="col">Jenis Kelamin Bayi</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Akte Kelahiran</th>
                        <th scope="col">Nama Ibu (Meninggal)</th>
                        <th scope="col">Nama Bayi (Meninggal)</th>
                        <th scope="col">Nama Balita (Meninggal)</th>
                        <th scope="col">Status (Meninggal)</th>
                        <th scope="col">Jenis Kelamin (Meninggal)</th>
                        <th scope="col">Tanggal Meninggal</th>
                        <th scope="col">Sebab Meninggal</th>
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
                                <div class="tbl-item-button">
                                    <a class="a-link" href="#" data-bs-toggle="modal" data-bs-target="#dataModal" onclick="showData(<?= $row['id']; ?>)">
                                        <button type="button" class="btn btn-light btn-custom1">
                                            <img class="span-img" src="../../img/view-eye-svgrepo-com.svg"></img>
                                        </button>
                                    </a>
                                    <a class="a-link" href="edit_rekap_data_ibu_hamil_per_dasa_wisma_form.php?id=<?= $row['id']; ?>">
                                        <button type="button" class="btn btn-light btn-custom1">
                                            <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                        </button>
                                    </a>
                                    <a class="a-link" href="edit_rekap_data_ibu_hamil_per_dasa_wisma_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
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
                            <td><?php echo $row['kelompok_dasa_wisma']; ?></td>
                            <td><?php echo $row['tahun']; ?></td>
                            <td><?php echo $row['bulan']; ?></td>
                            <td><?php echo $row['nama_ibu_hmn']; ?></td>
                            <td><?php echo $row['nama_suami_hmn']; ?></td>
                            <td><?php echo $row['hamil_status']; ?></td>
                            <td><?php echo $row['melahirkan_status']; ?></td>
                            <td><?php echo $row['nifas_status']; ?></td>
                            <td><?php echo $row['nama_bayi_ml']; ?></td>
                            <td><?php echo $row['jenis_kelamin_ml']; ?></td>
                            <td><?php echo $row['tempat_lahir']; ?></td>
                            <td><?php echo $row['tanggal_lahir']; ?></td>
                            <td><?php echo $row['akte_kelahiran']; ?></td>
                            <td><?php echo $row['nama_ibu_mt']; ?></td>
                            <td><?php echo $row['nama_bayi_mt']; ?></td>
                            <td><?php echo $row['nama_balita']; ?></td>
                            <td><?php echo $row['status_mt']; ?></td>
                            <td><?php echo $row['jenis_kelamin_mt']; ?></td>
                            <td><?php echo $row['tanggal_meninggal']; ?></td>
                            <td><?php echo $row['sebab_meninggal']; ?></td>
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
                    <!-- Display data here -->
                    <div id="modalDataContent">
                        <h4>Informasi</h4><br>
                        <label>ID:</label>
                        <input type="text" id="modalId" class="form-control mb-3" readonly>
                        
                        <label>Kelurahan:</label>
                        <input type="text" id="modalKelurahan" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK RW:</label>
                        <input type="text" id="modalKelompokPKK" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK RT:</label>
                        <input type="text" id="modalKelompokRT" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Nama Kelompok Dasawisma:</label>
                        <input type="text" id="modalNamaKelompok" class="form-control mb-3" readonly>
                        
                        <label>Tahun:</label>
                        <input type="text" id="modalTahun" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Bulan:</label>
                        <input type="text" id="modalBulan" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <h4>Status Ibu Hamil, Melahirkan dan Nifas</h4><br>
                        <label>Nama Ibu:</label>
                        <input type="text" id="modalNamaIbu" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Nama Suami:</label>
                        <input type="text" id="modalNamaSuami" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Status Hamil:</label>
                        <input type="text" id="modalStatusHamil" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Status Melahirkan:</label>
                        <input type="text" id="modalStatusMelahirkan" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Status Nifas:</label>
                        <input type="text" id="modalStatusNifas" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <h4>Catatan Melahirkan</h4>
                        <label>Nama Bayi:</label>
                        <input type="text" id="modalNamaBayi" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Jenis Kelamin:</label>
                        <input type="text" id="modalJenisKelaminBayi" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Tempat Lahir:</label>
                        <input type="text" id="modalTempatLahir" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Tanggal Lahir:</label>
                        <input type="text" id="modalTanggalLahir" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <label>Akte Kelahiran:</label>
                        <input type="text" id="modalAkteKelahiran" class="form-control mb-3" readonly> <!-- Updated ID -->
                        
                        <h4>Catatan Kematian</h4>
                        <label>Nama Ibu:</label>
                        <input type="text" id="modalNamaIbuKematian" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Nama Bayi:</label>
                        <input type="text" id="modalNamaBayiKematian" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Nama Balita:</label>
                        <input type="text" id="modalNamaBalita" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Status:</label>
                        <input type="text" id="modalStatusKematian" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Jenis Kelamin:</label>
                        <input type="text" id="modalJenisKelaminKematian" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Tanggal Meninggal:</label>
                        <input type="text" id="modalTanggalMeninggal" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Sebab Meninggal:</label>
                        <input type="text" id="modalSebabMeninggal" class="form-control mb-3" readonly> <!-- Updated ID -->

                        <label>Keterangan:</label>
                        <input type="text" id="modalKeteranganKematian" class="form-control mb-3" readonly> <!-- Updated ID -->
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
            url: 'edit_rekap_data_ibu_hamil_per_dasa_wisma_fetch.php', // Fetch data based on ID
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#modalKelompokPKK').val(data.kelompok_pkk_rw);
                    $('#modalKelompokRT').val(data.kelompok_pkk_rt);
                    $('#modalNamaKelompok').val(data.kelompok_dasa_wisma);
                    $('#modalTahun').val(data.tahun);
                    $('#modalBulan').val(data.bulan);
                    $('#modalNamaIbu').val(data.nama_ibu_hmn);
                    $('#modalNamaSuami').val(data.nama_suami_hmn);
                    $('#modalStatusHamil').val(data.hamil_status);
                    $('#modalStatusMelahirkan').val(data.melahirkan_status);
                    $('#modalStatusNifas').val(data.nifas_status);
                    $('#modalNamaBayi').val(data.nama_bayi_ml);
                    $('#modalJenisKelaminBayi').val(data.jenis_kelamin_ml);
                    $('#modalTempatLahir').val(data.tempat_lahir);
                    $('#modalTanggalLahir').val(data.tanggal_lahir);
                    $('#modalAkteKelahiran').val(data.akte_kelahiran);
                    $('#modalNamaIbuKematian').val(data.nama_ibu_mt);
                    $('#modalNamaBayiKematian').val(data.nama_bayi_mt);
                    $('#modalNamaBalita').val(data.nama_balita);
                    $('#modalStatusKematian').val(data.status_mt);
                    $('#modalJenisKelaminKematian').val(data.jenis_kelamin_mt);
                    $('#modalTanggalMeninggal').val(data.tanggal_meninggal);
                    $('#modalSebabMeninggal').val(data.sebab_meninggal);
                    $('#modalKeteranganKematian').val(data.keterangan);
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
