<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b8</title>
</head>
<body>
    <select>
        <?php
            $year = date("Y");
            for ($i = 1900; $i <= $year; $i++) {
                echo "<option value='$i'>$i</option>";
            }
        ?>
    </select>
</body>
</html>
