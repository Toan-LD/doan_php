<?php
$conn = mysqli_connect("localhost", "root", "", "doan_php") or die("Lỗi kết nối");
if(isset($_POST["btn-add"])) {
    $name = $_POST["name"];
    $cat_id = $_POST["cat_id"];
    $price = $_POST["price"];
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
    $fileName = "";
    if(isset($_POST["image"])) {
        if($_FILES["image"]["type"]=="image/jpeg" ||$_FILE["image"]["type"]=="image/jpg" ||$_FILES["image"]["type"]=="image/png" ||$_FILES["image"]["type"]=="image/gif") {
            if($_FILES["image"]["error"] == 0) {
                $filename = $_FILES["image"]["tmp_name"];
                $path="./../public/img/DienThoai/".$_FILES['image']['name'];
                move_uploaded_file($filename, $path);
                $fileName .= ".".$_FILES["image"]["name"]; 
            } else {
                echo "Lỗi file";
            }
        } else {
            "File không đúng định dạng";
        }
    }

    $data["image"] = $fileName;
    $sqlInsert = "INSERT INTO tbl_sanpham (Ten_SP, ID_DM, Gia_SP, Anh_SP, ManHinh, KichThuoc, TrongLuong, MauSac, AmThanh, BoNho, HeDieuHanh, Camera, Pin, KetNoi)
    VALUES ('$name', '$cat_id', '$price', '$fileName', '$manHinh', '$kichThuoc', '$trongLuong', '$mauSac', '$amThanh', '$boNho', '$heDieuHanh', '$camera', '$pin', '$ketNoi')";
    mysqli_query($conn, $sqlInsert) or die("Lỗi thêm mới sản phẩm");

}
?>