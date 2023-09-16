<?php
if (isset($_POST['check_btn'])) {
    $ID_HD = $_POST['check_btn'];
    $conn = mysqli_connect("localhost", "root", "", "doan_php");
    $sql = "SELECT * FROM tbl_hoadon WHERE ID_HD = $ID_HD";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if($row['TinhTrang'] == "Đang thanh toán") {
        $sqlXuLy = 'UPDATE tbl_hoadon SET TinhTrang = "Đã hoàn thành" WHERE ID_HD = '.$ID_HD.'';
        mysqli_query($conn, $sqlXuLy);
    }
    header("Location: main.php?act=onLeft&name=DonHang");
}
?>