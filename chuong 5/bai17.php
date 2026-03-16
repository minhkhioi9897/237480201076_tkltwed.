<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b17</title>
</head>
<body>
    <form method="POST">
        <label for="s">Nhập chuỗi:</label>
        <input type="text" id="s" name="s" required>
        <br>
        <button type="submit">Tách chuỗi</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['s'])) {
            $s = $_POST['s'];
            function tachChuoi($s) {
                return explode(' ', $s);
            }
            $kq = tachChuoi($s);
            echo "<pre>";
            print_r($kq);
            echo "</pre>";
        }
    ?>
</body>
</html>

