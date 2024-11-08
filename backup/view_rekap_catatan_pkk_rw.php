<?php
include 'connect.php'; // Memasukkan file koneksi

// Fungsi untuk mengambil data dari tabel
function fetchData($conn) {
    $sql = "SELECT * FROM rekap_catatan_pkk_rw";
    return $conn->query($sql);
}

// Mengambil data dari tabel
$result = fetchData($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : REKAP CATATAN PKK RW</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
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
        <h4 class="mt-5">CATATAN DATA KEGIATAN WARGA KELOMPOK PKK RW KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
    
        <input type="text" id="searchKelurahan" placeholder="Cari..." class="form-control mt-4" onkeyup="filterTable()" style="margin-top: 80px;">

        <table class="table table-bordered mt-4">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Kelurahan</th>
                    <th>Anggota PKK RW</th>
                    <th>Anggota PKK RT</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>No RW</th>
                    <th>Jumlah Dasa Wisma</th>
                    <th>Jumlah RT</th>
                    <th>Jumlah KK</th>
                    <th>Total Laki-laki</th>
                    <th>Total Perempuan</th>
                    <th>Balita Laki-laki</th>
                    <th>Balita Perempuan</th>
                    <th>Pasangan Usia Subur</th>
                    <th>Wanita Usia Subur</th>
                    <th>Ibu Hamil</th>
                    <th>Ibu Menyusui</th>
                    <th>Lansia</th>
                    <th>Tiga Buta</th>
                    <th>Berkebutuhan Khusus</th>
                    <th>Sehat</th>
                    <th>Kurang Sehat</th>
                    <th>Memiliki Tempat Pembuangan Sampah</th>
                    <th>Memiliki SPAL</th>
                    <th>Memiliki Jamban Keluarga</th>
                    <th>Menempel Stiker P4K</th>
                    <th>PDAM</th>
                    <th>Sumur</th>
                    <th>DLL</th>
                    <th>Beras</th>
                    <th>Non Beras</th>
                    <th>UP2K</th>
                    <th>Pemanfaatan Tanah Perkarangan</th>
                    <th>Industri Rumah Tangga</th>
                    <th>Kesehatan Lingkungan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['kelurahan']; ?></td>
                            <td><?php echo $row['anggota_pkk_rw']; ?></td>
                            <td><?php echo $row['anggota_pkk_rt']; ?></td>
                            <td><?php echo $row['tahun']; ?></td>
                            <td><?php echo $row['bulan']; ?></td>
                            <td><?php echo $row['no_rw']; ?></td>
                            <td><?php echo $row['jumlah_dasa_wisma']; ?></td>
                            <td><?php echo $row['jumlah_rt']; ?></td>
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
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="22">Tidak ada data ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="mainmenu.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>

<script>
function filterTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchKelurahan");
    filter = input.value.toLowerCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");

    // Loop melalui semua baris tabel, kecuali baris header
    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = "none"; // Sembunyikan semua baris
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // Tampilkan baris yang cocok
                    break;
                }
            }
        }
    }
}
</script>

<?php
$conn->close();
?>
