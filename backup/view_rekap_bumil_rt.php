<?php
include 'connect.php'; // Memasukkan file koneksi

// Fungsi untuk mengambil data dari tabel
function fetchData($conn) {
    $sql = "SELECT * FROM form_rekap_bumil_rt";
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
    <title>VIEW : REKAP DATA IBU HAMIL PER RT</title>
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
        <h4 class="mt-5">CATATAN IBU HAMIL, KELAHIRAN, KEMATIAN BAYI, KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK PKK RT KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
    
        <input type="text" id="searchKelurahan" placeholder="Cari..." class="form-control mt-4" onkeyup="filterTable()" style="margin-top: 80px;">

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kelurahan</th>
                    <th>Kelompok Pkk Rw</th>
                    <th>Kelompok Pkk Rt</th>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Kelompok Pkk Dasawisma</th>
                    <th>Hamil</th>
                    <th>Melahirkan</th>
                    <th>Nifas</th>
                    <th>Meninggal</th>
                    <th>Lahir Laki Laki</th>
                    <th>Lahir Perempuan</th>
                    <th>Memiliki Akte Kelahiran</th>
                    <th>Tidak Memiliki Akte Kelahiran</th>
                    <th>Meninggal Laki Laki Bayi</th>
                    <th>Meninggal Perempuan Bayi</th>
                    <th>Meninggal Laki Laki Balita</th>
                    <th>Meninggal Perempuan Balita</th>
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
                            <td><?php echo $row['tahun']; ?></td>
                            <td><?php echo $row['bulan']; ?></td>
                            <td><?php echo $row['kelompok_pkk_dasawisma']; ?></td>
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
