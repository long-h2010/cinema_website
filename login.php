<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

//Register script
$id = '';
$username = '';
$password = '';
$fullname = '';
$birthday = '';
$gender = '';
$email = '';
$phone = '';
$confirm_pwd = '';
$error1 = '';

function createId($last_id)
{
    $char = '';
    for ($i = 0; $i < strlen($last_id); $i++) {
        if (!is_numeric($last_id[$i])) {
            $char = $char . $last_id[$i];
        }
    }

    $num_id = (int) substr($last_id, strlen($char)) + 1;

    $zero = '';
    for ($i = 0; $i < strlen($last_id) - strlen($char) - strlen($num_id); $i++) {
        $zero = $zero . "0";
    }

    return $char . $zero . $num_id;
}

if (isset($_POST['register_btn'])) {
    $check = mysqli_query($conn, "SELECT * FROM `customer`");
    if (mysqli_num_rows($check) != 0) {
        $recent_id = mysqli_query($conn, "SELECT * FROM `customer` ORDER BY `id` DESC LIMIT 1");
        while ($row = mysqli_fetch_assoc($recent_id)) {
            $last = $row["id"];
        }
        $id = createId($last);
    } else {
        $id = createId("KH0000");
    }

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['birthday']) && isset($_POST['sex']) && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['confirm_pwd'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['sex'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $confirm_pwd = $_POST['confirm_pwd'];

        $check_user = mysqli_query($conn, "SELECT * FROM `customer` WHERE `username` = '$username'");
        if (mysqli_num_rows($check_user) > 0) {
            $error1 = "Tên đăng nhập đã tồn tại! Vui lòng đăng ký lại!";
        } else if ($password != $confirm_pwd) {
            $error1 = "Mật khẩu xác nhận không chính xác!";
        } else {
            $sql = "INSERT INTO `customer`VALUES(?,?,?,?,?,?,?,?)";
            $stm = $conn->prepare($sql);
            $stm->bind_param("ssssssss", $id, $username, $password, $fullname, $birthday, $gender, $email, $phone);
            if (!$stm->execute()) {
                die($stm->error);
            }
            setcookie("success", "Đăng ký tài khoản thành công!", time()+1, "/","", 0);
        }
    }
}

//Login script
$username_login = '';
$password_login = '';
$error2 = '';
if (isset($_POST['login_btn'])) {
    if (isset($_POST['username_login']) && isset($_POST['password_login'])) {
        $username_login = $_POST['username_login'];
        $password_login = $_POST['password_login'];

        $sql_user = mysqli_query($conn, "SELECT * FROM `customer` WHERE `username` = '$username_login' AND `password` = '$password_login'");
        $sql_manager = mysqli_query($conn, "SELECT * FROM `manager` WHERE `username_manager` = '$username_login' AND `password_manager` = '$password_login'");

        $count_user = mysqli_num_rows($sql_user);
        $count_manager = mysqli_num_rows($sql_manager);
        if ($count_user == 1) {
            $_SESSION["login"] = true;
            while ($row_login = $sql_user->fetch_array(MYSQLI_ASSOC)) {
                $_SESSION["id"] = $row_login['id'];
                $_SESSION["username"] = $row_login['username'];
                $_SESSION["fullname"] = $row_login['fullname'];
                $_SESSION["email"] = $row_login['email'];
            }
            header('Location: index.php');
            setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        } else if ($count_manager == 1) {
            $_SESSION["manager"] = true;
            while ($row_login = $sql_manager->fetch_array(MYSQLI_ASSOC)) {
                $_SESSION["username_manager"] = $row_login['username_manager'];
                $_SESSION["fullname_manager"] = $row_login['fullname_manager'];
            }
            header('Location: manager.php');
            setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
        } else {
            $error2 = "Tên tài khoản hoặc mật khẩu không đúng. Vui lòng đăng nhập lại!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="./assets/img/logo.png">
    <title>Login</title>
</head>

<body>
    <div class="full-page">
        <div class="navbar">
            <div class="logo_web">
                <img href="./index.php" src="./assets/img/logo.png" alt="" class="logo">
                    <a href="./index.php" class="title"><span style="color: white;">Light</span> CINEMA</a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a class="verticalLine" href="./index.php">Trang Chủ &nbsp;</a></li>
                    <li><a class="verticalLine" href="./about_us.html">Thông Tin &nbsp;</a></li>
                    <li><a href="./support.php">Hỗ trợ </a></li>
                </ul>
            </nav>
        </div>

        <div class="box">
            <section>
                <div class="container">
                    <div class="user signinBx">
                        <div class="imgBx">
                            <p>WELCOME TO CINEMA</p>
                        </div>

                        <div class="formBx">
                            <form method="post">
                                <h2>Đăng nhập</h2>

                                <div class="input">
                                    <input type="text" required="required" name="username_login">
                                    <span>Tên tài khoản</span>
                                    <i></i>
                                </div>

                                <div class="input">
                                    <input type="password" required="required" name="password_login">
                                    <span>Mật khẩu</span>
                                    <i></i>
                                </div>

                                <p style="font-size:15px; color:white">
                                    <?php echo $error2; ?>
                                </p>

                                <input type="submit" value="Đăng nhập" required="required" name="login_btn">

                                <div class="links">
                                    <a class="forgotpwd">Quên mật khẩu</a>
                                    <p class="signup">Chưa có tài khoản?<a href="#" onclick="toggleForm()">Đăng ký</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="signup_form" class="user signupBx">
                        <div class="formBx">
                            <form method="post">
                                <h2>Tạo tài khoản</h2>

                                <div class="row">
                                    <div class="input">
                                        <input type="text" required="required" name="username">
                                        <span>Tên tài khoản</span>
                                        <i></i>
                                    </div>

                                    <div class="input">
                                        <input type="text" required="required" name="fullname">
                                        <span>Họ tên</span>
                                        <i></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input">
                                        <input type="text" required="required" name="phone">
                                        <span>Số điện thoại</span>
                                        <i></i>
                                    </div>

                                    <div class="input select">
                                        <span>Giới tính</span>
                                        <select class="" name="sex" required>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input">
                                        <input type="date" required="required" name="birthday">
                                        <span>Ngày sinh</span>
                                        <i></i>
                                    </div>

                                    <div class="input">
                                        <input type="text" required="required" name="email">
                                        <span>Email</span>
                                        <i></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input">
                                        <input type="password" required="required" name="password">
                                        <span>Mật khẩu</span>
                                        <i></i>
                                    </div>

                                    <div class="input">
                                        <input type="password" required="required" name="confirm_pwd">
                                        <span>Nhập lại mật khẩu</span>
                                        <i></i>
                                    </div>
                                </div>

                                <div class="rowbottom">
                                    <p style="font-size:15px; color:white; padding: 32px 0;">
                                        <?php echo $error1; ?>
                                    </p>

                                    <p class="signup">Đã có tài khoản?<a href="#" onclick="toggleForm()">Đăng nhập</a></p>

                                    <input type="submit" value="Đăng ký" required="required" name="register_btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="./assets/js/login.js"></script>
    <script>
        function showSuccess() {
            alert("Bạn đã đăng ký tài khoản thành công!");
        }
    </script>
</body>

</html>