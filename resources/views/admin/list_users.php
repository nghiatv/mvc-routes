<?php include '_admin_template/header.php' ?>
<?php //echo "<pre>"; var_dump($newestPosts); echo "</pre>"; exit; ?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!--//cho nay de header nhe-->
    <?php include '_admin_template/menu.php'?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include '_admin_template/sidebar.php'?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-sm-12 ">


                    <?php if(isset($_SESSION['mes']['delete'])) : ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                           <?php echo $_SESSION['mes']['delete'] ; ?>
                        </div>
                    <?php endif; ?>


                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Danh sách người dùng</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right"
                                           placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Người dùng</th>
                                    <th>Email</th>
                                    <th>Ngày tham gia</th>
                                    <th>Cập nhật</th>
                                    <th>Xóa</th>
                                </tr>
<!--                               --><?php //var_dump($data) ?>
                                <?php foreach ($data as $row) : ?>
<!--                                    --><?php //echo "<pre>";var_dump($row);echo "</pre>"; exit; ?>
                                    <tr>
                                        <td><?php echo $row['id'] ; ?></td>
                                        <td><a href="<?php echo BASE_PATH ; ?>/admin/user/edit/<?php echo $row['id'] ; ?>"><?php echo $row['user_name'] ; ?></a></td>
                                        <td><?php echo $row['user_email'] ; ?></td>
                                        <td><?php echo $row['created_time'] ; ?></td>
                                        <td><a href="<?php echo BASE_PATH ; ?>/admin/user/edit/<?php echo $row['id'] ; ?>"><button class="btn btn-primary">Sửa</button></a> </td>
                                        <td><a href="<?php echo BASE_PATH ; ?>/admin/user/delete/<?php echo $row['id'] ; ?>"><button class="btn btn-danger">Xóa</button></a> </td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<?php unset($_SESSION['mes']); ?>
<?php include '_admin_template/footer.php' ?>





