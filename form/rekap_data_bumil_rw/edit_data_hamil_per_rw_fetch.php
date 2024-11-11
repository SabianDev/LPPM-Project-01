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
include '../connect.php'; // Include the database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the request and ensure it's an integer

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM form_rekap_bumil_rw WHERE id = ?");
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