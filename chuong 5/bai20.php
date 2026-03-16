	User.ini
[user1]
email = user1@gmail.com
password = abcd1234
code = 246868

[user2]
email = user2@gmail.com
password = abcd6789
code = 267979

	b20.php
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tvt_b20</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0; 
        }

        h1 {
            font-family: Arial;
            color: #007bff;
            padding: 3px;
            text-align: center;
        }

        .login-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            border-width: 1px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            background-color: #fff;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #007bff;
        }

        .login-container .show-password {
            cursor: pointer;
            display: block;
            margin-bottom: 10px;
            text-align: right;
            color: #007bff;
        }

        .login-container .show-password:hover {
            color: #0056b3;
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
            color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>ĐĂNG NHẬP THÀNH VIÊN</h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $code = $_POST['code'];

                $users = parse_ini_file('users.ini', true);
                $login_success = false;

                foreach ($users as $user) {
                    if ($user['email'] === $email && $user['password'] === $password && $user['code'] === $code) {
                        $login_success = true;
                        setcookie('user', $email, time() + 180);
                        echo "<p style='color:green;'>Đăng nhập thành công! Chào mừng, $email.</p>";
                        break;
                    }
                }

                if (!$login_success) {
                    echo "<p style='color:red;'>Thông tin đăng nhập không chính xác.</p>";
                }
            }

            if (isset($_COOKIE['user'])) {
                echo "<p style='color:green;'>Bạn đã đăng nhập. Chào mừng, " . htmlspecialchars($_COOKIE['user']) . ".</p>";
                echo "<form method='post'><button type='submit' name='logout'>Đăng xuất</button></form>";
            } else {
                echo '
                <form method="POST">
                    <input type="text" name="email" placeholder="Email" required><br>
                    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
                    <span class="show-password" onclick="togglePassword()">Hiện mật khẩu</span><br>
                    <input type="text" name="code" placeholder="Mã số"><br>
                    <button type="submit">Đăng nhập</button>
                    <br><br>
                    <button type="submit">Đăng ký</button>
                </form>';
            }

            if (isset($_POST['logout'])) {
                setcookie('user', '', time() - 3600);
                header("Refresh:0");
            }
        ?>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</body>
</html>

