<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b10</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $soNguyen = explode(' ', $_POST['numbers']); 
            echo "Mảng: [" . implode(" ", $soNguyen) . "].<br>";

            $demSoChan = 0;
            foreach ($soNguyen as $so) {
                if ($so % 2 == 0) {
                    $demSoChan++;
                }
            }
            echo "Đếm Số chẵn: " . $demSoChan . ".<br>";

            $tongSoLe = 0;
            foreach ($soNguyen as $so) {
                if ($so % 2 != 0) {
                    $tongSoLe += $so;
                }
            }
            echo "Tổng của các số lẻ: " . $tongSoLe . ".<br>";
            
            echo "Giá trị lớn nhất: " . max($soNguyen) . ".<br>";
            echo "Giá trị nhỏ nhất: " . min($soNguyen) . ".<br>";
            $daoNguoc = array_reverse($soNguyen);
            echo "Mảng đảo ngược: [" . implode(" ", $daoNguoc) . "].<br>";
        }
    ?>
    <form method="post">
        <br>Nhập mảng các số nguyên (phân cách bởi khoảng trắng): <input type="text" name="numbers">
        <input type="submit">
    </form>
</body>
</html>
