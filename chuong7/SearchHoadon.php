<?php
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mahd = $_POST['mahd'];

    $sql = "SELECT * FROM hoadon WHERE mahd='$mahd'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h2>Chi tiết Hóa Đơn</h2><table border='1' cellspacing='0' cellpadding='10'><tr><th>Mã HD</th><th>Mã KH</th><th>Mã hàng</th><th>Số lượng</th><th>Thành tiền</th></tr>";
            echo "<tr>";
            echo "<td>" . $row['mahd'] . "</td>";
            echo "<td>" . $row['makh'] . "</td>";
            echo "<td>" . $row['mahang'] . "</td>";
            echo "<td>" . $row['soluong'] . "</td>";
            echo "<td>" . number_format($row["thanhtien"]) . "</td>";
            echo "</tr>";
            echo "</table>"; // Đóng bảng chi tiết hóa đơn
        }
    } else {
        echo "Không tìm thấy hóa đơn với mã HD: " . $mahd;
    }
}
?>