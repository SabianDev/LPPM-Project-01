<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM data_per_dasawisma";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : DATA PER DASA WISMA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>DATA PER DASA WISMA (View Only)</h3>
        </div>
        <div class="header-right">
            <a href="../mainmenu.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
        </div>
    </header>

    <div class="content mt-5">
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-default">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
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
                    $num = 1;
                    if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
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
                    endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="30" class="text-center">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>
</body>
</html>