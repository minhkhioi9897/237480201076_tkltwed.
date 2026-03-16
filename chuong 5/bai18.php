<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b18</title>
</head>
<body>
    <form method="POST">
        <label for="s">Nhập chuỗi:</label>
        <input type="text" id="s" name="s" required>
        <br><br>
        <button type="submit">Tìm từ dài nhất</button>
        <br><br>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['s'])) {
            $s = $_POST['s'];
            
            function tuDaiNhat($s) {
                $tu = explode(' ', $s);
                $tuDaiNhat = '';
                foreach ($tu as $t) {
                    if (strlen($t) > strlen($tuDaiNhat)) {
                        $tuDaiNhat = $t;
                    }
                }
                return $tuDaiNhat;
            }
            
            echo "Từ có nhiều kí tự nhất trong chuỗi '$s': " . tuDaiNhat($s);
        }
    ?>
</body>
</html>
