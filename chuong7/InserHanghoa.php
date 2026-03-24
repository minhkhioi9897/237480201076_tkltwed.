<?php
$host = "localhost";
$dbname = "quanlybanhang";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối lỗi: " . mysqli_connect_error());
}
// --- PHẦN 1: HIỂN THỊ HÀNG HÓA ---
// Gọi file HTML chứa phần tiêu đề bảng hàng hóa
if (file_exists('InserHanghoa.html')) {
    include 'InserHanghoa.html'; 
} else {
    echo "<h2>Danh sách Hàng Hóa</h2><table border='1' cellspacing='0' cellpadding='10'><tr><th>Mã hàng</th><th>Tên hàng</th><th>Mã NSX</th><th>Năm sản xuất</th><th>Giá</th></tr>";
}
$sql = "SELECT * FROM hanghoa";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['mahang'] . "</td>";
        echo "<td>" . $row['tenhang'] . "</td>";
        echo "<td>" . $row['mansx'] . "</td>";
        echo "<td>" . $row['namsx'] . "</td>";
        echo "<td>" . number_format($row["gia"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Không có dữ liệu hàng hóa</td></tr>";
}
echo "</table>"; // Đóng bảng hàng hóa

?>