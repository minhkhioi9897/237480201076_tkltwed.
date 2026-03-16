<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b16</title>
</head>
<body>
    <form method="POST">
        <label for="s">Nhập chuỗi:</label>
        <input type="text" id="s" name="s" required>
        <br>
        <button type="submit">Đảo chuỗi</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['s'])) {
            $s = $_POST['s'];       
            function daoChuoi($s) {
                return strrev($s);
            } 
            echo "Chuỗi đảo của '$s' là: " . daoChuoi($s);
        }
    ?>
</body>
</html>
