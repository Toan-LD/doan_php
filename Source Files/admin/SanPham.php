<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./../public/font/fontawesome-free-6.4.0-web/css/all.css">

<div class="container dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="title" style="float: left"><h2>Quản Lý Sản Phẩm</h2></div>
                    <div class="search-container" style="float: right; margin-top:10px">
                        <form action="code.php" method="post">
                            <input type="text" placeholder="Search..." name="search">
                            <button type="submit" name="btnSearch_SP">Search</button>
                        </form>
                    </div>
                </div>
                <div class="card-body" >
                    <table class="table table-striped table-border first">
                        <tr>
                            <th>Tên SP</th>
                            <th>Danh Mục</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Trạng Thái</th>
                            <th>Xử Lý</th>
                        </tr>
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'doan_php') or die("Lỗi kết nối");
                            $sqlSelect = "SELECT * from tbl_sanpham";
                            if(isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $sqlSelect = "Select * from tbl_sanpham where Ten_SP like '%$search%'";
                            }

                            $result = mysqli_query($conn, $sqlSelect);
                            $tranghientai = isset($_GET['tranghientai']) ? $_GET['tranghientai'] : 1 ;

                            $sosphienthi = 3;
                            $tongsp = mysqli_num_rows($result);
                            $sotrang = ceil($tongsp / $sosphienthi);
                            $vitri = ($tranghientai - 1) * $sosphienthi;

                            $sql = "SELECT * from tbl_sanpham LIMIT $vitri, $sosphienthi";
                            if(isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $sql = "Select * from tbl_sanpham where Ten_SP like '%$search%' limit ".$vitri.",".$sosphienthi;;
                            } 

                           mysqli_query($conn, "SET NAMES 'utf8'");
                           $result = mysqli_query($conn, $sql);
                        
                           while($row = mysqli_fetch_array($result)) {
                            $sqlDanhMuc = "SELECT ID_DM, Ten_DM FROM tbl_danhmuc_sanpham where ID_DM = ".$row['ID_DM'].""; 
                            $rowDM = mysqli_fetch_array(mysqli_query($conn, $sqlDanhMuc));
                            
                            ?>
                            <tr>
                                <td style="padding = 0;"><?php echo $row["Ten_SP"] ?></td>
                                <td><?php echo $rowDM["Ten_DM"] ?></td>
                                <td><?php echo number_format($row["Gia_SP"], 0, ',', '.'); ?> &nbsp;₫</td>
                                <td>
                                    <?php 
                                        echo '
                                            <img style="width: 50px" src="./../public/img/DienThoai/'.$row['Anh_SP'].'"></img>
                                        '
                                    ?>
                                </td>
                                <td><?php echo ($row["HienThi"]) ? "Ẩn" : "Hiện" ?></td>
                                <td><a href="main.php?SuaSanPham=true&id=<?php echo $row['ID_SP'] ?>"><span><i class="fa-regular fa-pen-to-square"></i></span></a>
                                <?php
                                        if($row["HienThi"] == 0 ) {
                                            echo '
                                                <form action="code.php" method="post">
                                                    <button type="submit" name="btn_an" class="btn btn-outline-info" style="margin-left: 0px; padding-right: 19px; padding-left: 18px;">Ẩn</button>
                                                    <input type="hidden" name="ID_SP" value="'.$row['ID_SP'].'">
                                                </form>
                                            ';
                                        } else {
                                            echo
                                            '
                                            <form action="code.php" method="post">
                                                <button type="submit" name="btn_hien" class="btn btn-outline-info">Hiện</button>
                                                <input type="hidden" name="ID_SP" value="'.$row['ID_SP'].'">
                                            </form>
                                            ';
                                        }
                                    ?></td>
                                <!-- <td>
                                    <?php
                                        if($row["HienThi"] == 0 ) {
                                            echo '
                                                <form action="code.php" method="post">
                                                    <button type="submit" name="btn_an" class="btn btn-outline-info" style="margin-left: 0px; padding-right: 19px; padding-left: 18px;">Ẩn</button>
                                                    <input type="hidden" name="ID_SP" value="'.$row['ID_SP'].'">
                                                </form>
                                            ';
                                        } else {
                                            echo
                                            '
                                            <form action="code.php" method="post">
                                                <button type="submit" name="btn_hien" class="btn btn-outline-info">Hiện</button>
                                                <input type="hidden" name="ID_SP" value="'.$row['ID_SP'].'">
                                            </form>
                                            ';
                                        }
                                    ?>
                                </td> -->
                            </tr>
                         <?php  } ?>
                    </table>
                    <?php
                        for($i = 1; $i<= $sotrang;$i++) {
                            // if ( isset($_GET['search']))
							// 				echo '
                            //                 <a href="main.php?act=onLeft&name=SanPham&tranghientai='.$i.'&search='.$_GET['search'].'">
                            //                 <div style="margin-left: 20px; width: 40px; height: 40px; border-radius: 100%; text-align: center; background-color: #33ccff; line-height: 40px; display: inline-block;">
                            //                 '.$i.'
                            //                 </div>
                            //                 </a>
                            //                 ';
                            //                 else
											echo '
                                            <a href="main.php?act=onLeft&name=SanPham&tranghientai='.$i.'">
                                            <div style="margin-left: 20px; width: 40px; height: 40px; border-radius: 100%; text-align: center; background-color: #33ccff; line-height: 40px; display: inline-block;">
                                            '.$i.'
                                            </div>
                                            </a>
											';
                        }   
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>