<?php
$host = "localhost";
$dbname = "quanlybanhang";
$username = "root";
$password = "";

$conn = mysqli_connect ($host, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
echo "Kết nối thành công!";{
$sql = "SELECT * FROM hanghoa";
$result = mysqli_query($conn, $sql);
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mã NSX</th>
        <th>Năm sản xuất</th>
        <th>Giá</th>
      </tr>";
if (mysqli_num_rows($result) > 0) {
    // 5. Đổ dữ liệu vào từng dòng của bảng
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['mahang'] . "</td>";
        echo "<td>" . $row['tenhang'] . "</td>";
        echo "<td>" . $row['mansx'] . "</td>";
        echo "<td>" . $row['namsx'] . "</td>";
        echo "<td>" . $row["gia"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
}
echo "</table>";}
echo "<br><br>";{
$sql = "SELECT * FROM hoadon";
$result = mysqli_query($conn, $sql);
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
        <th>Mã hóa đơn</th>
        <th>Mã khách hàng</th>
        <th>Mã hàng</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
      </tr>";
if (mysqli_num_rows($result) > 0) {
    // 5. Đổ dữ liệu vào từng dòng của bảng
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['mahd'] . "</td>";
        echo "<td>" . $row['makh'] . "</td>";
        echo "<td>" . $row['mahang'] . "</td>";
        echo "<td>" . $row['soluong'] . "</td>";
        echo "<td>" . $row["thanhtien"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
}
echo "</table>";}
echo "<br><br>";{
$sql = "SELECT * FROM khachhang";
$result = mysqli_query($conn, $sql);
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
        <th>Mã khách hàng</th>
        <th>Tên khách hàng</th>
        <th>Năm sinh</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
      </tr>";
if (mysqli_num_rows($result) > 0) {
    // 5. Đổ dữ liệu vào từng dòng của bảng
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['makh'] . "</td>";
        echo "<td>" . $row['tenkh'] . "</td>";
        echo "<td>" . $row["namsinh"] . "</td>";
        echo "<td>" . $row['dienthoai'] . "</td>";
        echo "<td>" . $row['diachi'] . "</td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
}
echo "</table>";}
echo "<br><br>";{
$sql = "SELECT * FROM nhasanxuat";
$result = mysqli_query($conn, $sql);
echo "<table border='1' cellspacing='0' cellpadding='10'>";
echo "<tr>
        <th>Mã nhà sản xuất</th>
        <th>Tên nhà sản xuất</th>
        <th>Quốc gia</th>
      </tr>";
if (mysqli_num_rows($result) > 0) {
    // 5. Đổ dữ liệu vào từng dòng của bảng
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['mansx'] . "</td>";
        echo "<td>" . $row['tennsx'] . "</td>";
        echo "<td>" . $row['quocgia'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Không có dữ liệu</td></tr>";
}

echo "</table>";}
$sql = "SELECT * FROM hanghoa";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    echo $row['mahang'] . " - " . $row['tenhang'] . " - " . $row['mansx'] . " - " . $row['namsx'] . " - " . $row['gia'] . "<br>";
}echo "<br><br>";
$sql = "SELECT * FROM hanghoa";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_row($result)){
    echo $row[0] . " - " . $row[1] . " - " . $row[2] . " - " . $row[3] . " - " . $row[4] . "<br>";

}
mysqli_close($conn);
?>

