<?php include_once('widgets/header.php') ?>
<div class="cart-main-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form method="GET" action="">
                    <table class="table" style="margin-top: 30px;">
                        <thead>
                            <tr style="text-align: center;background-color: #dee2e6; border: 2px solid #dee2e6;" >
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Thành Tiền</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php
                            if(!isset($_SESSION["CTHD"])) {
                                $ID_HD = $_GET['ID_HD'];
                                $tentaikhoan = $_SESSION['tentaikhoan'];

                                $conn = mysqli_connect("localhost", "root", "", "doan_php");
                                mysqli_query($conn, "SET NAMES 'utf8'");
                                $sqlHD = "SELECT * FROM tbl_hoadon WHERE ID_HD = $ID_HD AND taikhoan = '$tentaikhoan'";
                                $resultHD = mysqli_query($conn, $sqlHD);
                                $rowHD = mysqli_fetch_assoc($resultHD);
                                $TinhTrang = $rowHD['TinhTrang'];
                                $TongTien = $rowHD['TongGia'];

                                $sqlCTHD = "SELECT * FROM tbl_cthd WHERE ID_HD = $ID_HD";
                                $resultCTHD = mysqli_query($conn, $sqlCTHD);
                                while($rowCTHD = mysqli_fetch_assoc($resultCTHD)) {
                                    $sqlSP = "SELECT * FROM tbl_sanpham WHERE ID_SP = '".$rowCTHD['ID_SP']."'";
                                    $resultSP = mysqli_query($conn, $sqlSP);
                                    $rowSP = mysqli_fetch_assoc($resultSP);
                                    $price_formatted = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$rowSP['Gia_SP'].', 0) AS formatted_price'))['formatted_price'];
                                    $price_formatted_total = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$rowSP['Gia_SP'].' * '.$rowCTHD["SoLuongMua"].', 0) AS formatted_price'))['formatted_price'];
                                    echo '
                                    <tr>
                                        <td style="border: 2px solid #dee2e6; "><img style="width: 90px" src="./public/img/DienThoai/'.$rowSP['Anh_SP'].'" alt=""></td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowSP['Ten_SP'].'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$price_formatted.'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowCTHD['SoLuongMua'].'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$price_formatted_total.'</td>
                                    ';
                                    if($TinhTrang == 'Đang xử lý') {
                                        echo '
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; "><a href="cart.php?ID_HD='.$rowCTHD['ID_HD'].'
                                                                                                                                     &ID_SP='.$rowCTHD['ID_SP'].'
                                                                                                                                     &soluong='.$rowCTHD['SoLuongMua'].'
                                                                                                                                     &giaban='.$rowCTHD['DonGia'].'
                                                                                                                                     &tongtien='.$rowHD['TongGia'].'
                                                                                                                                     &username='.$_SESSION['username'].'&xoasanpham=true">X</a></td>
                                        </tr>
                                        ';
                                    } else {
                                        echo '
                                        <td style="border: 2px solid #dee2e6; "></td>
                                        </tr>
                                        ';
                                    }
                                }
                            }
                            //SESSION chi tiet hoa don
                            else {
                                $TinhTrang = "";
                                $TongTien = $_SESSION['CTHD'];
                                for($i = 1; $i <= count($_SESSION['CTHD']); $i++) {
                                    $sqlSP = "SELECT * FROM tbl_sanpham WHERE ID_SP = ".$_SESSION['CTHD'][$i][0]."";
                                    $resultSP = mysqli_query($conn, $sqlSP);
                                    $rowSP = mysqli_fetch_array($resultSP);

                                    echo '
                                        <td style="border: 2px solid #dee2e6; "><img style="width: 90px" src="./public/img/DienThoai/'.$rowSP['Anh_SP'].'" alt=""></td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowSP['Ten_SP'].'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowSP['Gia_SP'].'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowCTHD['SoLuongMua'].'</td>
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; ">'.$rowCTHD['DonGia'].'</td>
                                    ';
                                    echo '
                                        <td style="border: 2px solid #dee2e6; font-size: 20px; line-height: 90px; "><a href="cart_session.php?xoahoadon_SP=true&ID_SP ='.$_SESSION['CTHD'][$i][0].'">X</a></td>
                                        </tr>
                                        ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <?php 
        if(isset($_SESSION['CTHD'])) {
            echo '
            <div class="row">
                <div class="col-lg-2 offset-lg-10">
                    <div class="cartbox__total__area">
                        <div class="cart__total__amount">
                            <a href="login.php?yeucau">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        } else if ($TinhTrang == 'Đang xử lý') {
            echo '
            <div class="row">
                <div class="col-lg-2 offset-lg-10">
                    <div class="cartbox__total__area">
                        <div class="cart__total__amount">
                            <a href="cart.php?ID_HD='.$_GET['ID_HD'].'&thanhtoan=true">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
        <div class="row">
            <div class="col-lg-2 offset-lg-10">
                <div class="cartbox__total__area">
                    <div class="cart__total__amount">
                        <span>Tổng Tiền</span>
                        <span><?php
                         echo number_format($TongTien) ;?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('widgets/footer.php') ?>