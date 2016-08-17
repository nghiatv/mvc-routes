<?php include '_admin_template/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Automatic element centering -->

<?php include '_admin_template/menu.php'?>
<?php include '_admin_template/sidebar.php'?>

<div class="wrapper">
    <div class="content-wrapper">

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

        <section class="content">
            <div class="lockscreen-wrapper" style="margin-top: 0">
                <div class="lockscreen-logo">
                    <a href="../../index2.html"><b>Nghĩa's</b>Blog</a>
                </div>
                <!-- User name -->
                <div class="lockscreen-name">Tìm kiếm</div>

                <!-- START LOCK SCREEN ITEM -->
                <div class="lockscreen-item">
                    <!--         lockscreen image-->
                    <div class="lockscreen-image" style="top: -18px;">
                        <img src="<?php echo BASE_PATH ; ?>/public/vendor/AdminLTE/dist/img/user1-128x128.jpg" alt="User Image">
                    </div>
                    <!--         /.lockscreen-image -->

                    <!-- lockscreen credentials (contains the form) -->
                    <form class="lockscreen-credentials" action="<?php echo BASE_PATH ; ?>/admin/search">
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" placeholder="Keyword" name="s">

                            <div class="input-group-btn">
                                <button type="submit" class="btn"><i class="fa fa-search text-muted"></i></button>
                            </div>
                        </div>
                    </form>
                    <!-- /.lockscreen credentials -->

                </div>




            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Data Table With Full Features</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data-search" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Tít tờ le</th>
                                        <th>Ca te go ri </th>
                                        <th>Au tho</th>
                                        <th>x</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($data as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id'] ; ?></td>
                                            <td><a href="<?php echo BASE_PATH ; ?>/admin/post/edit/<?php echo $row['id'] ; ?>"><?php echo $row['title'] ; ?></a>
                                            </td>
                                            <td><span class="label label-success"><?php echo $row['category_name']; ?></span></td>

                                            <td> <?php echo $row['author'] ; ?></td>
                                            <td>X</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Tít tờ le</th>
                                        <th>Ca te go ri </th>
                                        <th>Au tho</th>
                                        <th>x</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</body>



<!-- /.center -->

<?php include '_admin_template/footer.php'?>
