<?php 
  $PATH = base_url('application/views/themes/admin_lte');
 ?>
<!-- Jasny Bootstrap -->
<script src="<?= $PATH . '/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js'; ?>"></script>
<!-- FastClick -->
<script src="<?= $PATH . '/assets/plugins/fastclick/fastclick.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="<?= $PATH . '/assets/admin-lte/js/app.min.js'; ?>"></script>
<!-- Sparkline -->
<script src="<?= $PATH . '/assets/plugins/sparkline/jquery.sparkline.min.js'; ?>"></script>
<!-- jvectormap -->
<script src="<?= $PATH . '/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'; ?>"></script>
<script src="<?= $PATH . '/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'; ?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= $PATH . '/assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= $PATH . '/assets/plugins/chartjs/Chart.min.js'; ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $PATH . '/assets/admin-lte/js/demo.js'; ?>"></script>
<!-- iCheck -->
<script src="<?= $PATH . '/assets/plugins/iCheck/icheck.min.js'; ?>"></script>
<!-- switch -->
<script src="<?= $PATH . '/assets/plugins/switch/static/js/bootstrap-switch.min.js'; ?>"></script>
<!-- PACE -->
<script src="<?= $PATH . '/assets/plugins/pace/pace.min.js'; ?>"></script>
<script type="text/javascript">
	$(document).ajaxStart(function() { Pace.restart(); }); 
</script>
</body>
</html>