<?php
include ('../connect.php'); // Include the database connection

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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the SQL statement to prevent SQL injection, ubah nama db nya
    $stmt = $conn->prepare("SELECT * FROM data_keluarga WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return the data as a JSON object
        echo json_encode($row);
    } else {
        echo json_encode([]);
    }

    $stmt->close();
}
$conn->close();
?>
