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