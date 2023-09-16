<?php
    session_start();
    if(isset($_POST['button'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['tentaikhoan'] = $username;
        $conn = mysqli_connect('localhost', 'root', '', 'doan_php');
        $sql = "select * from tbl_nguoidung where taikhoan='$username'";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) == 0) {
            $_SESSION['error'] = "Tài khoản không tồn tại";
            header("Location: login.php");
            exit();
        } else if(mysqli_num_rows($result) > 0) {
            $flag = false;
            while($row = mysqli_fetch_array($result)) {
                if($username == $row['taikhoan'] && $password == $row['matkhau'] && $row['capbac'] == "admin") {
                    $flag = true;
                    header("Location: ./admin/main.php");
                    exit();
                } else if($username == $row['taikhoan'] && $password == $row['matkhau'] && $row['capbac'] != "admin") {
                    $_SESSION['username'] = $row['ten'];
                    $flag = true;

                    header("Location: index.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Mật khẩu không đúng";
                    header("Location: login.php");
                    exit();
                }
            }

            if($_SESSION['CTHD'] && $flag){
                $username = $_POST['username'];
                
            }

        }
        unset($_SESSION['error']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
    }
?>