<?php
$host = "localhost";
$dbname = "quanlybanhang";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Kết nối lỗi: " . mysqli_connect_error());
}else{
    echo "Kết nối thành công đến cơ sở dữ liệu!";
}
// Phân cách 2 bản
// --- PHẦN 2: HIỂN THỊ HÓA ĐƠN ---
// Gọi file HTML chứa phần tiêu đề bảng hóa đơn
if (file_exists('InserHoadon.html')) {
    include 'InserHoadon.html';
} else {
    echo "<h2>Danh sách Hóa Đơn</h2><table border='1' cellspacing='0' cellpadding='10'><tr><th>Mã HD</th><th>Mã KH</th><th>Mã hàng</th><th>Số lượng</th><th>Thành tiền</th></tr>";
}

$sql2 = "SELECT * FROM hoadon";
$result2 = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>" . $row['mahd'] . "</td>";
        echo "<td>" . $row['makh'] . "</td>";
        echo "<td>" . $row['mahang'] . "</td>";
        echo "<td>" . $row['soluong'] . "</td>";
        echo "<td>" . number_format($row["thanhtien"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Không có dữ liệu hóa đơn</td></tr>";
}
echo "</table>"; // Đóng bảng hóa đơn

mysqli_close($conn);