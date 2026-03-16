<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b11</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy mảng các màu từ chuỗi nhập vào, phân cách bởi dấu phẩy
            $mau = explode(',', $_POST['mau']); 

            // Hiển thị mỗi màu
            foreach ($mau as $color) {
                echo "<p style='color: $color;'>$color</p>";
            }
        }
    ?>
    <form method="post">
        <br>Nhập các màu (phân cách bởi dấu phẩy): <input type="text" name="mau">
        <input type="submit">
    </form>
</body>
</html>
