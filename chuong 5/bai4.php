<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính toán số học</title>
    <style>
        .box { border: 5px solid #e34747; padding: 20px; width: 350px; border-radius: 20px; text-align: center; font-family: sans-serif; }
        .row { margin-bottom: 10px; text-align: left; }
        input[type="text"] { width: 250px; float: right; }
        .buttons { margin-top: 15px; display: flex; justify-content: space-between; }
        input[type="submit"] { cursor: pointer; padding: 5px 10px; border-radius: 5px; border: 1px solid #999; }
    </style>
</head>
<body>

<?php
    $so1 = ""; $so2 = ""; $kq = "";
    
    // Kiểm tra xem có thao tác tính toán nào được gửi lên không
    if (isset($_POST['tinh'])) {
        $so1 = (float)$_POST['so1'];
        $so2 = (float)$_POST['so2'];
        $phep_tinh = $_POST['tinh'];

        switch ($phep_tinh) {
            case "Cộng": $kq = $so1 + $so2; break;
            case "Trừ":  $kq = $so1 - $so2; break;
            case "Nhân": $kq = $so1 * $so2; break;
            case "Chia": 
                $kq = ($so2 != 0) ? ($so1 / $so2) : "Lỗi chia cho 0"; 
                break;
            case "Mod":  
                $kq = ($so2 != 0) ? ($so1 % $so2) : "Lỗi chia cho 0"; 
                break;
        }
    }
?>

<div class="box">
    <h3>TÍNH TOÁN SỐ HỌC</h3>
    <form method="POST">
        <div class="row">Số thứ 1: <input type="text" name="so1" value="<?php echo $so1; ?>"></div>
        <div class="row">Số thứ 2: <input type="text" name="so2" value="<?php echo $so2; ?>"></div>
        <div class="row">Kết quả: <input type="text" name="ketqua" value="<?php echo $kq; ?>" readonly style="background-color: #eee;"></div>
        
        <div class="buttons">
            <input type="submit" name="tinh" value="Cộng">
            <input type="submit" name="tinh" value="Trừ">
            <input type="submit" name="tinh" value="Nhân">
            <input type="submit" name="tinh" value="Chia">
            <input type="submit" name="tinh" value="Mod">
        </div>
    </form>
</div>

</body>
</html>