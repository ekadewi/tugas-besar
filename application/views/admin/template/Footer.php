 <footer class="footer text-center"> 2018, Group 8 </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/new/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo base_url() ?>assets/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dashboard1.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/toast-master/js/jquery.toast.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/dt/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Pixel admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
    <script type="text/javascript">
        $(document).ready( function () {
                $('#myTable').DataTable({
                    "bInfo" : false
                });
            } );
    </script>
</body>

</html>