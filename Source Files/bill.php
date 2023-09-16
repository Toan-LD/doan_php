<?php include_once('widgets/header.php') ?>
<div class="cart-main-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">
                <form action="">
                    <table class="table" style="margin-top: 30px;">
                        <thead>
                            <tr style="text-align: center;background-color: #dee2e6; border: 2px solid #dee2e6;" >
                                <th scope="col">Mã Hóa Đơn</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Tình Trạng</th>
                                <th scope="col">Remove</th>
                                <th scope="col">Chi Tiết Hóa Đơn</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php
                            if(isset($_SESSION["tentaikhoan"])) {
                                $tentaikhoan = $_SESSION["tentaikhoan"];
                                $conn = mysqli_connect("localhost", "root", "", "doan_php");
                                $sqlHD = "SELECT * FROM tbl_hoadon WHERE taikhoan = '$tentaikhoan'";
                                $resultHD = mysqli_query($conn, $sqlHD);
                                while ($rowHD = mysqli_fetch_array($resultHD)) {
                                    echo '
                                    <tr>
                                        <td style="border: 2px solid #dee2e6; ">Hóa Đơn '.$rowHD['ID_HD'].'</td>
                                        <td style="border: 2px solid #dee2e6; ">'.number_format($rowHD['TongGia']).'</td>
                                        <td style="border: 2px solid #dee2e6; ">'.$rowHD['TinhTrang'].'</td>

                                    ';  
                                    if($rowHD['TinhTrang'] == 'Đang xử lý'){
                                        echo '
                                        <td style="border: 2px solid #dee2e6; "><a href="cart.php?xoahoadon=true&ID_HD='.$rowHD['ID_HD'].'">X</a></td>
                                        ';
                                    } else {
                                        echo '
                                        <td style="border: 2px solid #dee2e6; "></td>
                                        ';
                                    }
                                    echo '
                                    <td style="border: 2px solid #dee2e6; "><a  href="detail-bill.php?ID_HD='.$rowHD['ID_HD'].'">Hóa Đơn '.$rowHD['ID_HD'].'</a></td>
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
    </div>
</div>


<?php include_once('widgets/footer.php') ?>