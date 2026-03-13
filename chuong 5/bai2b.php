<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập 2 </title>
</head>
<body>

    <h2>NHẬP THÔNG TIN SINH VIÊN</h2>
    <form method="POST" action="">
        Họ và tên: <input type="text" name="hoten" required><br><br>
        Ngày sinh: <input type="text" name="ngaysinh" placeholder="dd/mm/yyyy"><br><br>
        Lớp: <input type="text" name="lop"><br><br>
        Điểm: <input type="number" step="0.1" name="diem"><br><br>
        <input type="submit" name="hienthi" value="Xuất thông tin">
    </form>

    <hr>

    <?php
    // Kiểm tra nếu người dùng đã nhấn nút "Xuất thông tin"
    if (isset($_POST['hienthi'])) {
        // Lấy dữ liệu từ Form bằng phương thức POST
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];
        $lop = $_POST['lop'];
        $diem = $_POST['diem'];

        // Hiển thị kết quả ra màn hình
        echo "<h3>THÔNG TIN BẠN VỪA NHẬP:</h3>";
        echo "<b>Họ và tên:</b> " . $hoten . "<br>";
        echo "<b>Ngày sinh:</b> " . $ngaysinh . "<br>";
        echo "<b>Lớp:</b> " . $lop . "<br>";
        echo "<b>Điểm:</b> " . $diem;
    }
    ?>

</body>
</html>