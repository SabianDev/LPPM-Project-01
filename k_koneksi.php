<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "dbukt";
$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}