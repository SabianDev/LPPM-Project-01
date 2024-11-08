<?php
    include '../connect.php'; // Koneksi ke database

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM rekap_catatan_pkk_rt WHERE id = ?";
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
    } else {
        echo json_encode(null);
    }
    ?>