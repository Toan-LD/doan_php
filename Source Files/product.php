<?php include_once('./widgets/header.php');?>
<div class="product">
    <div class="container-decor container mt-5">
        <h1>
            <span class="title">Sản Phẩm</span>
        </h1>
        <div class="sort-product mb-2 mt-4 w-100" style="display: inline-block;">
            <div class="sort float-sm-right" >
                <span>Sắp Xếp</span>
                <select name="select-product-sort">
                    <option value="">Mặc định</option>
                    <option value="">Theo giá trị tăng dần</option>
                    <option value="">Theo giá trị giảm dần</option>
                </select>
            </div>
        </div>
        <div class="row-product"> 
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'doan_php');
                mysqli_query($conn, "SET NAMES 'utf8'");
                $category_id = 1;

                $total_products_query = mysqli_query($conn,"SELECT Count(*) AS total from tbl_sanpham where ID_DM = $category_id AND HienThi = 0");
                $total_products = mysqli_fetch_assoc($total_products_query)['total'];
                $limit = 8;

                //Tinh so trang
                $total_page = ceil($total_products/$limit);

                //xac dinh page hien tai
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($current_page - 1) * $limit;
                $end = $start + $limit;

                $sql = "SELECT ID_SP, Anh_SP, Ten_SP, Gia_SP from tbl_sanpham WHERE ID_DM = $category_id AND HienThi = 0 ORDER BY ID_SP DESC LIMIT $start, $limit";


                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $price_formatted = mysqli_fetch_array(mysqli_query($conn, 'SELECT FORMAT('.$row[3].', 0) AS formatted_price'))['formatted_price'];
                    echo '
                        <div class="product-block clearfix">
                            <div class="product-list row">
                                <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                                    <div class="product-item wow pulse">
                                        <div class="image image-resize">
                                            <a href="detail-product.php?ID_SP='.$row[0].'" title="'.$row[2].'">
                                                <img id="img-product" src="./public/img/DienThoai/'.$row[1].'" data-original="./public/img/DienThoai/'.$row[1].'" alt="'.$row[2].'" class="img-responsive lazy-img" />
                                            </a>    
                                        </div>
                                        <div class="right-block">
                                            <h2 class="name">
                                                <a href="" title="'.$row[2].'">'.$row[2].'</a>
                                            </h2>
                                            <div class="price">
                                                <span class="price-new">'.$price_formatted.'&nbsp;₫</span>
                                            </div>
                                            <div class="action btn-buy mb-2 mt-2">
                                                <a class="btn-buy-product"  style="border-radius: 8px;" href="detail-product.php?ID_SP='.$row[0].'" title="'.$row[2].'">Mua</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>
        <?php
            echo '<div class="pagination">';
                for ($i = 1; $i <= $total_page; $i++) {
                    echo '<a  style="border-radius: 8px;" href="?page='.$i.'" '.($i == $current_page ? 'class="active"' : '').'>'.$i.'</a>';
                }
            echo '</div>';
        ?>
    </div>
</div>
<?php include_once('./widgets/footer.php'); ?>

