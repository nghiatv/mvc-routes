<!-- jQuery 2.2.3 -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>-->
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!--datatable-->
<script src="<?php echo BASE_PATH; ?>/public/vendor/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>

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

    $(function () {
        $('#data-search').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
    });

</script>



</body>
</html>








