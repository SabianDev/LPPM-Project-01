<?php
    include('../connect.php');
    session_start(); // Mulai session di bagian atas

    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['username'])) {
        // Jika belum login, alihkan ke halaman login
        header("Location: ../login.php");
        exit();
    }

    // Cek apakah pengguna yang login adalah admin
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM data_admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Jika bukan admin, jalankan logout.php dan alihkan ke login.php
        header("Location: ../logout.php");
        exit();
    }
?>
<?php
include ('../connect.php'); // Menghubungkan ke database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengonversi ID menjadi integer untuk keamanan

    // Mempersiapkan pernyataan SQL untuk mencegah injeksi SQL
    $stmt = $conn->prepare("SELECT * FROM data_per_dasawisma WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mengembalikan data sebagai objek JSON
        echo json_encode($row);
    } else {
        echo json_encode([]); // Mengembalikan array kosong jika tidak ada data
    }

    $stmt->close();
}
$conn->close();
?>