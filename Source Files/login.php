<?php include_once('./widgets/header.php') ?>

<div class="container login-form" style="border-radius: 3px">
    <div id="login-container" class="card" style="margin-top: 30px"> 
        <h5>Đăng Nhập</h5>
        <div class="card-body">
            <form action="xulydangnhap.php" method="POST">
                <div class="form-group row ml-5 mb-4">
                    <label class="mt-1" style="margin-right: 30px" for="">Username</label>
                    <div class="col-sm-9">
                        <input required name="username" type="text" class="form-control" placeholder="Username..." value="<?php echo isset($_SESSION['tentaikhoan']) ? $_SESSION['tentaikhoan'] : "" ?>">
                    </div>
                </div>
                <div class="form-group row ml-5">
                    <label class="mt-1" style="margin-right: 33px"  for="">Mật Khẩu</label>
                    <div class="col-sm-9">
                        <input required name="password" type="password" class="form-control" placeholder="Mật Khẩu...">
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
                <div class="form-group row mr-4">
                    <div class="col-sm-12">
                        <a href="register.php" class="btn btn-link float-right">Đăng Ký tại đây!</a>
                    </div>
                </div>
                <div class="form-group row mr-5">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-dark float-right" name="button" value="Đăng Nhập">Đăng Nhập</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


