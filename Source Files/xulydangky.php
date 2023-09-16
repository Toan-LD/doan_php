<?php 
    session_start();
    if(isset($_POST['button']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['confirm'] = $confirm;
        $conn = mysqli_connect('localhost', 'root', '', 'doan_php');
        $sql = "select taikhoan from tbl_nguoidung WHERE taikhoan = '$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error'] = 'Username đã tồn tại';
            header("Location: register.php");
            exit();
        }
        
        $sql = "INSERT INTO tbl_nguoidung (ten, taikhoan, matkhau) VALUES ('$name', '$username', '$password')";
        if ($password != $confirm) {
            $_SESSION['error'] = "Mật khẩu không khớp";
            header("Location: register.php");
            exit();
        }else {
            if(mysqli_query($conn, $sql)) {
                mysqli_query($conn, "INSERT INTO tbl_khachhang (Ten_KH, Email) VALUES ('$name', '$email')");
                $_SESSION['success'] = "Đăng ký thành công";
                header("Location: register.php");
                exit();
            } else {
                $_SESSION['error'] = "Đăng ký thất bại";
                header("Location: register.php");
                exit();
            }
        }
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['confirm']);
    }
?>