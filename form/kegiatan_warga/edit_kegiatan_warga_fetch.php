<?php
include('../connect.php'); // Pastikan file koneksi sudah benar

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Mengamankan input ID

    $sql = "SELECT * FROM kegiatan_warga WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(null);
    }

    $stmt->close();
} else {
    echo json_encode(null);
}

$conn->close();
?>
