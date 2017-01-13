<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Frame</b>KAY</a>
  </div>
  <?php
  echo (isset($notif)) ? '<div style="padding:10px;">' . $notif . '</div>' : '' ;
  echo ($this->session->flashdata('notif') != '') ? '<div style="padding:10px;">' . $this->session->flashdata('notif') . '</div>' : '' ;
    ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset your password</p>

    <form action="<?= base_url('user/reset_password'); ?>" method="POST">
      <div class="form-group has-feedback">
        <input type="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ; ?>" autocomplete="off" class="form-control" placeholder="Enter your Email address" REQUIRED>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
    <center><a href="<?= base_url(); ?>">Back to home</a></center>
</div>
<!-- /.login-box -->


