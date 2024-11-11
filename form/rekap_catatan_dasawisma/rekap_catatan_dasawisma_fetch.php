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
   include('../connect.php');

   if (isset($_GET['id'])) {
       $id = $_GET['id'];
       $sql = "SELECT * FROM rekap_catatan_per_dasawisma WHERE id = ?";
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