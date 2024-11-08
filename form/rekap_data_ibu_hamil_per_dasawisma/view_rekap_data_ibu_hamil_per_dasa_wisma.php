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
    <title>VIEW : REKAP DATA IBU HAMIL PER DASAWISMA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>REKAP DATA IBU HAMIL PER DASA WISMA (View Only)</h3>
        </div>
        <div class="header-right">
            <a href="../mainmenu-admin.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
        </div>
    </header>

    <div class="content mt-5">
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-default">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No.</th>
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
                    $num = 1;
                    if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
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
    
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>
</body>
</html>