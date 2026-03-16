	upload.html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b23</title>
</head>
<body>
    <h1>Upload một file lên server</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Chọn file:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
	upload.php
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $target_dir = "Tailieu/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (file_exists($target_file)) {
            echo "Tập tin đã tồn tại.";
            $uploadOk = 0;
        }

        if ($_FILES["file"]["size"] > 500000) {
            echo "Tập tin của bạn quá lớn.";
            $uploadOk = 0;
        }

        $allowed_types = ["jpg", "png", "jpeg", "gif", "pdf", "doc", "docx"];
        if (!in_array($fileType, $allowed_types)) {
            echo "Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF, PDF, DOC, DOCX.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Tập tin của bạn không thể được tải lên.";
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Tập tin " . htmlspecialchars(basename($_FILES["file"]["name"])) . " đã được tải lên.";
            } else {
                echo "Có lỗi xảy ra khi tải lên tập tin của bạn.";
            }
        }
    }
?>
