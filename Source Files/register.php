<?php include_once('./widgets/header.php') ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container" style="margin-top: 26px">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Đăng Ký</div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="xulydangky.php">
                                    <div class="form-group">
                                        <label for="name" class="cols-sm-2 control-label">Tên Người Dùng</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Tên..." value="<?php echo isset($_SESSION['error']) ? $_SESSION['name'] : ''  ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input required type="text" class="form-control" name="email" id="email" placeholder="Email..." value="<?php echo isset($_SESSION['error']) ? $_SESSION['email'] : ''  ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="cols-sm-2 control-label">Username</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Tên Tài Khoản" value="<?php echo isset($_SESSION['error']) ? $_SESSION['username'] : ''  ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Mật Khẩu</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Mật Khẩu..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm" class="cols-sm-2 control-label">Nhập Lại Mật Khẩu</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Nhập Lại Mật Khẩu..." />
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
                                        <?php unset($_SESSION['error']); ?>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                                        <?php unset($_SESSION['success']); ?>
                                    <?php endif; ?>
                                    <div class="form-group ">
                                        <button type="submit" name="button" class="btn btn-primary btn-lg btn-block login-button">Đăng Ký</button>
                                    </div>
                                    <div class="login-register">
                                        <a href="login.php">Đăng Nhập</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>

<?php include_once('./widgets/footer.php') ?> 