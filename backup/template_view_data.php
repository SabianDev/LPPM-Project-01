<?php
    include 'connect.php'; // Koneksi ke database

    // Ganti sesuai kebutuhan
    $sql = "SELECT * FROM data_keluarga";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables Test</title>

    <!-- LINKS -->
     
    <link href="DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-table.css">
</head>
<body>

    <header class="header">
        <div class="header-left">
            <h3>Data Keluarga (View Only)</h3>
        </div>
        <div class="header-right">
            <a href="mainmenu.php" class="btn btn-light">Kembali</a> <!-- Button to go back to mainmenu.php -->
        </div>
    </header>

    <div class="content mt-5">
        <div class="table-wrapper mt-5">
            <table class="table table-hover table-striped table-bordered" id="table-default">
                <thead class="table-light">
                    <tr>
                        <!-- Disini isi kolom data nya -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Disini Isi konten tabel nya  -->
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>