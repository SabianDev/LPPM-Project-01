<?php
include '../connect.php'; // Include the database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the request and ensure it's an integer

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM rekap_data_ibu_hamil_per_dasa_wisma WHERE id = ?");
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