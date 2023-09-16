<?php
session_start();
if(isset($_GET['username'])){
    if($_GET['username'] == "null") {
        $_SESSION['ID_HD'] = 1;

        if(!isset($_SESSION['CTHD'])) {
            echo "Please enter";
            $conn = mysqli_connect("localhost", "root", "", "doan_php");
            $sql = "SELECT Gia_SP FROM tbl_sanpham WHERE ID_SP = ".$_GET['ID_SP']."";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($_GET['soluong'] == '') {
                header('Location: detail-product?ID_SP='.$row['ID_SP'].'');
            } else {
                $arr = array($_GET['ID_SP'], $_GET['soluong']);
                $_SESSION['CTHD'][1] = $arr;
                $_SESSION['TongTien'] = $row['Gia_SP'] * $_GET['soluong'];
            }
        } else {
            echo "hehe";
            if($_GET['soluong'] == '') {
                header('Location: detail-product?ID_SP='.$row['ID_SP'].'');
            } else {
                var_dump($_SESSION['CTHD']);
                $flag = true;
                for($i = 1; $i <= count($_SESSION['CTHD']) ; $i++ ) {
                    if($_SESSION['CTHD'][$i][0] == $_GET['ID_SP']) {
                        echo  $_SESSION['CTHD'][$i][0];
                        $flag = false;
                        $conn = mysqli_connect("localhost", "root", "", "doan_php");
                        $sql = "SELECT Gia_SP FROM tbl_sanpham WHERE ID_SP = ".$_GET['ID_SP']."";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $soluong = $_GET['soluong'] + $_SESSION['CTHD'][$i][1];
                        $Gia_SP = $row['Gia_SP'];
                        $_SESSION['TongTien'] += $row['Gia_SP'] * $_GET['soluong'];
                        $_SESSION['CTHD'][$i][1] = $soluong;
                    }
                } 
                if($flag) {
                    $conn = mysqli_connect("localhost", "root", "", "doan_php");
                    $sql = "SELECT Gia_SP FROM tbl_sanpham WHERE ID_SP = ".$_GET['ID_SP']."";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $i = count($_SESSION['CTHD']) + 1;
                    $arr = array($_GET['ID_SP'], $_GET['soluong']);
                    $_SESSION['CTHD'][$i] = $arr;
                    $_SESSION['TongTien'] += $row['Gia_SP'] * $_GET['soluong'];
                }
                for($i = 1; $i<=count($_SESSION['CTHD']) ; $i++) {
                    echo '<br>';
                    echo $_SESSION['CTHD'][$i][0].'<br>';
                    echo $_SESSION['CTHD'][$i][1].'<br>';
                }
                // header('Location: product.php');
            }
        } 
        // header('Location: product.php');
    } else {
        if(isset($_GET['username'])) {
            echo $_GET['username'];
            echo '<br>';
        }  
        
    }

}


?>