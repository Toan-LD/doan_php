<?php
session_start();
if(isset($_GET['xoahoadon'])) {
  $conn = mysqli_connect("localhost", "root", "", "doan_php");
  mysqli_query($conn, "SET NAMES 'utf8'");
  $sqlHD = "DELETE FROM tbl_cthd WHERE ID_HD = ".$_GET['ID_HD']."";
  $conn->query($sqlHD);
} else if (isset($_GET['thanhtoan'])) {
  $conn = mysqli_connect("localhost", "root", "", "doan_php");
  mysqli_query($conn, "SET NAMES 'utf8'");
  $sqlHD = "UPDATE tbl_hoadon SET TinhTrang = 'Đang thanh toán' WHERE ID_HD = ".$_GET['ID_HD']."";
  $conn->query($sqlHD);
  header('location: bill.php');
} else
//Sự nhầm lẫn của mình ở đây username là tên tài khoản còn ở bên phần login thì username là tên người dùng
if(isset($_GET['ID_SP']) && isset($_GET['username']) && isset($_GET['soluong'])) {
  if(isset($_GET['xoasanpham'])) {
    var_dump($_GET['ID_SP']);
    $conn = mysqli_connect("localhost", "root", "", "doan_php");
    mysqli_query($conn, "SET NAMES 'utf8'");
    $sqlCTHD = "DELETE FROM tbl_cthd WHERE ID_HD = ".$_GET['ID_HD']." AND ID_SP = ".$_GET['ID_SP']."";
    $conn->query($sqlCTHD);
    $tongtien = $_GET['tongtien'] - ($_GET['soluong'] * $_GET['giaban']);
    $sqlHD = "UPDATE tbl_hoadon SET TongGia = ".$tongtien." WHERE ID_HD = ".$_GET['ID_HD']."";
    $conn->query($sqlHD);
    header("location: detail-bill.php?ID_HD=".$_GET['ID_HD']."");
  } else {
    $ID_SP = $_GET['ID_SP'];
    $soluong = $_GET['soluong'];
    $tentaikhoan = $_GET['username'];
    
    if($_GET['soluong'] != '') {
      $conn = mysqli_connect("localhost", "root", "", "doan_php");
      mysqli_query($conn, "SET NAMES 'utf8'");
      $sqlSP = "SELECT ID_SP, ID_DM, Gia_SP FROM tbl_sanpham WHERE ID_SP = $ID_SP";
      $resultSP = mysqli_query($conn, $sqlSP);
      $rowSP = mysqli_fetch_array($resultSP);
      $Gia_SP = $rowSP['Gia_SP'];
      
      $sqlHD = "SELECT ID_HD, taikhoan, TongGia, TinhTrang from tbl_hoadon "; 
      $resultHD = mysqli_query($conn, $sqlHD);
      
      $ID_HD = 1;
      while($rowHD = mysqli_fetch_array($resultHD))
      $ID_HD++;
      echo $ID_HD;
      
      $flag = true ;
      $tongTien = 0;
      $TinhTrang = 'Đang xử lý';
      $resultHD = mysqli_query($conn, $sqlHD);
      while ($rowHD = mysqli_fetch_array($resultHD)) {
        if($rowHD['TinhTrang'] == 'Đang xử lý' && $rowHD['taikhoan'] == $tentaikhoan){
          $ID_HD = $rowHD['ID_HD'];
          $tongTien = $rowHD['TongGia'];
        $TinhTrang = $rowHD['TinhTrang'];
        $flag = false ;
        break;
      }
    }
    
    $date = getdate();
    $StringDate = $date['year'].'/'.$date['mon'].'/'.$date['mday'];
    
    $tongTien = $tongTien + ($Gia_SP * $soluong);
    
    if(!$flag){
      $sqlHD = "UPDATE tbl_hoadon SET ID_HD = $ID_HD, taikhoan = '$tentaikhoan', TongGia = $tongTien, TinhTrang = '$TinhTrang',
                NgayLap = '$StringDate' WHERE ID_HD = $ID_HD" ;
    } else {
      $sqlHD = "INSERT INTO tbl_hoadon (ID_HD ,NgayLap,	TongGia, taikhoan, TinhTrang) VALUES ($ID_HD,'$StringDate', $tongTien , '$tentaikhoan', '$TinhTrang')";
    }
    
    $conn->query($sqlHD);
    
    $sqlCTHD = "DELETE FROM tbl_cthd WHERE ID_HD = $ID_HD AND ID_SP = $ID_SP";
    $sqlSP = "SELECT SoLuongMua FROM tbl_cthd WHERE ID_HD = $ID_HD AND ID_SP = $ID_SP";
    $resultSP = mysqli_query($conn, $sqlSP);
    $rowSP = mysqli_fetch_array($resultSP);
    if(mysqli_num_rows($resultSP) == 0) {
      $sqlCTHD = "INSERT INTO tbl_cthd (ID_SP, ID_HD, SoLuongMua, DonGia) VALUES ($ID_SP, $ID_HD ,$soluong , $Gia_SP)";
      $conn->query($sqlCTHD);
    } else {
      $soluong = $_GET['soluong'] + $rowSP['SoLuongMua'];
      $sqlCTHD = "UPDATE tbl_cthd SET SoLuongMua = $soluong WHERE ID_SP = $ID_SP AND ID_HD = $ID_HD";
      $conn->query($sqlCTHD);
    }
    header("location: detail-product.php?ID_SP=$ID_SP&ID_DM=$ID_DM");

  } else{
      header("location: detail-product.php?ID_SP=$ID_SP&ID_DM=$ID_DM");
    }
  }
}
?>