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
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?= base_url('user/auth'); ?>?url=<?= $this->input->get('url') ?>" method="POST">
      <div class="form-group has-feedback">
        <input type="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ; ?>" autocomplete="off" class="form-control" placeholder="Email" REQUIRED>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" REQUIRED>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="make-switch" title="Remember Me">
              <input type="checkbox" name="remember"  /> 
          </div>

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>---------------------- OR ------------------------</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="<?= base_url('user/forgot_password'); ?>">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

