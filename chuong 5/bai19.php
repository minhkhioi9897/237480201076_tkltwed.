<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_19</title>
</head>
<body>
    <?php
        echo "Xin chào bạn, <br>";
        if(isset($_COOKIE['thoiGianTruyCap'])) {
            echo "Thời gian truy cập gần đây nhất là: " . date('d/m/Y H:i:s', $_COOKIE['thoiGianTruyCap']);
            setcookie('thoiGianTruyCap', time(), time() + 600);
        } else {
            setcookie('thoiGianTruyCap', time(), time() + 600);
        }
    ?>
</body>
</html>

