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