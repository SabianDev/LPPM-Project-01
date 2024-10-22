<?php
include 'connect.php'; // Memasukkan file koneksi

// Fungsi untuk mengambil data dari tabel
function fetchData($conn) {
    $sql = "SELECT * FROM rekap_catatan_per_dasawisma";
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
    <title>VIEW : REKAP CATATAN DASA WISMA</title>
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
        <h4 class="mt-5">CATATAN DATA KEGIATAN WARGA KELOMPOK DASA WISMA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT </h4>
    
        <input type="text" id="searchKelurahan" placeholder="Cari..." class="form-control mt-4" onkeyup="filterTable()" style="margin-top: 80px;">

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kelompok Dasa Wisma</th>
                    <th>Tahun</th>
                    <th>Nama Anggota Keluarga</th>
                    <th>Status Perkawinan</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Berkebutuhan Khusus</th>
                    <th>Penghayatan Pengamalan Pancasila</th>
                    <th>Gotong Royong</th>
                    <th>Pendidikan Dan Keterampilan</th>
                    <th>Pengembangan Kehidupan Berkoperasi</th>
                    <th>Pangan</th>
                    <th>Sandang</th>
                    <th>Kesehatan</th>
                    <th>Perencanaan Sehat</th>
                    <th>Kriteria Rumah</th>
                    <th>Jamban Keluarga</th>
                    <th>Jumlah Jamban Keluarga</th>
                    <th>Sumber Air</th>
                    <th>Memiliki Tempat Sampah</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
