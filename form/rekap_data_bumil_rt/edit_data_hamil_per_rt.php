<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM form_rekap_bumil_rt";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : REKAP DATA IBU HAMIL PER RT</title>

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
            <h3>EDIT : REKAP DATA IBU HAMIL PER RT</h3>
        </div>
        <div class="header-right">
        <a href="../mainmenu-admin.php" class="btn btn-light btn-nav-kembali">Kembali</a> <!-- Button to go back to mainmenu.php -->
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
        <table class="table table-hover table-striped table-bordered" id="table-default">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Id</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Kelompok Pkk Rw</th>
                        <th scope="col">Kelompok Pkk Rt</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Kelompok Pkk Dasawisma</th>
                        <th scope="col">Hamil</th>
                        <th scope="col">Melahirkan</th>
                        <th scope="col">Nifas</th>
                        <th scope="col">Meninggal</th>
                        <th scope="col">Lahir Laki Laki</th>
                        <th scope="col">Lahir Perempuan</th>
                        <th scope="col">Memiliki Akte Kelahiran</th>
                        <th scope="col">Tidak Memiliki Akte Kelahiran</th>
                        <th scope="col">Meninggal Laki Laki Bayi</th>
                        <th scope="col">Meninggal Perempuan Bayi</th>
                        <th scope="col">Meninggal Laki Laki Balita</th>
                        <th scope="col">Meninggal Perempuan Balita</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $num = 1;
                    if ($result->num_rows > 0): ?>
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
                                        <a class="a-link" href="edit_data_hamil_per_rt_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                        <a class="a-link" href="edit_data_hamil_per_rt_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
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
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['bulan']; ?></td>
                                <td><?php echo $row['kelompok_pkk_dasawisma']; ?></td>
                                <td><?php echo $row['hamil']; ?></td>
                                <td><?php echo $row['melahirkan']; ?></td>
                                <td><?php echo $row['nifas']; ?></td>
                                <td><?php echo $row['meninggal']; ?></td>
                                <td><?php echo $row['lahir_laki_laki']; ?></td>
                                <td><?php echo $row['lahir_perempuan']; ?></td>
                                <td><?php echo $row['memiliki_akte_kelahiran']; ?></td>
                                <td><?php echo $row['tidak_memiliki_akte_kelahiran']; ?></td>
                                <td><?php echo $row['meninggal_laki_laki_bayi']; ?></td>
                                <td><?php echo $row['meninggal_perempuan_bayi']; ?></td>
                                <td><?php echo $row['meninggal_laki_laki_balita']; ?></td>
                                <td><?php echo $row['meninggal_perempuan_balita']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                            </tr>
                        <?php 
                        $num = $num + 1;
                    endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="22">Tidak ada data ditemukan.</td>
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
                        <label>ID:</label>
                        <input type="text" id="modalId" class="form-control mb-3" readonly>
                        
                        <label>Kelurahan:</label>
                        <input type="text" id="modalKelurahan" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK RW:</label>
                        <input type="text" id="modalKelompokPKKRw" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK RT:</label>
                        <input type="text" id="modalKelompokPKKRt" class="form-control mb-3" readonly>
                        
                        <label>Tahun:</label>
                        <input type="text" id="modalTahun" class="form-control mb-3" readonly>
                        
                        <label>Bulan:</label>
                        <input type="text" id="modalBulan" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK Dasawisma:</label>
                        <input type="text" id="modalKelompokPKKDasawisma" class="form-control mb-3" readonly>
                        
                        <label>Hamil:</label>
                        <input type="text" id="modalHamil" class="form-control mb-3" readonly>
                        
                        <label>Melahirkan:</label>
                        <input type="text" id="modalMelahirkan" class="form-control mb-3" readonly>
                        
                        <label>Nifas:</label>
                        <input type="text" id="modalNifas" class="form-control mb-3" readonly>
                        
                        <label>Meninggal:</label>
                        <input type="text" id="modalMeninggal" class="form-control mb-3" readonly>
                        
                        <label>Lahir Laki Laki:</label>
                        <input type="text" id="modalLahirLakiLaki" class="form-control mb-3" readonly>
                        
                        <label>Lahir Perempuan:</label>
                        <input type="text" id="modalLahirPerempuan" class="form-control mb-3" readonly>
                        
                        <label>Memiliki Akte Kelahiran:</label>
                        <input type="text" id="modalMemilikiAkteKelahiran" class="form-control mb-3" readonly>
                        
                        <label>Tidak Memiliki Akte Kelahiran:</label>
                        <input type="text" id="modalTidakMemilikiAkteKelahiran" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Laki Laki Bayi:</label>
                        <input type="text" id="modalMeninggalLakiLakiBayi" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Perempuan Bayi:</label>
                        <input type="text" id="modalMeninggalPerempuanBayi" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Laki Laki Balita:</label>
                        <input type="text" id="modalMeninggalLakiLakiBalita" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Perempuan Balita:</label>
                        <input type="text" id="modalMeninggalPerempuanBalita" class="form-control mb-3" readonly>
                        
                        <label>Keterangan:</label>
                        <input type="text" id="modalKeterangan" class="form-control mb-3" readonly>
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
            url: 'edit_data_hamil_per_rt_fetch.php', // Fetch data based on ID
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#modalKelompokPKKRw').val(data.kelompok_pkk_rw);
                    $('#modalKelompokPKKRt').val(data.kelompok_pkk_rt);
                    $('#modalTahun').val(data.tahun);
                    $('#modalBulan').val(data.bulan);
                    $('#modalKelompokPKKDasawisma').val(data.kelompok_pkk_dasawisma);
                    $('#modalHamil').val(data.hamil);
                    $('#modalMelahirkan').val(data.melahirkan);
                    $('#modalNifas').val(data.nifas);
                    $('#modalMeninggal').val(data.meninggal);
                    $('#modalLahirLakiLaki').val(data.lahir_laki_laki);
                    $('#modalLahirPerempuan').val(data.lahir_perempuan);
                    $('#modalMemilikiAkteKelahiran').val(data.memiliki_akte_kelahiran);
                    $('#modalTidakMemilikiAkteKelahiran').val(data.tidak_memiliki_akte_kelahiran);
                    $('#modalMeninggalLakiLakiBayi').val(data.meninggal_laki_laki_bayi);
                    $('#modalMeninggalPerempuanBayi').val(data.meninggal_perempuan_bayi);
                    $('#modalMeninggalLakiLakiBalita').val(data.meninggal_laki_laki_balita);
                    $('#modalMeninggalPerempuanBalita').val(data.meninggal_perempuan_balita);
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

    </script>
</body>
</html>
