<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="./../public/font/fontawesome-free-6.4.0-web/css/fontawesome-free-6.4.0-web">
<?php session_start() ; ?>

<body>
    <div style="padding-left: 0px; margin-top: 20px;" >
        <div class="container dashboard-content">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Product</h5>
                        <div class="card-body">
                            <form action="add-product.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="inputUserName" >Tên sản phẩm</label>
                                        <input required style="width: 400px" type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" class="form-control">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="inputUserName" >Loại sản phẩm</label>
                                        <select style="width: 400px;" name="cat_id" id="cat_id" class="form-control">
                                            <?php 
                                            $conn = mysqli_connect("localhost", "root", "", "doan_php") or die("Lỗi kết nối");
                                            $sqlTheLoai = "SELECT * FROM tbl_danhmuc_sanpham";
                                            $resultTheLoai = mysqli_query($conn, $sqlTheLoai);
                                            while($rowTheLoai = mysqli_fetch_assoc($resultTheLoai)) {
                                            ?>
                                                <option value="<?php echo $rowTheLoai["ID_DM"] ?>"><?php echo $rowTheLoai["Ten_DM"] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Giá</label>
                                        <input required style="width: 400px" type="text" name="price" id="price" placeholder="Giá" class="form-control">
                                    </div>
                                    <div class="form-group col">
                                        <label for="">Ảnh</label> <br>
                                        <input required type="file" name="image" id="image">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Màn Hình</label>
                                        <input required style="width: 400px" type="text" name="ManHinh" class="form-control" id="ManHinh" value="" placeholder="Màn Hình...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Kích Thước</label>
                                        <input required style="width: 400px" type="text" name="KichThuoc" class="form-control" id="KichThuoc" value="" placeholder="Kích Thước...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Trọng Lượng</label>
                                        <input required style="width: 400px" type="text" name="TrongLuong" class="form-control" id="TrongLuong" value="" placeholder="Trọng Lượng...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Âm Thanh</label>
                                        <input required style="width: 400px" type="text" name="AmThanh" class="form-control" id="AmThanh" value="" placeholder="Âm Thanh...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Màu</label>
                                        <input required style="width: 400px" type="text" name="Mau" class="form-control" id="Mau" value="" placeholder="Màu...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Bộ Nhớ</label>
                                        <input required style="width: 400px" type="text" name="BoNho" class="form-control" id="BoNho" value="" placeholder="Bộ Nhớ...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Hệ Điều Hành</label>
                                        <input required style="width: 400px" type="text" name="HeDieuHanh" class="form-control" id="HeDieuHanh" value="" placeholder="Hệ Điều Hành...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Camera</label>
                                        <input required style="width: 400px" type="text" name="Camera" class="form-control" id="Camera" value="" placeholder="Camera...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Pin</label>
                                        <input required style="width: 400px" type="text" name="Pin" class="form-control" id="Pin" value="" placeholder="Pin...">
                                    </div>
                                    <div class="form-group col" >
                                        <label for="">Kết Nối</label>
                                        <input required style="width: 400px" type="text" name="KetNoi" class="form-control" id="KetNoi" value="" placeholder="Kết Nối...">
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 pl-0">
                                        <p class="text-right">
                                            <button style="margin-left: 220px" name="btn-add"  type="submit" class="btn btn-space btn-primary">Thêm</button>
                                        </p>
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <?php if (isset($_SESSION['error'])): ?>
                                                            <div class="alert alert-danger text-center" style="display: inline-block"><?php echo $_SESSION['error']; ?></div>
                                                            <?php unset($_SESSION['error']); ?>
                                                        <?php endif; ?>
                                                        <?php if (isset($_SESSION['success'])): ?>
                                                            <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                                                            <?php unset($_SESSION['success']); ?>
                                                        <?php endif; ?>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

