<?php include '_admin_template/header.php' ?>
<?php //echo "<pre>"; var_dump($newestPosts); echo "</pre>"; exit; ?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!--//cho nay de header nhe-->
    <?php include '_admin_template/menu.php' ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include '_admin_template/sidebar.php' ?>

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

            <div class="box box-info">
                <div class="box-body">
                    <form method="post" action="">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-sm-12">
                                <div class="toolbar">
                                    <?php if (isset($_SESSION['error'])) : ?>

                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>
                                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                            <ul>
                                                <?php foreach ($_SESSION['error'] as $row): ?>
                                                    <li> <?php echo $row; ?></li>
                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>


                                    <?php if (isset($_SESSION['mes'])) : ?>

                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                ×
                                            </button>
                                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                            <ul>
                                                <?php foreach ($_SESSION['mes'] as $row): ?>
                                                    <li> <?php echo $row; ?></li>
                                                <?php endforeach; ?>

                                            </ul>
                                        </div>

                                    <?php endif; ?>


                                    <a href="<?php echo BASE_PATH; ?>/admin/posts">
                                        <button type="button" class="btn btn-default">
                                            <i class="fa fa-angle-left"></i> Back
                                        </button>
                                    </a>
                                    <a href="#" class="pull-right">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check"></i> Chỉnh sửa hàng
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <div class="form-group">
                                    <label for="title">Tiêu đề <span class="required">*</span></label>
                                    <input type="text" class="form-control" required name="title" id="title"
                                           value="<?php echo $oldData['title']; ?>"
                                           autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="full_text">Nội dung*</label>
                                    <textarea id="editor1" class="form-control" required
                                              name="content"><?php echo $oldData['content']; ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                    <label for="published">Trạng thái*</label>
                                    <select id="published" class="form-control" required name="status">
                                        <option value="1" <?php if ($oldData['status'] == 1) echo "selected" ?> >
                                            Bản nháp
                                        </option>
                                        <option value="2" <?php if ($oldData['status'] == 2) echo "selected" ?> >
                                            Hay là thật luôn đi
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category">Danh mục*</label>
<?php //echo "<pre>";var_dump($listCategories);echo "</pre>"; exit; ?>
                                    <div id="category">
                                        <select class=" form-control" name="category" required>
                                            <option selected value="">Chọn một chủ đề</option>
                                            <?php foreach ($listCategories as $row) : ?>

                                                <option
                                                    value="<?php echo $row['id']; ?>" <?php if ($oldData['cate_id'] == $row['id']) echo "selected" ?> ><?php echo $row['category_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ./row -->
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
<?php unset($_SESSION['error'], $_SESSION['mes']) ?>
<?php include '_admin_template/footer.php' ?>
<script>
    var roxyFileman = '<?php echo BASE_PATH?>/public/fileman/index.html';
    $(function () {
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: roxyFileman,
            filebrowserImageBrowseUrl: roxyFileman + '?type=image',
            removeDialogTabs: 'link:upload;image:upload'
        });
    });
</script>