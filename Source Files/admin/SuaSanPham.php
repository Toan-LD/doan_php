<?php
$conn = mysqli_connect("localhost", "root", "","doan_php");
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $sqlGetID = "SELECT * FROM tbl_sanpham WHERE ID_SP = $id";
    $result = mysqli_query($conn, $sqlGetID);
    $row = mysqli_fetch_array($result);
    $name = $row['Ten_SP'];
    $cat_id = $row['ID_DM'];
    $price = $row['Gia_SP'];
    $fileName = $row['Anh_SP'];
    $kichThuoc = $row['KichThuoc'];
    $trongLuong = $row['TrongLuong'];
    $mauSac = $row['MauSac'];
    $amThanh = $row['AmThanh'];
    $boNho = $row['BoNho'];
    $heDieuHanh = $row['HeDieuHanh'];
    $camera = $row['Camera'];
    $pin = $row['Pin'];
    $ketNoi = $row['KetNoi'];
    $manHinh = $row['ManHinh'];
}

if(isset($_POST['btn-update'])) {
    $name = $_POST['name'];
    $cat_id = $_POST['cat_id'];
    $price = $_POST['price'];
    $fileName = $_POST['fileName'];
    $kichThuoc = $_POST['KichThuoc'];
    $trongLuong = $_POST['TrongLuong'];
    $mauSac = $_POST['Mau'];
    $amThanh = $_POST['AmThanh'];
    $boNho = $_POST['BoNho'];
    $heDieuHanh = $_POST['HeDieuHanh'];
    $camera = $_POST['Camera'];
    $pin = $_POST['Pin'];
    $ketNoi = $_POST['KetNoi'];
    $manHinh = $_POST['ManHinh'];

    if(isset($_FILES["image"])) {
        if($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png" || $_FILES["image"]["type"] == "image/jpg" || $_FILES["image"]["type"] == "image/gif") {
            if($_FILES["image"]["error"] == 0) {
                $filename = $_FILES["image"]["tmp_name"];
                $path = "./../public/img/DienThoai/".$_FILES['image']['name'];
                move_uploaded_file($filename, $path);
                $fileName .="".$_FILES["image"]["name"];
            } else {
                echo "Lỗi file";
            }
        } else {
            echo "file không đúng định dạng";
        }
    } else {
        $fileName = $row['Anh_SP'];
    }

    $sql = "UPDATE tbl_sanpham SET Ten_SP = '$name', ID_DM = '$cat_id', Gia_SP = '$price', Anh_SP = '$fileName', ManHinh = '$manHinh',
        KichThuoc = '$kichThuoc', TrongLuong = '$trongLuong', MauSac = '$mauSac', AmThanh = '$amThanh',
        BoNho = '$boNho', HeDieuHanh = '$heDieuHanh', Camera = '$camera', Pin = '$pin', KetNoi = '$ketNoi'
        WHERE ID_SP = $id;
    ";

    Mysqli_query($conn,$sql) or die(mysqli_error($conn));
    header('Location: main.php?act=onLeft&name=SanPham');
}

?>


<div class="container dashboard-content">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">  
            <div class="card">
                <h5 class="card-header">Product</h5>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên Sản Phẩm</label>
                            <input type="text" name="name" placeholder="Tên Sản Phẩm..." class="form-control" value="<?php echo $name ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Loại Sản Phẩm</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                <?php
                                    $sqlSelectCat = "SELECT ID_DM, Ten_DM FROM tbl_danhmuc_sanpham";
                                    $resultCat = mysqli_query($conn, $sqlSelectCat);
                                    while($rowCat = mysqli_fetch_array($resultCat)) {
                                        echo '
                                            <option value="'.$rowCat['ID_DM'].'">'.$rowCat['Ten_DM'].'</option>
                                        ';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Giá</label>
                            <input type="text" name="price" id="price" class="form-control" value="<?php echo $price ?>" placeholder="Giá Tiền...">   
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" id="image" placeholder="<?php echo $row['Anh_SP'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Màn Hình</label>
                            <input type="text" name="ManHinh" class="form-control" id="ManHinh" value="<?php echo $manHinh ?>" placeholder="Màn Hình...">
                        </div>
                        <div class="form-group">
                            <label for="">Kích Thước</label>
                            <input type="text" name="KichThuoc" class="form-control" id="KichThuoc" value="<?php echo $kichThuoc ?>" placeholder="Kích Thước...">
                        </div>
                        <div class="form-group">
                            <label for="">Trọng Lượng</label>
                            <input type="text" name="TrongLuong" class="form-control" id="TrongLuong" value="<?php echo $trongLuong ?>" placeholder="Trọng Lượng...">
                        </div>
                        <div class="form-group">
                            <label for="">Âm Thanh</label>
                            <input type="text" name="AmThanh" class="form-control" id="AmThanh" value="<?php echo $amThanh ?>" placeholder="Âm Thanh...">
                        </div>
                        <div class="form-group">
                            <label for="">Màu</label>
                            <input type="text" name="Mau" class="form-control" id="Mau" value="<?php echo $mauSac ?>" placeholder="Màu...">
                        </div>
                        <div class="form-group">
                            <label for="">Bộ Nhớ</label>
                            <input type="text" name="BoNho" class="form-control" id="BoNho" value="<?php echo $boNho ?>" placeholder="Bộ Nhớ...">
                        </div>
                        <div class="form-group">
                            <label for="">Hệ Điều Hành</label>
                            <input type="text" name="HeDieuHanh" class="form-control" id="HeDieuHanh" value="<?php echo $heDieuHanh ?>" placeholder="Hệ Điều Hành...">
                        </div>
                        <div class="form-group">
                            <label for="">Camera</label>
                            <input type="text" name="Camera" class="form-control" id="Camera" value="<?php echo $camera ?>" placeholder="Camera...">
                        </div>
                        <div class="form-group">
                            <label for="">Pin</label>
                            <input type="text" name="Pin" class="form-control" id="Pin" value="<?php echo $pin ?>" placeholder="Pin...">
                        </div>
                        <div class="form-group">
                            <label for="">Kết Nối</label>
                            <input type="text" name="KetNoi" class="form-control" id="KetNoi" value="<?php echo $ketNoi ?>" placeholder="Kết Nối...">
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button style="margin-left: 220px" name="btn-update"  type="submit" class="btn btn-space btn-primary">Cập Nhật</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>