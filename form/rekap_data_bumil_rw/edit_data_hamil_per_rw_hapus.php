<?php
//get ID
include '../connect.php'; // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM form_rekap_bumil_rw WHERE id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Redirect back to the edit page with only the ID
        header("Location: edit_data_hamil_per_rw.php?id=$id");
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
