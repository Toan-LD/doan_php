<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./../public/font/fontawesome-free-6.4.0-web/css/fontawesome-free-6.4.0-web">
</head>
<style>
    .header {
        border: 5px solid black;
    }

    a{
        font-size: 20px;
        margin: 16px 0;
        text-align:center;
        color: black;
        margin-bottom: 16px !important;
    }

    .col-md-2 a:hover{
        font-size: 20px;
        color: white !important;
        background-color: grey !important;
    }

</style>
<body>
    <div class="row">
        <div class="col header" style="background: linear-gradient(to right, #33ccff 0%, #E7EB7E 50%, #ff99cc 100%);">
            <h2 style="text-align: center; padding-top:25px; padding-bottom: 25px; color: #000;" >Trang Quản Trị</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-sm-2" style="border: 5px solid #000; padding: 0">
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " href="main.php?act=onLeft&name=DonHang" class="list-group-item"><div class="trai" >Đơn Hàng</div></a>
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " class="list-group-item" href="main.php?act=onLeft&name=SanPham"><div class="trai" >Sản Phẩm</div></a>
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " class="list-group-item" href="main.php?act=onLeft&name=ThemSanPham"><div class="trai" >Thêm Sản Phẩm</div></a>
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " class="list-group-item" href="main.php?act=onLeft&name=DanhMucSanPham"><div class="trai" >Danh Mục</div></a>
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " class="list-group-item" href="main.php?act=onLeft&name=ThongKe"><div class="trai" >Thống Kê</div></a>
            <a style="border: 0px; background-color: #33ccff; border-radius: 0; " class="list-group-item" href="main.php?act=onLeft&name=DangXuat"><div class="trai" >Đăng Xuất</div></a>
        </div>
        <div class="col-md-10 col-sm-10 center" style="border: 5px solid #000" >
			
            <div class="table-responsive">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "doan_php");
            if(isset($_POST['see_btn'])) {
                $id = $_POST['see_id'];
                $query = "SELECT * FROM tbl_cthd WHERE ID_HD = '$id'";
                $result = mysqli_query($conn, $query);
            }
            ?>
            <div class="title" style="float: left; margin-top: 10px"><h2>Chi Tiết Của Hóa Đơn <?php echo "HD".$id ?> </h2></div>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">

                <thead>
                    <th>Mã Hóa Đơn</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Số Lượng Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Thành Tiền</th>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0) {
                        $tongTien = 0;
                        while($row = mysqli_fetch_assoc($result)) {
                            $tongTien += $row['SoLuongMua'] * $row['DonGia'];
                    ?>
                        <tr>
                            <td>HD<?php echo $row['ID_HD'] ?></td>
                            <td><?php echo $row['ID_SP'] ?></td>
                            <td><?php echo $row['SoLuongMua'] ?></td>
                            <td><?php echo number_format($row['DonGia'] , 0, ".", ",") ?>&nbsp;₫</td>
                            <td><?php echo number_format($row['SoLuongMua'] * $row['DonGia'], 0, ".", ",") ?> &nbsp;₫</td>
                        </tr>
                    <?php
                        }
                        echo '
                        <tr>
                            <td colspan="4"></td>
                            <td> <b>Tổng tiền:</b> '.number_format($tongTien, 0, ".", ",").'&nbsp;₫ </td>
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
		</div>
        
    </div>
</body>
</html>