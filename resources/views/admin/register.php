<?php include '_admin_template/header.php' ?>

    <body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo BASE_PATH; ?>"><b>Nghia's</b> Blog</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Đăng kí làm thành viên ( thực ra là đăng kí làm admin luôn đấy)</p>

            <form action="<?php echo BASE_PATH; ?>/admin/register/check" method="post">

                <?php if(isset($_SESSION['error'])) :?>

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <ul>

                            <?php foreach($_SESSION['error'] as $row) : ?>
                                <li> <?php echo $row ; ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                <?php endif; ?>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username"
                           value="<?php echo isset($_SESSION['input']['old_username']) ? $_SESSION['input']['old_username'] : null; ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email"
                           name="email" value="<?php echo isset($_SESSION['input']['old_email']) ? $_SESSION['input']['old_email'] : null; ?>"
                    >
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password"
                           name="password" value="<?php echo isset($_SESSION['input']['old_password']) ? $_SESSION['input']['old_password'] : null; ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password" name="repassword"
                           value="<?php echo isset($_SESSION['input']['old_repassword']) ? $_SESSION['input']['old_repassword'] : null; ?>">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="agree" required > Đồng ý <a href="<?php echo BASE_PATH; ?>/about">điều
                                    khoản </a>thì tích
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="<?php echo BASE_PATH; ?>/admin/login" class="text-center">Em có tài khoản rồi anh ạ</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->


<?php unset($_SESSION['error']); ?>
<?php unset($_SESSION['mes']); ?>
<?php unset($_SESSION['input']); ?>
<?php include '_admin_template/footer.php' ?>