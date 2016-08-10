

<!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip-->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="--><?php //echo BASE_PATH ; ?><!--/public/vendor/adminlte/plugins/morris/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/dist/js/app.min.js"></script>
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo BASE_PATH ; ?>/public/vendor/adminlte/dist/js/pages/dashboard.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>
</html>








