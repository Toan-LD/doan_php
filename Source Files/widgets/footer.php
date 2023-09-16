<footer class="text-center text-lg-start bg-light text-muted">
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
        <div id="quickview-wrapper">
		<!-- Sản phẩm -->
		<!-- Modal -->
            <?php 
            $conn = mysqli_connect("localhost","root","","doan_php");
            mysqli_query($conn, "SET NAMES 'utf8'");
            //SELECT * FROM `tblsach` ORDER BY idSach DESC LIMIT 0,4			
            $sql = "select ID_SP, Anh_SP, Ten_SP, Gia_SP from tbl_sanpham where ID_DM = 1";
            $result = mysqli_query($conn, $sql);

            while ( $row = mysqli_fetch_array($result) ) {
                $price_formatted = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$row[3].', 0) AS formatted_price'))['formatted_price'];
                echo 
                '
                    <div class="modal fade" id="productmodal'.$row[0].'" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal__container" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="modal-product">  
                                        <!-- Start product images -->
                                        <div class="image image-resize">
                                            <a href="" title="'.$row[2].'">
                                                <img id="img-product" src="./public/img/DienThoai/'.$row[1].'" data-original="./public/img/DienThoai/'.$row[1].'" alt="'.$row[2].'" class="img-responsive lazy-img" />
                                            </a>    
                                        </div>
                                        <div class="product-info">
                                            <h1>'.$row[2].'</h1>
                                            <div class="price-box-3">
                                                <div class="s-price-box">
                                                    <span class="new-price">'.$price_formatted.' &nbsp;₫</span>
                                                </div>
                                            </div>
                                            <form method="POST" action="cart.php">
                                                <input type="hidden" name="image" value="./public/img/DienThoai/'.$row[1].'">
                                                <input type="hidden" name="name" value="'.$row[2].'">
                                                <input type="hidden" name="price" value="'.$row[3].'">
                                                <button class="add-to-cart" type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                                            </form>    
                                        </div>								
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';	
            }
            ?>
        <!-- End Single Product -->								

	    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>