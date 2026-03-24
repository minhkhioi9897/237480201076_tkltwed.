<?php
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makh = $_POST['makh'];
    $tenkh = $_POST['tenkh'];
    $namsinh = $_POST['namsinh'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];

    // Chú ý: tên bảng là khachhang (có chữ h)
    $sql = "UPDATE khachhang SET tenkh='$tenkh', namsinh='$namsinh', dienthoai='$dienthoai', diachi='$diachi' WHERE makh='$makh'";

    if (mysqli_query($conn, $sql)) {
        echo "Cập nhật thành công!";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>