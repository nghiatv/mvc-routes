<!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip-->
<!--<script>-->
<!-- $.widget.bridge('uibutton', $.ui.button);-->
<!--</script>-->
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="--><?php //echo BASE_PATH ; ?><!--/public/vendor/adminlte/plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<!--<script src="--><?php //echo BASE_PATH ; ?><!--/public/vendor/adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>-->
<!-- daterangepicker -->
<!-- Bootstrap WYSIHTML5 -->
<!--<script src="--><?php //echo BASE_PATH; ?><!--/public/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
<!-- Slimscroll -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/dist/js/app.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/select2/select2.min.js"></script>
<!-- CK Editor -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/ckeditor/ckeditor.js"></script>
<!--<script src="--><?php //echo BASE_PATH ; ?><!--/public/vendor/adminlte/dist/js/pages/dashboard.js"></script>-->
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script>
    var roxyFileman = '<?php echo BASE_PATH?>/public/fileman/index.html';
    $(function(){
        CKEDITOR.replace( 'editor1',{filebrowserBrowseUrl:roxyFileman,
            filebrowserImageBrowseUrl:roxyFileman+'?type=image',
            removeDialogTabs: 'link:upload;image:upload'});
    });
</script>
<script type="text/javascript">
    //    $('select').select2();
</script>

</body>
</html>








