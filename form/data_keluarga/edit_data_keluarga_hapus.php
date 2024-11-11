
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
//get ID
include '../connect.php'; // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection, ubah nama db nya
    $stmt = $conn->prepare("DELETE FROM data_keluarga WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Kembali ke halaman edit (ubah sesuai kebutuhan)
        header("Location: edit_data_keluarga.php?id=$id");
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
