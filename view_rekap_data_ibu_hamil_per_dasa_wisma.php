<?php
include 'connect.php'; // Memasukkan file koneksi

// Fungsi untuk mengambil data dari tabel
function fetchData($conn) {
    $sql = "SELECT * FROM rekap_data_ibu_hamil_per_dasa_wisma";
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
    <title>VIEW : REKAP DATA IBU HAMIL PER DASA WISMA</title>
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
        <h4 class="mt-5">CATATAN IBU HAMIL, KELAHIRAN, KEMATIAN BAYI, KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK DASA WISMA KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
    
        <input type="text" id="searchKelurahan" placeholder="Cari..." class="form-control mt-4" onkeyup="filterTable()" style="margin-top: 80px;">

        <table class="table table-bordered mt-4">
            <thead>
            <tr>
                        <th>Id</th>
                        <th>Kelurahan</th>
                        <th>Kelompok PKK RW</th>
                        <th>Kelompok PKK RT</th>
                        <th>Kelompok Dasa Wisma</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Nama Ibu HMN</th>
                        <th>Nama Suami HMN</th>
                        <th>Hamil Status</th>
                        <th>Melahirkan Status</th>
                        <th>Nifas Status</th>
                        <th>Nama Bayi ML</th>
                        <th>Jenis Kelamin ML</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Akte Kelahiran</th>
                        <th>Nama Ibu MT</th>
                        <th>Nama Bayi MT</th>
                        <th>Nama Balita</th>
                        <th>Jenis Kelamin MT</th>
                        <th>Tanggal Meninggal</th>
                        <th>Sebab Meninggal</th>
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
                            <td><?php echo $row['jenis_kelamin_mt']; ?></td>
                            <td><?php echo $row['tanggal_meninggal']; ?></td>
                            <td><?php echo $row['sebab_meninggal']; ?></td>
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
