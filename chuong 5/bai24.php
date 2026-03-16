uploads.html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b22</title>
</head>
<body>
    <h1>Upload nhiều file ảnh lên server</h1>
    <form action="uploads.php" method="post" enctype="multipart/form-data">
        <label for="files">Chọn file ảnh:</label>
        <input type="file" name="files[]" id="files" multiple required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

	uploads.php
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $target_dir = "BoSuuTap/";
        $uploadOk = 1;
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        $files = $_FILES['files'];

        for ($i = 0; $i < count($files['name']); $i++) {
            $target_file = $target_dir . basename($files["name"][$i]);
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (file_exists($target_file)) {
                echo "Tập tin " . htmlspecialchars($files["name"][$i]) . " đã tồn tại.<br>";
                $uploadOk = 0;
                continue;
            }

            if ($files["size"][$i] > 500000) {
                echo "Tập tin " . htmlspecialchars($files["name"][$i]) . " quá lớn.<br>";
                $uploadOk = 0;
                continue;
            }

            if (!in_array($fileType, $allowed_types)) {
                echo "Tập tin " . htmlspecialchars($files["name"][$i]) . " không phải là định dạng được cho phép.<br>";
                $uploadOk = 0;
                continue;
            }

            if ($uploadOk == 0) {
                echo "Tập tin " . htmlspecialchars($files["name"][$i]) . " không thể được upload.<br>";
            } else {
                if (move_uploaded_file($files["tmp_name"][$i], $target_file)) {
                    echo "Tập tin " . htmlspecialchars($files["name"][$i]) . " đã được upload.<br>";
                } else {
                    echo "Có lỗi xảy ra khi upload tập tin " . htmlspecialchars($files["name"][$i]) . ".<br>";
                }
            }
        }
    }
?>

