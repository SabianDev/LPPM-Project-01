<?php
include('../connect.php');
// Koneksi ke database

// Ganti sesuai kebutuhan
$sql = "SELECT * FROM kegiatan_warga";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : KEGIATAN WARGA</title>

    <!-- LINKS -->
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <!-- HEADER -->
    <header class="header">
        <div class="header-left">
            <h3>EDIT : KEGIATAN WARGA</h3>
        </div>
        <div class="header-right">
            <a href="../mainmenu-admin.php" class="btn btn-light">Kembali</a>
        </div>
    </header>

    <div class="content mt-5">

        <!-- PESAN UNTUK FUNGSI HAPUS -->
        <?php if (isset($_GET['id'])): ?>
            <div class="alert-container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data dengan id <?= htmlspecialchars($_GET['id']); ?> berhasil dihapus!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.querySelector('.alert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.classList.add('fade');
                    }
                }, 7000);
            </script>
        <?php endif; ?>
        
        <!-- PESAN UNTUK FUNGSI EDIT -->
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
                        <th scope="col">ID</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Pemilihan Sampah</th>
                        <th scope="col">Lubang Biopori</th>
                        <th scope="col">Tanaman Obat Keluarga</th>
                        <th scope="col">Kampung Berkebun</th>
                        <th scope="col">Buruan Sae</th>
                        <th scope="col">Sumur Resapan</th>
                        <th scope="col">Loseda</th>
                        <th scope="col">Industri Makanan</th>
                        <th scope="col">Industri Minuman</th>
                        <th scope="col">Industri Kerajinan</th>
                        <th scope="col">Industri Rajut</th>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                                        <a class="a-link" href="edit_kegiatan_warga_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_kegiatan_warga_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="../../img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kegiatan']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                                <td><?php echo $row['pemilihan_sampah']; ?></td>
                                <td><?php echo $row['lubang_biopori']; ?></td>
                                <td><?php echo $row['tanaman_obat_keluarga']; ?></td>
                                <td><?php echo $row['kampung_berkebun']; ?></td>
                                <td><?php echo $row['buruan_sae']; ?></td>
                                <td><?php echo $row['sumur_resapan']; ?></td>
                                <td><?php echo $row['loseda']; ?></td>
                                <td><?php echo $row['industri_makanan']; ?></td>
                                <td><?php echo $row['industri_minuman']; ?></td>
                                <td><?php echo $row['industri_kerajinan']; ?></td>
                                <td><?php echo $row['industri_rajut']; ?></td>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        <?php 
                        $num = $num + 1;
                        endwhile; 
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
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
                        <!-- Display form record disini -->
                        <div>
                            <label>ID:</label>
                            <input type="text" id="modalId" class="form-control mb-3" readonly>
                            
                            <label>Kegiatan:</label>
                            <input type="text" id="modalKegiatan" class="form-control mb-3" readonly>
                            
                            <label>Keterangan:</label>
                            <input type="text" id="modalKeterangan" class="form-control mb-3" readonly>
                            
                            <!-- Tambahkan input lain sesuai kebutuhan -->
                            <label>Pemilihan Sampah:</label>
                            <input type="text" id="modalPemilihanSampah" class="form-control mb-3" readonly>
                            
                            <label>Lubang Biopori:</label>
                            <input type="text" id="modalLubangBiopori" class="form-control mb-3" readonly>
                            
                            <label>Tanaman Obat Keluarga:</label>
                            <input type="text" id="modalTanamanObat" class="form-control mb-3" readonly>
                            
                            <label>Kampung Berkebun:</label>
                            <input type="text" id="modalKampungBerkebun" class="form-control mb-3" readonly>
                            
                            <label>Buruan Sae:</label>
                            <input type="text" id="modalBuruanSae" class="form-control mb-3" readonly>
                            
                            <label>Sumur Resapan:</label>
                            <input type="text" id="modalSumurResapan" class="form-control mb-3" readonly>
                            
                            <label>Loseda:</label>
                            <input type="text" id="modalLoseda" class="form-control mb-3" readonly>
                            
                            <label>Industri Makanan:</label>
                            <input type="text" id="modalIndustriMakanan" class="form-control mb-3" readonly>
                            
                            <label>Industri Minuman:</label>
                            <input type="text" id="modalIndustriMinuman" class="form-control mb-3" readonly>
                            
                            <label>Industri Kerajinan:</label>
                            <input type="text" id="modalIndustriKerajinan" class="form-control mb-3" readonly>
                            
                            <label>Industri Rajut:</label>
                            <input type="text" id="modalIndustriRajut" class="form-control mb-3" readonly>
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
        $.ajax({
            url: 'edit_kegiatan_warga_fetch.php',
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                if (data) {
                    $('#modalId').val(data.id);
                    $('#modalKegiatan').val(data.kegiatan);
                    $('#modalKeterangan').val(data.keterangan);
                    $('#modalPemilihanSampah').val(data.pemilihan_sampah);
                    $('#modalLubangBiopori').val(data.lubang_biopori);
                    $('#modalTanamanObat').val(data.tanaman_obat_keluarga);
                    // Tambahkan pengisian data baru
                    $('#modalKampungBerkebun').val(data.kampung_berkebun);
                    $('#modalBuruanSae').val(data.buruan_sae);
                    $('#modalSumurResapan').val(data.sumur_resapan);
                    $('#modalLoseda').val(data.loseda);
                    $('#modalIndustriMakanan').val(data.industri_makanan);
                    $('#modalIndustriMinuman').val(data.industri_minuman);
                    $('#modalIndustriKerajinan').val(data.industri_kerajinan);
                    $('#modalIndustriRajut').val(data.industri_rajut);
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