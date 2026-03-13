<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính USCLN và BSCNN</title>
    <style>
        .box { border: 2px solid #555; padding: 20px; width: 350px; border-radius: 20px; text-align: center; font-family: sans-serif; }
        .row { margin-bottom: 10px; text-align: left; }
        input[type="text"] {  border-radius: 10px;padding: 3px 0px; width: 100px;} 
        .buttons { margin-top: 5px; display: flex; justify-content: space-around; }
        input[type="submit"] { cursor: pointer; padding: 10px 20px; border-radius: 5px; border: 1px solid #999; font-weight: bold; }
    </style>
</head>
<body>

<?php
    // Hàm tìm USCLN (Sử dụng giải thuật Euclid)
    function tim_uscln($a, $b) {
        $a = abs($a);
        $b = abs($b);
        while ($b != 0) {
            $tam = $a % $b;
            $a = $b;
            $b = $tam;
        }
        return $a;
    }

    // Hàm tìm BSCNN
    function tim_bscnn($a, $b) {
        if ($a == 0 || $b == 0) return 0;
        return abs($a * $b) / tim_uscln($a, $b);
    }

    $s1 = ""; $s2 = ""; $kq = "";

    if (isset($_POST['action'])) {
        $s1 = $_POST['so1'];
        $s2 = $_POST['so2'];
        $action = $_POST['action'];

        if (is_numeric($s1) && is_numeric($s2)) {
            if ($action == "USCLN") {
                $kq = tim_uscln($s1, $s2);
            } else {
                $kq = tim_bscnn($s1, $s2);
            }
        } else {
            $kq = "Vui lòng nhập số!";
        }
    }
?>

<div class="box">
    <h3>TÍNH USCLN VÀ BSCNN</h3>
    <hr>
    <form method="POST">
        <div class="row">Số thứ 1: <input type="text" name="so1" value="<?php echo $s1; ?>"></div>
        <div class="row">Số thứ 2: <input type="text" name="so2" value="<?php echo $s2; ?>"></div>
        <div class="row">Kết quả:  <input type="text" name="ketqua" value="<?php echo $kq; ?>" readonly style="background-color: #f9f9f9;"></div>
        
        <div class="buttons">
            <input type="submit" name="action" value="USCLN">
            <input type="submit" name="action" value="BSCNN">
        </div>
    </form>
</div>

</body>
</html>