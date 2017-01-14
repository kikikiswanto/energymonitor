<?php 
  $PATH = base_url('application/views/themes/admin_lte');
 ?>
<!-- Jasny Bootstrap -->
<script src="<?= $PATH . '/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js'; ?>"></script>
<!-- FastClick -->
<script src="<?= $PATH . '/assets/plugins/fastclick/fastclick.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="<?= $PATH . '/assets/admin-lte/js/app.min.js'; ?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= $PATH . '/assets/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $PATH . '/assets/admin-lte/js/demo.js'; ?>"></script>
<!-- PACE -->
<script src="<?= $PATH . '/assets/plugins/pace/pace.min.js'; ?>"></script>
<script type="text/javascript">
	$(document).ajaxStart(function() { Pace.restart(); }); 
</script>
</body>
</html>