<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b12</title>
    <style>
        .bang {
            width: 400px;
            height: 400px;
            border: 2px solid black;
            display: flex;
            margin: auto;
            flex-wrap: wrap;
        }
        .o {
            width: 50px;
            height: 50px;
        }
        .den {
            background-color: black;
        }
        .trang {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="bang">
        <?php
            for ($hang = 0; $hang < 8; $hang++) {
                for ($cot = 0; $cot < 8; $cot++) {
                    if (($hang + $cot) % 2 != 0) {
                        echo "<div class='o trang'></div>";
                    } else {
                        echo "<div class='o den'></div>";
                    }
                }
            }
        ?>
    </div>
</body>
</html>
