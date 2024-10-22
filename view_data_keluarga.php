<?php
include 'connect.php'; // Koneksi ke database

// Ambil data dari tabel data_keluarga
$sql = "SELECT * FROM data_keluarga";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : DATA KELUARGA</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-light">
    <header class="header">
        <div class="header-left">
            <h1>SIPEDAS BERANI</h1>
        </div>
        <div class="header-right">
            <!-- <span>Login sebagai: </span> -->
            
            <span>Login sebagai: User</span>
        </div>
    </header>
    <div class="container mt-5">
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success" role="alert">
                <?php
                echo $_SESSION['success_message'];
                unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan
                ?>
            </div>
        <?php endif; ?>
        <h4 class="mt-5">DATA KELUARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG</h4>
        <input type="text" id="searchKelurahan" placeholder="Cari..." class="form-control mt-3" onkeyup="filterTable()" style="margin-top: 40px;">
        
        <table class="table table-bordered mt-4" id="dataKeluargaTable" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kelurahan</th>
                    <th>RW</th>
                    <th>RT</th>
                    <th>Dasa Wisma</th>
                    <th>Nama Kepala Rumah Tangga</th>
                    <th>No Reg</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Status Dalam Keluarga</th>
                    <th>Status Dalam Perkawinan</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Pekerjaan</th>
                    <th>Kelompok Umur</th>
                    <th>Bumil</th>
                    <th>Ibu Menyusui</th>
                    <th>Pasangan Subur</th>
                    <th>Wanita Usia Subur</th>
                    <th>Apa 3 Buta</th>
                    <th>Makanan Pokok Sehari-hari</th>
                    <th>Mempunyai Jaminan Keluarga</th>
                    <th>Jumlah Jaminan Keluarga</th>
                    <th>Sumber Air Keluarga</th>
                    <th>Memiliki Tempat Pembuangan Sampah</th>
                    <th>Memiliki Saluran Pembuangan Air Limbah</th>
                    <th>Menempel Stiker P4K</th>
                    <th>Kriteria Rumah</th>
                    <th>Aktifitas UP2K</th>
                    <th>Aktifitas Usaha Kesling</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="30" class="text-center">Tidak ada data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="mainmenu.php" class="btn btn-secondary">Kembali</a>
    </div>

    <script>
        function filterTable() {
            var input = document.getElementById('searchKelurahan');
            filter = input.value.toLowerCase();
            table = document.getElementById('dataKeluargaTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) { // Mulai dari 1 untuk melewati header
                tr[i].style.display = "none"; // Sembunyikan baris
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Tampilkan baris jika cocok
                            break;
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>

<?php
$conn->close(); // Tutup koneksi
?>
