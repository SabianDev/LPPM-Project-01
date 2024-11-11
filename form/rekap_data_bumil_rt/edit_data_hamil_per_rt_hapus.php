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

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM form_rekap_bumil_rt WHERE id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Redirect back to the edit page with only the ID
        header("Location: edit_data_hamil_per_rt.php?id=$id");
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
