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
                Dashboard
                <small>Control panel</small>
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

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Responsive Hover Table</h3>

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
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                </tr>
                                <?php foreach ($data as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_PATH; ?>/admin/post/edit/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                                        </td>
                                        <td><?php echo $row['created_time']; ?></td>
                                        <td>
                                            <a href="<?php echo BASE_PATH; ?>admin/category/edit/<?php echo $row['category_ID']; ?>">
                                                <span class="label label-success"><?php echo $row['category_name']; ?></span></a>
                                        </td>
                                        <td><?php echo $row['user_name']; ?></td>
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
<?php include '_admin_template/footer.php' ?>





