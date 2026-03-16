login.html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b21</title>
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
            width: 400px;
        }

        h1 {
            font-family: Arial;
            color: #007bff;
            padding: 3px;
            text-align: center;
        }

        .login-container input[type="text"],
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="email"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #007bff;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .login-container p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>TRANG ĐĂNG NHẬP</h1>
        <hr color="black" size="3"><br>
        <form action="login.php" method="POST">
            Username: <input type="text" name="username" required><br>
            Email: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

	login.php
<?php
    session_start();

    $valid_user = "user1";
    $valid_email = "user1@gmail.com";
    $valid_password = "abcd1234";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($username === $valid_user && $email === $valid_email && $password === $valid_password) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            echo "<h1 style='font-family: Arial; color: #007bff; padding: 3px; text-align: center;'>Trang xử lý thông tin đăng nhập</h1><hr>";
            echo "<p>Thông tin đăng nhập hợp lệ</p>";
            echo "<form action='mainpage.php' method='get'><button type='submit' style='width: 20%; padding: 10px; background-color: #007bff; border: none; border-radius: 5px; color: #fff; font-weight: bold; cursor: pointer;'>Trang chính</button></form>";
        } else {
            echo "<h1>Trang xử lý thông tin đăng nhập</h1><hr>";
            echo "<p>Thông tin đăng nhập không hợp lệ</p>";
            echo "<a href='login.html'><button type='button'>Thử lại</button></a>";
        }
    }
?>
	mainpage.php
<?php
    session_start();
    if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
        header('Location: login.html');
        exit();
    }

    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyễn Hoàng Tiến</title>
</head>
<body>
    <h1 style='font-family: Arial; color: #007bff; padding: 3px; text-align: center;'>TRANG CHÍNH</h1><hr>
    <p>Người dùng đã đăng nhập với tên <strong><?php echo htmlspecialchars($username); ?></strong> và Email là <strong><?php echo htmlspecialchars($email); ?></strong>.</p>
    <a href="logout.php"><button style='width: 20%; padding: 10px; background-color: #007bff; border: none; border-radius: 5px; color: #fff; font-weight: bold; cursor: pointer;'>Đăng xuất</button></a>
</body>
</html>

	logout.php
<?php
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.html');
    exit();
?>

