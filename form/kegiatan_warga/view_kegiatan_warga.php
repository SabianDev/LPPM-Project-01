<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM kegiatan_warga";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : KEGIATAN WARGA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>KEGIATAN WARGA (View Only)</h3>
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
                    </tr>
                </thead>
                <tbody>
                <?php 
                $num = 1;
                while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $num; ?></td>
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
                        </tr>
                    <?php 
                    $num = $num + 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>
</body>
</html>