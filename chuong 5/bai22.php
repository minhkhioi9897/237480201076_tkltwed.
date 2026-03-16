	login.html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b22</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            font-family: Arial;
            color: #0022ff;
            padding: 3px;
            text-align: center;
        }

        .login-container input[type="text"],
        .login-container input[type="tel"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="tel"]:focus {
            border-color: #1a73d3;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #145ba7;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #17416d;
        }

        .login-container p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>ĐĂNG NHẬP</h1>
        <form action="login.php" method="POST">
            <input type="text" name="customer_name" placeholder="Tên khách hàng" required><br>
            <input type="tel" name="phone_number" placeholder="Số điện thoại" required><br>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>

	login.php
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customer_name = $_POST['customer_name'];
        $phone_number = $_POST['phone_number'];

        setcookie('customer_name', $customer_name, time() + 600, "/");
        setcookie('phone_number', $phone_number, time() + 600, "/");

        header('Location: mainpage.php');
        exit();
    }
?>
	maipage.php
<?php
    if (isset($_COOKIE['customer_name']) && isset($_COOKIE['phone_number'])) {
        $customer_name = htmlspecialchars($_COOKIE['customer_name']);
        $phone_number = htmlspecialchars($_COOKIE['phone_number']);
    } else {
        header('Location: login.html');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b22</title>
</head>
<body>
    <h1 style='font-family: Arial; color:red; padding: 3px; text-align: center;'>THÔNG TIN KHÁCH HÀNG</h1>
    <p>Tên khách hàng: <strong><?php echo $customer_name; ?></strong></p>
    <p>Số điện thoại: <strong><?php echo $phone_number; ?></strong></p>
    <a href="login.html"><button style='width: 20%; padding: 10px; background-color: #007bff; border: none; border-radius: 5px; color: #fff; font-weight: bold; cursor: pointer;'>Đăng xuất</button></a>
</body>
</html>

