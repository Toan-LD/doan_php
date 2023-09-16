<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="./../public/font/fontawesome-free-6.4.0-web/css/all.css">
<div class="row" style="justify-content: space-around">
    <div class="title" style="float: left; margin-top: 10px"><h2>Quản Lý Hóa Đơn</h2></div>
    <div class="search-container" style="float: right; margin-top: 10px;">
        <form action="code.php" method="post">
            <input type="text" name="search" id="" placeholder="Tìm Kiếm...">
            <button type="submit" name="btnSearch_HD" id="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
</div>
<div class="row" style="margin-top: 10px" >
    <div class="col-md-3">
        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date">
    </div>
    <div class="col-md-3">
        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date">
    </div>
    
    <div class="col-md-3">
        <input type="button" name="filter" id="" value="Filter" class="btn btn-info">
    </div>
</div>
<br>
<div>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "doan_php");
    $query = "SELECT * FROM tbl_hoadon";
    if(isset($_GET["search"])) {
        $search = $_GET["search"];
        $query = "SELECT * FROM tbl_hoadon WHERE taikhoan LIKE '%$search%' OR TongGia LIKE '%$search%' OR TinhTrang LIKE '%$search%' ";
    }

    $query_run = mysqli_query($conn, $query);

    ?>

    <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
        <thead>
            <th>MaHD</th>
            <th>Email</th>
            <th>Tổng Tiền</th>
            <th>Tình Trạng</th>
            <th>Xem</th>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0) {
                while($row = mysqli_fetch_array($query_run)) {
                    if($row['TinhTrang'] != "Đang xử lý" ){
                        ?>
                        <tr>
                            <td><?php echo $row['ID_HD']; ?></td>
                            <td><?php echo $row['taikhoan'] ?></td>
                            <td><?php echo number_format($row['TongGia'], 0, '.', ','); ?> &nbsp;₫  </td>
                            <td>
                                <?php 
                                if($row['TinhTrang'] == 'Đã hoàn thành')
                                echo 'Đã hoàn thành';
                                else 
                                
                                echo '
                                <form action="getCheck.php" method="post" enctype="multipart/form">
                                <button name="check_btn" class="btn btn-outline-success" value="'.$row['ID_HD'].'">Hoàn thành</button>
                                </form>
                                '
                                ?>
                            </td>
                            <td>
                                <form action="chiTietDonHang.php?id=<?php echo $row['ID_HD']; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="see_id" value="<?php echo $row['ID_HD']?>">
                                    <button type="submit" name="see_btn" class="btn btn-outline-info">Xem</button>
                                </form>
                            </td>
                        </tr>
                <?php    
                    }
                }
            } else echo "<h2>Không tìm thấy hóa đơn</h2>";
            ?>
        </tbody>
    </table>
</div>