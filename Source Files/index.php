<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/font/fontawesome-free-6.4.0-web/css/all.min.css">
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
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./index.php">Trang Chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./product.php">Sản Phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./widgets/">Tin Tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./widgets/">Giới Thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="title" href="./widgets/">Liên Hệ</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 mr-4">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        <ul class="navbar-nav mr-auto pl-4" style="margin-right: 20px;">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tài Khoản
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Đăng Nhập</a>
                                    <a class="dropdown-item" href="#">Đăng Kí</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
            </nav>
        </div> -->
        <?php include_once('./widgets/header.php'); ?>
        <div class="slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./public/img/slide/1.webp" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./public/img/slide/2.webp" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./public/img/slide/3.webp" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./public/img/slide/4.webp" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="product">
            <div class="container-decor container mt-5">
                <h1>
                    <span class="title">Sản Phẩm</span>
                </h1>
                <div class="sort-product mb-2 mt-4 w-100" style="display: inline-block;">
                    <div class="sort float-sm-right" >
                        <span>Sắp Xếp</span>
                        <select name="select-product-sort">
                            <option value="">Mặc định</option>
                            <option value="">Theo giá trị tăng dần</option>
                            <option value="">Theo giá trị giảm dần</option>
                        </select>
                    </div>
                </div>
                <div class="row-product"> 
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'doan_php');
                        mysqli_query($conn, "SET NAMES 'utf8'");
                        $category_id = 1;

                        $total_products_query = mysqli_query($conn,"SELECT Count(*) AS total from tbl_sanpham where ID_DM = $category_id AND HienThi = 0");
                        $total_products = mysqli_fetch_assoc($total_products_query)['total'];
                        $limit = 8;

                        //Tinh so trang
                        $total_page = ceil($total_products/$limit);

                        //xac dinh page hien tai
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($current_page - 1) * $limit;
                        $end = $start + $limit;

                        $sql = "SELECT ID_SP, Anh_SP, Ten_SP, Gia_SP from tbl_sanpham WHERE ID_DM = $category_id AND HienThi = 0 ORDER BY ID_SP DESC LIMIT $start, $limit";


                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            $price_formatted = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$row[3].', 0) AS formatted_price'))['formatted_price'];
                            echo '
                                <div class="product-block clearfix">
                                    <div class="product-list row">
                                        <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                                            <div class="product-item wow pulse">
                                                <div class="image image-resize">
                                                    <a href="detail-product.php?ID_SP='.$row[0].'" title="'.$row[2].'">
                                                        <img id="img-product" src="./public/img/DienThoai/'.$row[1].'" data-original="./public/img/DienThoai/'.$row[1].'" alt="'.$row[2].'" class="img-responsive lazy-img" />
                                                    </a>    
                                                </div>
                                                <div class="right-block">
                                                    <h2 class="name">
                                                        <a href="" title="'.$row[2].'">'.$row[2].'</a>
                                                    </h2>
                                                    <div class="price">
                                                        <span class="price-new">'.$price_formatted.'&nbsp;₫</span>
                                                    </div>
                                                    <div class="action btn-buy mb-2 mt-2">
                                                        <a class="btn-buy-product"  style="border-radius: 8px;" href="detail-product.php?ID_SP='.$row[0].'" title="'.$row[2].'">Mua</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </div>
                <div class="more-product">
                    <a href="./product.php"  style="border-radius: 8px;" class="more">Xem Thêm</a>
                </div>
            </div>
        </div>
        <?php include_once('./widgets/footer.php'); ?>
        <!-- <footer class="text-center text-lg-start bg-light text-muted">
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>ToanLD
                        </h6>
                        <p>
                        Dù đối tác ở khu vực nào, với quy mô như thế nào hoặc định hướng phát triển ra sao chúng tôi vẫn luôn niềm nở phục vụ tinh thần đóng góp
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Điện Thoại</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Đồng Hồ</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Phụ Kiện</a>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Facebook</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Youtube</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Twitter</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i>Tp.Hồ Chí Minh</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    </div>
                </div>
            </div>
        </section>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> -->