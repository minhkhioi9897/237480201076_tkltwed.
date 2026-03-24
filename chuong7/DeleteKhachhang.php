<?php
$conn = mysqli_connect("localhost", "root", "", "quanlybanhang");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $makh = $_POST['makh'];

    // 1. Xóa các hóa đơn liên quan đến khách hàng này trước
    $sql_hoadon = "DELETE FROM hoadon WHERE makh = '$makh'";
    mysqli_query($conn, $sql_hoadon);

    // 2. Sau đó mới xóa khách hàng
    $sql_khachhang = "DELETE FROM khachhang WHERE makh = '$makh'";
    
    if (mysqli_query($conn, $sql_khachhang)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "Đã xóa khách hàng $makh và các hóa đơn liên quan.";
        } else {
            echo "Không tìm thấy khách hàng.";
        }
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>