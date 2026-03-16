<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b13</title>
</head>
<body>
<form method="post">
    Nhập danh sách các số nguyên (phân tách bởi khoảng trắng): <input type="text" name="mangSo" value="<?php echo isset($_POST['mangSo']) ? $_POST['mangSo'] : ''; ?>">
    <br><br>
    Chọn chức năng:
    <select name="tuyChon">
        <option value="max">Tìm số lớn nhất</option>
        <option value="min">Tìm số nhỏ nhất</option>
        <option value="squares">Tìm các số chính phương</option>
        <option value="even">In ra các số chẵn</option>
        <option value="odd">In ra các số lẻ</option>
        <option value="sort">Sắp xếp danh sách</option>
    </select>
    <br><br>
    <input type="submit" value="OK"> <br><br>
</form>
<?php
    function timSoLonNhat($mangSo) {
        return max($mangSo);
    }

    function timSoNhoNhat($mangSo) {
        return min($mangSo);
    }

    function timSoChinhPhuong($mangSo) {
        $soChinhPhuong = array();
        foreach ($mangSo as $so) {
            if (sqrt($so) == floor(sqrt($so))) {
                $soChinhPhuong[] = $so;
            }
        }
        return $soChinhPhuong;
    }

    function timSoChan($mangSo) {
        $soChan = array();
        foreach ($mangSo as $so) {
            if ($so % 2 == 0) {
                $soChan[] = $so;
            }
        }
        return $soChan;
    }

    function timSoLe($mangSo) {
        $soLe = array();
        foreach ($mangSo as $so) {
            if ($so % 2 != 0) {
                $soLe[] = $so;
            }
        }
        return $soLe;
    }

    function sapXepSo($mangSo) {
        sort($mangSo);
        return $mangSo;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mangSo = $_POST['mangSo'];
        $mangSoArray = array_map('intval', explode(' ', $mangSo));
        $tuyChon = $_POST['tuyChon'];

        switch ($tuyChon) {
            case 'max':
                echo "Số lớn nhất: " . timSoLonNhat($mangSoArray) . ".<br>";
                break;
            case 'min':
                echo "Số nhỏ nhất: " . timSoNhoNhat($mangSoArray) . ".<br>";
                break;
            case 'squares':
                echo "Các số chính phương: " . implode(" ", timSoChinhPhuong($mangSoArray)) . ".<br>";
                break;
            case 'even':
                echo "Các số chẵn: " . implode(" ", timSoChan($mangSoArray)) . ".<br>";
                break;
            case 'odd':
                echo "Các số lẻ: " . implode(" ", timSoLe($mangSoArray)) . ".<br>";
                break;
            case 'sort':
                echo "Danh sách sắp xếp: " . implode(" ", sapXepSo($mangSoArray)) . ".<br>";
                break;
        }
    }
?>
</body>
</html>

