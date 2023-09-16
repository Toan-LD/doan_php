<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="./../public/css/detail-product.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#" style="margin-left: 100px;">
                    <img style="width: 50%; border-radius: 50%;" src="./public/img/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" id="title" href="./index.php">Trang Chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./product.php">Sản Phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./news.php">Tin Tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./introduce.php">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./contact.php">Liên Hệ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 mr-4">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        <a href="<?php 
                        if(isset($_SESSION['tentaikhoan'])) {
                            echo './bill.php';
                        } else {
                            echo './login.php?yeucau';
                        }
                        ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                        <ul class="navbar-nav mr-auto pl-4" style="margin-right: 20px;">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tài Khoản
                                </a>
                                <?php if(isset($_SESSION['username'])): ?>
                                    <?php 
                                        echo '
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="./ThongTinTaiKhoan.php">'.$_SESSION['username'].'</a>
                                                <a class="dropdown-item" href="./logout.php">Đăng Xuất</a>
                                            </div>
                                        ';    
                                    ?>
                                    <?php else: ?>
                                        <?php echo '
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="./login.php">Đăng Nhập</a>
                                                <a class="dropdown-item" href="./register.php">Đăng Kí</a>
                                            </div>
                                            ' 
                                        ?>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </form>
                </div>
            </nav>
        </div>