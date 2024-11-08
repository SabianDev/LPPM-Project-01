<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM rekap_catatan_pkk_rw";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT : REKAP CATATAN PKK RT</title>

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
            <h3>EDIT : REKAP CATATAN PKK RT</h3>
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
                        <th scope="col">Anggota PKK RW</th>
                        <th scope="col">Anggota PKK RT</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Jumlah Dasa Wisma</th>
                        <th scope="col">Jumlah RT</th>
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
                        <th scope="col">Sehat</th>
                        <th scope="col">Kurang Sehat</th>
                        <th scope="col">Memiliki Tempat Pembuangan Sampah</th>
                        <th scope="col">Memiliki Spal</th>
                        <th scope="col">Memiliki Jamban Keluarga</th>
                        <th scope="col">Menempel Stiker P4k</th>
                        <th scope="col">PDAM</th>
                        <th scope="col">Sumur</th>
                        <th scope="col">Dll</th>
                        <th scope="col">Beras</th>
                        <th scope="col">Non Beras</th>
                        <th scope="col">UP2K</th>
                        <th scope="col">Pemanfaatan Tanah Perkarangan</th>
                        <th scope="col">Industri Rumah Tangga</th>
                        <th scope="col">Kesehatan Lingkungan</th>
                        <th scope="col">Keterangan</th>
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
                                    <!-- Button View, Edit, Delete (Edit linknya aja) -->
                                    <div class="tbl-item-button">
                                        <a class="a-link" href="#" data-bs-toggle="modal" data-bs-target="#dataModal" onclick="showData(<?= $row['id']; ?>)">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/view-eye-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_rekap_catatan_pkk_rw_form.php?id=<?= $row['id']; ?>">
                                            <button type="button" class="btn btn-light btn-custom1">
                                                <img class="span-img" src="../../img/pen-svgrepo-com.svg"></img>
                                            </button>
                                        </a>

                                        <a class="a-link" href="edit_rekap_catatan_pkk_rw_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                            <button type="button" class="btn btn-danger btn-custom1">
                                                <img class="span-img" src="../../img/trash-svgrepo-com.svg"></img>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kelurahan']; ?></td>
                                <td><?php echo isset($row['anggota_pkk_rw']) ? $row['anggota_pkk_rw'] : ''; ?></td>
                                <td><?php echo isset($row['anggota_pkk_rt']) ? $row['anggota_pkk_rt'] : ''; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['bulan']; ?></td>
                                <td><?php echo isset($row['jumlah_dasa_wisma']) ? $row['jumlah_dasa_wisma'] : ''; ?></td>
                                <td><?php echo isset($row['jumlah_rt']) ? $row['jumlah_rt'] : ''; ?></td>
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
                                <td><?php echo $row['sehat']; ?></td>
                                <td><?php echo $row['kurang_sehat']; ?></td>
                                <td><?php echo $row['memiliki_tempat_pembuangan_sampah']; ?></td>
                                <td><?php echo $row['memiliki_spal']; ?></td>
                                <td><?php echo $row['memiliki_jamban_keluarga']; ?></td>
                                <td><?php echo $row['menempel_stiker_p4k']; ?></td>
                                <td><?php echo $row['pdam']; ?></td>
                                <td><?php echo $row['sumur']; ?></td>
                                <td><?php echo $row['dll']; ?></td>
                                <td><?php echo $row['beras']; ?></td>
                                <td><?php echo $row['non_beras']; ?></td>
                                <td><?php echo $row['up2k']; ?></td>
                                <td><?php echo $row['pemanfaatan_tanah_perkarangan']; ?></td>
                                <td><?php echo $row['industri_rumah_tangga']; ?></td>
                                <td><?php echo $row['kesehatan_lingkungan']; ?></td>
                                <td><?php echo $row['keterangan']; ?></td>
                            </tr>
                        <?php 
                        $num = $num + 1;
                        endwhile; 
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="37" class="text-center">Tidak ada data</td>
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
                            <label>Anggota PKK RW:</label>
                            <input type="text" id="modalAnggotaPKKRW" class="form-control mb-3" readonly value="<?php echo isset($row['anggota_pkk_rw']) ? $row['anggota_pkk_rw'] : ''; ?>">
                            <label>Anggota PKK RT:</label>
                            <input type="text" id="modalAnggotaPKKRT" class="form-control mb-3" readonly value="<?php echo isset($row['anggota_pkk_rt']) ? $row['anggota_pkk_rt'] : ''; ?>">
                            <label>Tahun:</label>
                            <input type="text" id="modalTahun" class="form-control mb-3" readonly>
                            <label>Bulan:</label>
                            <input type="text" id="modalBulan" class="form-control mb-3" readonly>
                            <label>No. RW:</label>
                            <input type="text" id="modalNoRW" class="form-control mb-3" readonly value="<?php echo isset($row['no_rw']) ? $row['no_rw'] : ''; ?>">
                            <label>Jumlah Dasa Wisma:</label>
                            <input type="text" id="modalJumlahDasaWisma" class="form-control mb-3" readonly value="<?php echo isset($row['jumlah_dasa_wisma']) ? $row['jumlah_dasa_wisma'] : ''; ?>">
                            <label>Jumlah RT:</label>
                            <input type="text" id="modalJumlahRT" class="form-control mb-3" readonly value="<?php echo isset($row['jumlah_rt']) ? $row['jumlah_rt'] : ''; ?>">
                            <label>Jumlah KK:</label>
                            <input type="text" id="modalJumlahKK" class="form-control mb-3" readonly>
                            <label>Total Laki-Laki:</label>
                            <input type="text" id="modalTotalLakiLaki" class="form-control mb-3" readonly>
                            <label>Total Perempuan:</label>
                            <input type="text" id="modalTotalPerempuan" class="form-control mb-3" readonly>
                            <label>Balita Laki-Laki:</label>
                            <input type="text" id="modalBalitaLakiLaki" class="form-control mb-3" readonly>
                            <label>Balita Perempuan:</label>
                            <input type="text" id="modalBalitaPerempuan" class="form-control mb-3" readonly>
                            <label>Pasangan Usia Subur (PUS):</label>
                            <input type="text" id="modalPasanganUsiaSubur" class="form-control mb-3" readonly>
                            <label>Wanita Usia Subur (WUS):</label>
                            <input type="text" id="modalWanitaUsiaSubur" class="form-control mb-3" readonly>
                            <label>Ibu Hamil:</label>
                            <input type="text" id="modalIbuHamil" class="form-control mb-3" readonly>
                            <label>Ibu Menyusui</label>
                            <input type="text" id="modalIbuMenyusui" class="form-control mb-3" readonly>
                            <label>Lansia:</label>
                            <input type="text" id="modalLansia" class="form-control mb-3" readonly>
                            <label>3 Buta:</label>
                            <input type="text" id="modalTigaButa" class="form-control mb-3" readonly>
                            <label>Berkebutuhan Khusus:</label>
                            <input type="text" id="modalBerkebutuhanKhusus" class="form-control mb-3" readonly>
                            <label>Sehat:</label>
                            <input type="text" id="modalSehat" class="form-control mb-3" readonly>
                            <label>Kurang Sehat:</label>
                            <input type="text" id="modalKurangSehat" class="form-control mb-3" readonly>
                            <label>Memiliki Tempat Pembuangan Sampah:</label>
                            <input type="text" id="modalTempatPembuanganSampah" class="form-control mb-3" readonly>
                            <label>Memiliki Spal:</label>
                            <input type="text" id="modalMemilikiSpal" class="form-control mb-3" readonly>
                            <label>Memiliki Jamban Keluarga:</label>
                            <input type="text" id="modalMemilikiJambanKeluarga" class="form-control mb-3" readonly>
                            <label>Menempel Stiker P4k:</label>
                            <input type="text" id="modalMenempelStikerP4k" class="form-control mb-3" readonly>
                            <label>PDAM:</label>
                            <input type="text" id="modalPDAM" class="form-control mb-3" readonly>
                            <label>Sumur:</label>
                            <input type="text" id="modalSumur" class="form-control mb-3" readonly>
                            <label>Dll:</label>
                            <input type="text" id="modalDll" class="form-control mb-3" readonly>
                            <label>Beras:</label>
                            <input type="text" id="modalBeras" class="form-control mb-3" readonly>
                            <label>Non Beras:</label>
                            <input type="text" id="modalNonBeras" class="form-control mb-3" readonly>
                            <label>UP2K:</label>
                            <input type="text" id="modalUP2K" class="form-control mb-3" readonly>
                            <label>Pemanfaatan Tanah Pekarangan</label>
                            <input type="text" id="modalPemanfaatanTanahPekarangan" class="form-control mb-3" readonly>
                            <label>Industri Rumah Tangga:</label>
                            <input type="text" id="modalIndustriRumahTangga" class="form-control mb-3" readonly>
                            <label>Kesehatan Lingkungan:</label>
                            <input type="text" id="modalKesehatanLingkungan" class="form-control mb-3" readonly>
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

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>

    <!-- Add JavaScript function to fetch and display data in the modal -->
  
    <script>
    function showData(id) {
        // Fetch data using AJAX
        $.ajax({
            url: 'edit_rekap_catatan_pkk_rw_fetch.php', // ini ubah ke edit_x_fetch.php
            type: 'GET',
            data: { id: id },
            dataType: 'json', // Expect a JSON response
            success: function(data) {
                if (data) {
                    // Populate modal with data
                    $('#modalId').val(data.id);
                    $('#modalKelurahan').val(data.kelurahan);
                    $('#modalAnggotaPKKRW').val(data.anggota_pkk_rw); // Perbaikan
                    $('#modalAnggotaPKKRT').val(data.anggota_pkk_rt); // Perbaikan
                    $('#modalTahun').val(data.tahun);
                    $('#modalBulan').val(data.bulan);
                    $('#modalNoRW').val(data.no_rw); // Perbaikan
                    $('#modalJumlahDasaWisma').val(data.jumlah_dasa_wisma);
                    $('#modalJumlahRT').val(data.jumlah_rt);
                    $('#modalJumlahKK').val(data.jumlah_kk);
                    $('#modalTotalLakiLaki').val(data.total_laki_laki);
                    $('#modalTotalPerempuan').val(data.total_perempuan);
                    $('#modalBalitaLakiLaki').val(data.balita_laki_laki);
                    $('#modalBalitaPerempuan').val(data.balita_perempuan);
                    $('#modalPasanganUsiaSubur').val(data.pasangan_usia_subur);
                    $('#modalWanitaUsiaSubur').val(data.wanita_usia_subur);
                    $('#modalIbuHamil').val(data.ibu_hamil);
                    $('#modalIbuMenyusui').val(data.ibu_menyusui);
                    $('#modalLansia').val(data.lansia);
                    $('#modalTigaButa').val(data.tiga_buta);
                    $('#modalBerkebutuhanKhusus').val(data.berkebutuhan_khusus);
                    $('#modalSehat').val(data.sehat);
                    $('#modalKurangSehat').val(data.kurang_sehat);
                    $('#modalTempatPembuanganSampah').val(data.memiliki_tempat_pembuangan_sampah);
                    $('#modalMemilikiSpal').val(data.memiliki_spal);
                    $('#modalMemilikiJambanKeluarga').val(data.memiliki_jamban_keluarga);
                    $('#modalMenempelStikerP4k').val(data.menempel_stiker_p4k);
                    $('#modalPDAM').val(data.pdam);
                    $('#modalSumur').val(data.sumur);
                    $('#modalDll').val(data.dll);
                    $('#modalBeras').val(data.beras);
                    $('#modalNonBeras').val(data.non_beras);
                    $('#modalUP2K').val(data.up2k);
                    $('#modalPemanfaatanTanahPekarangan').val(data.pemanfaatan_tanah_perkarangan); // Perbaikan
                    $('#modalIndustriRumahTangga').val(data.industri_rumah_tangga);
                    $('#modalKesehatanLingkungan').val(data.kesehatan_lingkungan);
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
