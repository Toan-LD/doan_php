<?php include_once('widgets/header.php'); ?>
<style>
.input-text {
  /* Tùy chỉnh kiểu dáng cho input-text */
  /* Ví dụ: */
  padding: 5px;
  border: 1px solid grey;
  border-radius: 10px;
  width: 50px;
}

.tocart {
  /* Tùy chỉnh kiểu dáng cho nút button */
  /* Ví dụ: */
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
}

.addtocart__actions {
  /* Tùy chỉnh kiểu dáng cho phần bao bọc nút button */
  /* Ví dụ: */
  margin-top: 10px;
}
</style>

            <?php
                $ID_SP = $_GET['ID_SP'];
                
                if(isset($_SESSION['tentaikhoan'])) {
                    $username = $_SESSION['tentaikhoan'];
                } else {
                    $username = 'null';
                }

                $conn = mysqli_connect("localhost", "root", "", "doan_php");
                mysqli_query($conn, "SET NAMES 'utf8'");
                $sql = "SELECT * from tbl_sanpham WHERE ID_SP = $ID_SP";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                    $price_formatted = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$row['Gia_SP'].', 0) AS formatted_price'))['formatted_price'];
                    echo '
                        <div class="container">
                        <h1>
                            <span class="title">Sản Phẩm</span>
                        </h1>
                            <div class="row">
                                <div class="col-5">
                                    <div class="image image-resize">
                                        <a href="" title="'.$row['Ten_SP'].'">
                                            <img id="img-product" src="./public/img/DienThoai/'.$row['Anh_SP'].'" data-original="./public/img/DienThoai/'.$row['Anh_SP'].'" alt="'.$row['Ten_SP'].'" class="img-responsive lazy-img" />
                                        </a>  
                                    </div>
                                    <div class="product-info">
                                        <h2>'.$row[2].'</h2>
                                        <div class="price-box-3">
                                            <div class="s-price-box">
                                                <span style="font-size: 20px" class="new-price">'.$price_formatted.' &nbsp;₫</span>
                                            </div>
                                        </div>
                                    </div>	
                                    <div class="box-tocart d-flex">
										';
											if (!isset($_SESSION['username']))
												echo'<form action="cart_session.php" method="GET">';
											else 
												echo '<form action="cart.php?ID_SP='.$_GET['ID_SP'].'&username='.$username.'" method="GET">';
											
										echo'
        									<span>Số Lượng: </span>
											<input class="input-text qty" name="soluong" min="1" value="1" title="Qty" type="number">
											<input type="hidden" name="ID_SP" value="'.$_GET['ID_SP'].'"></input>
											<input type="hidden" name="username" value="'.$username.'"></input>

        									<div class="addtocart__actions">
												<button class="tocart" type="submit" title="Add to cart">Thêm Vào Giỏ Hàng</button>
											</div>
											</form>
										</div> 
                                </div>
                                <div class="col-sm">
                                    <div class="parameter">
                                        <ul class="parameter__list list-group">
                                            <li class="list-group-item">
                                                <div style="display: inline-block; width: 140px;">
                                                    Màn Hình: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['ManHinh'].'</span></div>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                <div style="display: inline-block; width: 140px;">
                                                    Hệ Điều Hành: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['HeDieuHanh'].'</span></div>
                                            </li>
                                            <li class="list-group-item ">
                                                <div style="display: inline-block; width: 140px;">
                                                    Màu Sắc: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['MauSac'].'</span></div>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary" >
                                                <div style="display: inline-block; width: 140px;">
                                                    Kích Thước: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['KichThuoc'].'</span></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div style="display: inline-block; width: 140px;">
                                                    Trọng Lượng
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['TrongLuong'].'</span></div>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                <div style="display: inline-block; width: 140px;">
                                                    Âm Thanh: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['AmThanh'].'</span></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div style="display: inline-block; width: 140px;">
                                                    Bộ Nhớ: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['BoNho'].'</span></div>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                <div style="display: inline-block; width: 140px;">
                                                    Camera: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['Camera'].'</span></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div style="display: inline-block; width: 140px;">
                                                    Pin: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['Pin'].'</span></div>
                                            </li>
                                            <li class="list-group-item list-group-item-secondary">
                                                <div style="display: inline-block; width: 140px;">
                                                    Kết Nối: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['KetNoi'].'</span></div>
                                            </li>
                                            <li class="list-group-item">
                                                <div style="display: inline-block; width: 140px;">
                                                    Bảo Hành: 
                                                </div> 
                                                    <div style="width: calc(100% - 140px); display: inline-block; float: right"><span>'.$row['BaoHanh'].'</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
            ?>
<?php include_once('widgets/footer.php'); ?>