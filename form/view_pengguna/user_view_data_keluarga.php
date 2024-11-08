<?php
    include('../connect.php');
    // Koneksi ke database

    // Ambil data dari tabel
    $sql = "SELECT * FROM data_keluarga";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : DATA KELUARGA</title>

    <!-- LINKS -->
     
    <link href="../../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>DATA KELUARGA (View Only)</h3>
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
                        <th scope="col">RW</th>
                        <th scope="col">RT</th>
                        <th scope="col">Dasa Wisma</th>
                        <th scope="col">Nama Kepala Rumah Tangga</th>
                        <th scope="col">No Reg</th>
                        <th scope="col">Nama Anggota Keluarga</th>
                        <th scope="col">Status Dalam Keluarga</th>
                        <th scope="col">Status Dalam Perkawinan</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Pendidikan Terakhir</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Kelompok Umur</th>
                        <th scope="col">Bumil</th>
                        <th scope="col">Ibu Menyusui</th>
                        <th scope="col">Pasangan Subur</th>
                        <th scope="col">Wanita Usia Subur</th>
                        <th scope="col">Apa 3 Buta</th>
                        <th scope="col">Makanan Pokok Sehari-hari</th>
                        <th scope="col">Mempunyai Jaminan Keluarga</th>
                        <th scope="col">Jumlah Jaminan Keluarga</th>
                        <th scope="col">Sumber Air Keluarga</th>
                        <th scope="col">Memiliki Tempat Pembuangan Sampah</th>
                        <th scope="col">Memiliki Saluran Pembuangan Air Limbah</th>
                        <th scope="col">Menempel Stiker P4K</th>
                        <th scope="col">Kriteria Rumah</th>
                        <th scope="col">Aktifitas UP2K</th>
                        <th scope="col">Aktifitas Usaha Kesling</th>
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
                                <td><?php echo $row['rw']; ?></td>
                                <td><?php echo $row['rt']; ?></td>
                                <td><?php echo $row['dasa_wisma']; ?></td>
                                <td><?php echo $row['nama_kepala_rumah_tangga']; ?></td>
                                <td><?php echo $row['no_reg']; ?></td>
                                <td><?php echo $row['nama_anggota_keluarga']; ?></td>
                                <td><?php echo $row['status_dalam_keluarga']; ?></td>
                                <td><?php echo $row['status_dalam_perkawinan']; ?></td>
                                <td><?php echo $row['jenis_kelamin']; ?></td>
                                <td><?php echo $row['tempat_lahir']; ?></td>
                                <td><?php echo $row['tanggal_lahir']; ?></td>
                                <td><?php echo $row['umur']; ?></td>
                                <td><?php echo $row['pendidikan_terakhir']; ?></td>
                                <td><?php echo $row['pekerjaan']; ?></td>
                                <td><?php echo $row['kelompok_umur']; ?></td>
                                <td><?php echo $row['bumil']; ?></td>
                                <td><?php echo $row['ibu_menyusui']; ?></td>
                                <td><?php echo $row['pasangan_subur']; ?></td>
                                <td><?php echo $row['wanita_usia_subur']; ?></td>
                                <td><?php echo $row['apa_3buta']; ?></td>
                                <td><?php echo $row['makanan_pokok_sehari_hari']; ?></td>
                                <td><?php echo $row['mempunyai_jaminan_keluarga']; ?></td>
                                <td><?php echo $row['jumlah_jaminan_keluarga']; ?></td>
                                <td><?php echo $row['sumber_air_keluarga']; ?></td>
                                <td><?php echo $row['tempat_pembuangan_sampah']; ?></td>
                                <td><?php echo $row['saluran_pembuangan_air_limbah']; ?></td>
                                <td><?php echo $row['stiker_p4k']; ?></td>
                                <td><?php echo $row['kriteria_rumah']; ?></td>
                                <td><?php echo $row['aktifitas_up2k']; ?></td>
                                <td><?php echo $row['aktifitas_usaha_kesling']; ?></td>
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
    
    <script src="../../js/jquery-3.7.1.min.js"></script>
    <script src="../../DataTables/datatables.min.js"></script>
    <script src="../../js/app.js"></script>
</body>
</html>