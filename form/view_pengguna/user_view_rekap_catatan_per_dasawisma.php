<?php
    include '../connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM rekap_catatan_per_dasawisma";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : REKAP CATATAN DASA WISMA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>REKAP CATATAN DASA WISMA (Read Only)</h3>
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
                        <th scope="col">Pendidikan Dan Keterampilan</th>
                        <th scope="col">Pengembangan Kehidupan Berkoperasi</th>
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
                    $num = 1;
                    if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['kelompok_dasa_wisma']; ?></td>
                                <td><?php echo $row['tahun']; ?></td>
                                <td><?php echo $row['nama_anggota_keluarga']; ?></td>
                                <td><?php echo $row['status_perkawinan']; ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['tempat_lahir']; ?></td>
                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                <td><?php echo $row['umur']; ?></td>
                                <td><?php echo $row['agama']; ?></td>
                                <td><?php echo $row['pendidikan']; ?></td>
                                <td><?php echo $row['pekerjaan']; ?></td>
                                <td><?php echo $row['berkebutuhan_khusus']; ?></td>
                                <td><?php echo $row['penghayatan_pengamalan_pancasila']; ?></td>
                                <td><?php echo $row['gotong_royong']; ?></td>
                                <td><?php echo $row['pendidikan_keterampilan']; ?></td>
                                <td><?php echo $row['pengembangan_keh_berkoperasi']; ?></td>
                                <td><?php echo $row['pangan']; ?></td>
                                <td><?php echo $row['sandang']; ?></td>
                                <td><?php echo $row['kesehatan']; ?></td>
                                <td><?php echo $row['perencanaan_sehat']; ?></td>
                                <td><?php echo $row['kriteria_rumah']; ?></td>
                                <td><?php echo $row['jamban_keluarga']; ?></td>
                                <td><?php echo $row['jumlah_jamban_keluarga']; ?></td>
                                <td><?php echo $row['sumber_air']; ?></td>
                                <td><?php echo $row['memiliki_tempat_sampah']; ?></td>
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