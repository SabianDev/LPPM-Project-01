<?php
session_start();
include 'connect.php';

// Ambil data dari tabel kegiatan_warga
$sql = "SELECT * FROM kegiatan_warga";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : KEGIATAN WARGA</title>
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
        <h4 class="mt-5">KEGIATAN WARGA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
        <?php if ($result->num_rows > 0): ?>
            <input type="text" id="searchKegiatan" placeholder="Cari Kegiatan" class="form-control mt-3" onkeyup="filterTable()" style="margin-top: 80px;">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kegiatan</th>
                        <th>Keterangan</th>
                        <th>Pemilihan Sampah</th>
                        <th>Lubang Biopori</th>
                        <th>Tanaman Obat Keluarga</th>
                        <th>Kampung Berkebun</th>
                        <th>Buruan Sae</th>
                        <th>Sumur Resapan</th>
                        <th>Loseda</th>
                        <th>Industri Makanan</th>
                        <th>Industri Minuman</th>
                        <th>Industri Kerajinan</th>
                        <th>Industri Rajut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
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
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="mainmenu.php" class="btn btn-secondary">Kembali</a>
        <?php else: ?>
            <p>Tidak ada data yang ditemukan.</p>
        <?php endif; ?>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
function filterTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchKegiatan");
    filter = input.value.toLowerCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    // Loop melalui semua baris tabel, sembunyikan baris yang tidak cocok
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
