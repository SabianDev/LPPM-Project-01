<?php
//get ID
include '../connect.php'; // Koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM rekap_data_ibu_hamil_per_dasa_wisma WHERE id = ?");
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        // Redirect back to the edit page with only the ID
        header("Location: edit_rekap_data_ibu_hamil_per_dasa_wisma.php?id=$id");
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>