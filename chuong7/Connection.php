<?php
$host = "localhost";
$dbname = "quanlybanhang";
$username = "root";
$password = "";
$conn = mysqli_connect ($host, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
echo "Kết nối thành công!";
?>