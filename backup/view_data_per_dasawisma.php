<?php
include 'connect.php'; // Koneksi ke database

// Ambil data dari tabel
$sql = "SELECT * FROM data_per_dasawisma";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : DATA PER DASA WISMA</title>
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
        <h4 class="mt-5">CATATAN KELUARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
        <input type="text" id="search_bar" placeholder="Cari..." class="form-control mt-3" onkeyup="filterTable()" style="margin-top: 40px;">
        
        <table class="table table-bordered mt-4" id="dataKeluargaTable" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kelurahan</th>
                    <th>Kelompok PKK RW</th>
                    <th>Kelompok PKK RT</th>
                    <th>Kelompok PKK Dasa Wisma</th>
                    <th>Tahun</th>
                    <th>No Reg</th>
                    <th>Nama Kepala Keluarga</th>
                    <th>Jumlah KK</th>
                    <th>Total Laki Laki</th>
                    <th>Total Perempuan</th>
                    <th>Balita Laki Laki</th>
                    <th>Balita Perempuan</th>
                    <th>Pasangan Usia Subur</th>
                    <th>Wanita Usia Subur</th>
                    <th>Ibu Hamil</th>
                    <th>Ibu Menyusui</th>
                    <th>Lansia</th>
                    <th>Tiga Buta</th>
                    <th>Berkebutuhan Khusus</th>
                    <th>Sehat Dan Layak Huni</th>
                    <th>Memiliki Tempat Pembuangan Sampah</th>
                    <th>Memiliki Spal</th>
                    <th>Memiliki Jamban</th>
                    <th>Sumber Air Keluarga</th>
                    <th>Makanan Pokok</th>
                    <th>Kegiatan Up2k</th>
                    <th>Pemanfaatan Tanah</th>
                    <th>Industri Rumah</th>
                    <th>Kerja Bakti</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>

                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
            var input = document.getElementById('search_bar');
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
