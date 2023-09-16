<?php

$conn = mysqli_connect('localhost', 'root', '', 'doan_php') or die("Lỗi kết nối");
if(isset($_POST['btn_an'])){
    $id = $_POST['ID_SP'];
    echo $id;
    $sql = "UPDATE tbl_sanpham SET HienThi = 1 WHERE ID_SP = $id";
    echo $sql;
    $result = mysqli_query($conn, $sql);

    // $sql1 = "SELECT ID_SP FROM tbl_sanpham WHERE ID_SP = $id";
    // $result1 = mysqli_query($conn, $sql1);
    // if(mysqli_num_rows($result1) > 0) {
    //     echo 1;
    // } else echo 0;
    // while ($row = mysqli_fetch_array($result1)){
    //     $sql2 = "UPDATE tbl_sanpham SET HienThi='1' WHERE ID_SP='".$row['ID_SP']."'";
    //     $result2 = mysqli_query($conn, $sql2);
    // }
    header('location: main.php?act=onLeft&name=SanPham');
}

if(isset($_POST['btn_hien'])){
    $id = $_POST['ID_SP'];
    $sql = "UPDATE tbl_sanpham SET HienThi = 0 WHERE ID_SP = $id";
    $result = mysqli_query($conn, $sql);
    header('location: main.php?act=onLeft&name=SanPham');
}


if(isset($_POST['btnSearch_HD'])) {
    $search = $_POST['search'];
    header("location: main.php?act=onLeft&name=DonHang&search=$search");
}
?>