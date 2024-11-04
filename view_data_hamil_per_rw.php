<?php
    include 'connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM form_rekap_bumil_rw";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : REKAP DATA IBU HAMIL PER RW</title>

    <!-- LINKS -->
     
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>REKAP DATA IBU HAMIL PER RW (View Only)</h3>
        </div>
        <div class="header-right">
            <a href="mainmenu.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
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
                        <th scope="col">Kelompok Pkk Rw</th>
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
    
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>