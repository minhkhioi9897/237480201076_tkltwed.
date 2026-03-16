<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b14</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label, input, select, button {
            margin: 5px 0;
            display: block;
        }
        input[type="text"] {
            width: 50px;
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php
        function taoFormMaTran($dong, $cot, $maTran = null) {
            echo '<form method="POST">';
            echo '<label>Số dòng: <input type="text" name="dong" value="' . $dong . '" required></label>';
            echo '<label>Số cột: <input type="text" name="cot" value="' . $cot . '" required></label>';
            echo '<br>';

            for ($i = 0; $i < $dong; $i++) {
                for ($j = 0; $j < $cot; $j++) {
                    $giaTri = $maTran ? $maTran[$i][$j] : '';
                    echo '<label>Phần tử [' . $i . '][' . $j . ']: <input type="text" name="maTran[' . $i . '][' . $j . ']" value="' . $giaTri . '" required></label>';
                }
                echo '<br>';
            }

            echo '<label for="chucNang">Chọn chức năng:</label>';
            echo '<select id="chucNang" name="chucNang" required>';
            echo '<option value="max">Tìm giá trị lớn nhất</option>';
            echo '<option value="min">Tìm giá trị nhỏ nhất</option>';
            echo '<option value="sum">Tính tổng</option>';
            echo '<option value="print">In ra ma trận</option>';
            echo '</select>';
            echo '<br>';
            echo '<button type="submit">OK</button>';
            echo '</form>';
        }

        function timGiaTriLonNhat($maTran) {
            $max = $maTran[0][0];
            foreach ($maTran as $dong) {
                foreach ($dong as $giaTri) {
                    if ($giaTri > $max) {
                        $max = $giaTri;
                    }
                }
            }
            return $max;
        }

        function timGiaTriNhoNhat($maTran) {
            $min = $maTran[0][0];
            foreach ($maTran as $dong) {
                foreach ($dong as $giaTri) {
                    if ($giaTri < $min) {
                        $min = $giaTri;
                    }
                }
            }
            return $min;
        }

        function tinhTong($maTran) {
            $tong = 0;
            foreach ($maTran as $dong) {
                foreach ($dong as $giaTri) {
                    $tong += $giaTri;
                }
            }
            return $tong;
        }

        function inMaTran($maTran) {
            echo '<table>';
            foreach ($maTran as $dong) {
                echo '<tr>';
                foreach ($dong as $giaTri) {
                    echo '<td>' . $giaTri . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dong']) && isset($_POST['cot'])) {
            $dong = intval($_POST['dong']);
            $cot = intval($_POST['cot']);
            $maTran = isset($_POST['maTran']) ? $_POST['maTran'] : null;
            taoFormMaTran($dong, $cot, $maTran);

            if (isset($_POST['maTran']) && isset($_POST['chucNang'])) {
                $maTran = $_POST['maTran'];
                $chucNang = $_POST['chucNang'];

                if ($chucNang == 'max') {
                    echo 'Giá trị lớn nhất: ' . timGiaTriLonNhat($maTran) . '.<br>';
                } elseif ($chucNang == 'min') {
                    echo 'Giá trị nhỏ nhất: ' . timGiaTriNhoNhat($maTran) . '.<br>';
                } elseif ($chucNang == 'sum') {
                    echo 'Tổng: ' . tinhTong($maTran) . '.<br>';
                } elseif ($chucNang == 'print') {
                    echo 'Ma trận:<br>';
                    inMaTran($maTran);
                }
            }
        } else {
            echo '<form method="POST">';
            echo '<label for="dong">Số dòng:</label>';
            echo '<input type="text" id="dong" name="dong" required>';
            echo '<label for="cot">Số cột:</label>';
            echo '<input type="text" id="cot" name="cot" required>';
            echo '<button type="submit">Tạo ma trận</button>';
            echo '</form>';
        }
    ?>
</body>
</html>
