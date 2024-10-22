<?php
include 'connect.php'; // Koneksi ke database

// Ambil data dari tabel
$sql = "SELECT * FROM form_rekap_bumil_rw";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW : REKAP DATA IBU HAMIL PER RW</title>
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
        <h4 class="mt-5">CATATAN IBU HAMIL,KELAHIRAN,KEMATIAN BAYI,KEMATIAN BALITA DAN KEMATIAN IBU HAMIL, MELAHIRKAN DAN NIFAS DALAM KELOMPOK PKK RW KECAMATAN BATUNUNGGAL KOTA BANDUNG PROVINSI JAWA BARAT</h4>
        <input type="text" id="search_bar" placeholder="Cari..." class="form-control mt-3" onkeyup="filterTable()" style="margin-top: 40px;">
        
        <table class="table table-bordered mt-4" id="data-Table" style="border: 2px solid black;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Kelurahan</th>
                    <th>Kelompok Pkk Rw</th>
                    <th>Tahun</th>
                    <th>Nama Kelompok Dasawisma</th>
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
            table = document.getElementById('data-Table');
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
