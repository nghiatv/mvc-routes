<?php include '_admin_template/header.php' ?>

    <body class="hold-transition skin-blue sidebar-mini">
<?php include '_admin_template/menu.php' ?>
<?php include '_admin_template/sidebar.php' ?>

    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo BASE_PATH; ?>">Chỉnh sửa thông tin của <b><?php echo $data['user_name']; ?></b></a>
        </div>

        <div class="register-box-body">

            <form action="<?php echo BASE_PATH ?>/admin/user/update/<?php echo $data['id']; ?>" method="post">

                <?php if (isset($_SESSION['error'])) : ?>

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <ul>

                            <?php foreach ($_SESSION['error'] as $row) : ?>
                                <li> <?php echo $row; ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>

                <?php endif; ?>


                <?php if (isset($_SESSION['mes'])) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <ul>

                            <?php foreach ($_SESSION['mes'] as $row) : ?>
                                <li> <?php echo $row; ?></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                <?php endif; ?>

                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username"
                           value="<?php echo $data['user_name']; ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email"
                           name="email" value="<?php echo $data['user_email']; ?>"
                    >
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password"
                           name="password" value="<?php echo $data['user_pass']; ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password" name="repassword"
                           value="<?php echo $data['user_pass']; ?>">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Cập nhật thông tin</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->


<?php unset($_SESSION['error']); ?>
<?php unset($_SESSION['mes']); ?>
<?php include '_admin_template/footer.php' ?>