<?php
    include 'connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM nama_database";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : NAMA FORM</title>

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
            <h3>EDIT : NAMA FORM</h3>
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
        

        <!-- MAIN TABLE (Edit Sesuai Kebutuhan, kalau ada error, tambah kolom opsi setelah No.)-->
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-edit">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Opsi</th>
                        <th scope="col">Id</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">Kelompok PKK RW</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Nama Kelompok Dasawisma</th>
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
                        // iterasi No.
                        $num = 1;
                        if ($result->num_rows > 0): 
                    ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td>
                                    <!-- Button View, Edit, Delete (Edit link deletenya aja) -->
                                    <div class="tbl-item-button">
                                        <!-- EDIT -->
                                        <a class="a-link" href="#" data-bs-toggle="modal" data-bs-target="#dataModal" onclick="showData(<?= $row['id']; ?>)">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="img/view-eye-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <!-- VIEW -->
                                        <a class="a-link" href="#" onclick="showEditData(<?= $row['id']; ?>); $('#editDataModal').modal('show');">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <!-- DELETE -->
                                        <!-- Edit ke halaman edix_x_hapus.php -->
                                        <a class="a-link" href="edit_data_hamil_per_rw_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kelurahan']; ?></td>
                                <td><?php echo $row['kelompok_pkk_rw']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['nama_kelompok_dasawisma']; ?></td>
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
                        <label>ID:</label>
                        <input type="text" id="modalId" class="form-control mb-3" readonly>
                        
                        <label>Kelurahan:</label>
                        <input type="text" id="modalKelurahan" class="form-control mb-3" readonly>
                        
                        <label>Kelompok PKK RW:</label>
                        <input type="text" id="modalKelompokPKK" class="form-control mb-3" readonly>
                        
                        <label>Tahun:</label>
                        <input type="text" id="modalTahun" class="form-control mb-3" readonly>
                        
                        <label>Nama Kelompok Dasawisma:</label>
                        <input type="text" id="modalNamaKelompok" class="form-control mb-3" readonly>
                        
                        <label>Hamil:</label>
                        <input type="text" id="modalHamil" class="form-control mb-3" readonly>
                        
                        <label>Melahirkan:</label>
                        <input type="text" id="modalMelahirkan" class="form-control mb-3" readonly>
                        
                        <label>Nifas:</label>
                        <input type="text" id="modalNifas" class="form-control mb-3" readonly>
                        
                        <label>Meninggal:</label>
                        <input type="text" id="modalMeninggal" class="form-control mb-3" readonly>
                        
                        <label>Lahir Laki Laki:</label>
                        <input type="text" id="modalLahirLaki" class="form-control mb-3" readonly>
                        
                        <label>Lahir Perempuan:</label>
                        <input type="text" id="modalLahirPerempuan" class="form-control mb-3" readonly>
                        
                        <label>Memiliki Akte Kelahiran:</label>
                        <input type="text" id="modalMemilikiAkte" class="form-control mb-3" readonly>
                        
                        <label>Tidak Memiliki Akte Kelahiran:</label>
                        <input type="text" id="modalTidakMemilikiAkte" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Laki Laki Bayi:</label>
                        <input type="text" id="modalMeninggalLakiBayi" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Perempuan Bayi:</label>
                        <input type="text" id="modalMeninggalPerempuanBayi" class="form-control mb-3" readonly>
                        
                        <label>Meninggal Laki Laki Balita:</label>
                        <input type="text" id="modalMeninggalLakiBalita" class="form-control mb-3" readonly>
                        
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

    <!-- MODAL UNTUK EDIT DATA -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="max-height: 400px; overflow-y: auto;"> <!-- Added styles for scrolling -->
                    <form id="editForm" method="POST" action="edit_data_hamil_per_rw_process.php">
                        <!-- buat nyimpen ID (jgn di edit) -->
                        <input type="hidden" id="editId" name="id">

                        
                        <!-- Display form record disini (Edit sesuai kebutuhan) -->
                        <div class="mb-3">
                            <label for="editKelurahan" class="form-label">Kelurahan</label>
                            <input type="text" class="form-control" id="editKelurahan" name="kelurahan">
                        </div>
                        <div class="mb-3">
                            <label for="editRW" class="form-label">Kelompok PKK RW</label>
                            <input type="text" class="form-control" id="editRW" name="rw">
                        </div>
                        <div class="mb-3">
                            <label for="editTahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control" id="editTahun" name="tahun">
                        </div>
                        <div class="mb-3">
                            <label for="editKelompok" class="form-label">Nama Kelompok Dasawisma</label>
                            <input type="text" class="form-control" id="editKelompok" name="kelompok">
                        </div>
                        <div class="mb-3">
                            <label for="editHamil" class="form-label">Hamil</label>
                            <input type="number" class="form-control" id="editHamil" name="hamil">
                        </div>
                        <div class="mb-3">
                            <label for="editMelahirkan" class="form-label">Melahirkan</label>
                            <input type="number" class="form-control" id="editMelahirkan" name="melahirkan">
                        </div>
                        <div class="mb-3">
                            <label for="editNifas" class="form-label">Nifas</label>
                            <input type="number" class="form-control" id="editNifas" name="nifas">
                        </div>
                        <div class="mb-3">
                            <label for="editIbuMeninggal" class="form-label">Meninggal</label>
                            <input type="number" class="form-control" id="editIbuMeninggal" name="ibuMeninggal">
                        </div>
                        <div class="mb-3">
                            <label for="editLahirLaki" class="form-label">Lahir Laki-Laki</label>
                            <input type="number" class="form-control" id="editLahirLaki" name="lahirLaki">
                        </div>
                        <div class="mb-3">
                            <label for="editLahirPerempuan" class="form-label">Lahir Perempuan</label>
                            <input type="number" class="form-control" id="editLahirPerempuan" name="lahirPerempuan">
                        </div>
                        <div class="mb-3">
                            <label for="editAkteAda" class="form-label">Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="editAkteAda" name="akteAda">
                        </div>
                        <div class="mb-3">
                            <label for="editAkteTidakAda" class="form-label">Tidak Memiliki Akte Kelahiran</label>
                            <input type="number" class="form-control" id="editAkteTidakAda" name="akteTidakAda">
                        </div>
                        <div class="mb-3">
                            <label for="editBayiMeninggalLaki" class="form-label">Meninggal Laki-Laki</label>
                            <input type="number" class="form-control" id="editBayiMeninggalLaki" name="bayiMeninggalLaki">
                        </div>
                        <div class="mb-3">
                            <label for="editBayiMeninggalPerempuan" class="form-label">Meninggal Perempuan</label>
                            <input type="number" class="form-control" id="editBayiMeninggalPerempuan" name="bayiMeninggalPerempuan">
                        </div>
                        <div class="mb-3">
                            <label for="editBalitaMeninggalLaki" class="form-label">Meninggal Laki-Laki Balita</label>
                            <input type="number" class="form-control" id="editBalitaMeninggalLaki" name="balitaMeninggalLaki">
                        </div>
                        <div class="mb-3">
                            <label for="editBalitaMeninggalPerempuan" class="form-label">Meninggal Perempuan Balita</label>
                            <input type="number" class="form-control" id="editBalitaMeninggalPerempuan" name="balitaMeninggalPerempuan">
                        </div>
                        <div class="mb-3">
                            <label for="editKeterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="editKeterangan" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
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
            url: 'edit_data_hamil_per_rw_fetch.php', // ini ubah ke edit_x_fetch.php
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data (Edit sesuai kebutuhan, ini ngambil dari id view data)
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#modalKelompokPKK').val(data.kelompok_pkk_rw);
                    $('#modalTahun').val(data.tahun);
                    $('#modalNamaKelompok').val(data.nama_kelompok_dasawisma);
                    $('#modalHamil').val(data.hamil);
                    $('#modalMelahirkan').val(data.melahirkan);
                    $('#modalNifas').val(data.nifas);
                    $('#modalMeninggal').val(data.meninggal);
                    $('#modalLahirLaki').val(data.lahir_laki_laki);
                    $('#modalLahirPerempuan').val(data.lahir_perempuan);
                    $('#modalMemilikiAkte').val(data.memiliki_akte_kelahiran);
                    $('#modalTidakMemilikiAkte').val(data.tidak_memiliki_akte_kelahiran);
                    $('#modalMeninggalLakiBayi').val(data.meninggal_laki_laki_bayi);
                    $('#modalMeninggalPerempuanBayi').val(data.meninggal_perempuan_bayi);
                    $('#modalMeninggalLakiBalita').val(data.meninggal_laki_laki_balita);
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

    function showEditData(id) {
    // Fetch data using AJAX
    $.ajax({
        url: 'edit_data_hamil_per_rw_fetch.php', // ini ubah ke edit_x_fetch.php
        type: 'GET',
        data: { id: id },
        dataType: 'json', // Expect a JSON response
        success: function(data) {
            if (data) {
                // Populate modal with data (Edit sesuai kebutuhan, ini ngambil dari id edit data)
                $('#editId').val(data.id);
                $('#editKelurahan').val(data.kelurahan);
                $('#editRW').val(data.kelompok_pkk_rw);
                $('#editTahun').val(data.tahun);
                $('#editKelompok').val(data.nama_kelompok_dasawisma);
                $('#editHamil').val(data.hamil);
                $('#editMelahirkan').val(data.melahirkan);
                $('#editNifas').val(data.nifas);
                $('#editIbuMeninggal').val(data.meninggal);
                $('#editLahirLaki').val(data.lahir_laki_laki);
                $('#editLahirPerempuan').val(data.lahir_perempuan);
                $('#editAkteAda').val(data.memiliki_akte_kelahiran);
                $('#editAkteTidakAda').val(data.tidak_memiliki_akte_kelahiran);
                $('#editBayiMeninggalLaki').val(data.meninggal_laki_laki_bayi);
                $('#editBayiMeninggalPerempuan').val(data.meninggal_perempuan_bayi);
                $('#editBalitaMeninggalLaki').val(data.meninggal_laki_laki_balita);
                $('#editBalitaMeninggalPerempuan').val(data.meninggal_perempuan_balita);
                $('#editKeterangan').val(data.keterangan);
                
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
    }
    </script>
</body>
</html>
