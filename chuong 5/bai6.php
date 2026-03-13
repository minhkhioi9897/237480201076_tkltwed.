<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng bình phương</title>
    <style>
        table {
            border-collapse: collapse; /* Gộp viền bảng lại cho đẹp */
            width: 200px;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Sử dụng ngôn ngữ PHP tạo bảng</h2>

    <table>
        <tr>
            <th>Số n</th>
            <th>Số n<sup>2</sup></th>
        </tr>

        <?php
        // Vòng lặp chạy từ 0 đến 50
        for ($n = 0; $n <= 50; $n++) {
            $binh_phuong = $n * $n; // Hoặc dùng hàm pow($n, 2)
            
            echo "<tr>";
            echo "<td>$n</td>";
            echo "<td>$binh_phuong</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
