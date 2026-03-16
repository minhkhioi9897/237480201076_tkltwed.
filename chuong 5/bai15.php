<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b15</title>
</head>
<body>
    <form method="POST">
        <label for="s">Nhập chuỗi:</label>
        <input type="text" id="s" name="s" required>
        <br><br>
        <label for="ch">Nhập ký tự:</label>
        <input type="text" id="ch" name="ch" maxlength="1" required>
        <br><br>
        <button type="submit">Đếm số lần xuất hiện</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['s']) && isset($_POST['ch'])) {
            $s = $_POST['s'];
            $ch = $_POST['ch'];
            function demSoLanXuatHien($s, $ch) {
                return substr_count($s, $ch);
            } 
            echo "Số lần xuất hiện của ký tự '$ch' trong chuỗi '$s' là: " . demSoLanXuatHien($s, $ch);
        }
    ?>
</body>
</html>
