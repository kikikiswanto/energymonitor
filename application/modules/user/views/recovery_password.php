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
    <p class="login-box-msg">Hi, <b><?= $user->usr_name; ?></b> change your password</p>

    <form action="<?= base_url('user/update_password'); ?>" method="POST" id="block-validate">
      <input type="hidden" name="usr_email" value="<?= $user->usr_email; ?>">
      <div class="form-group has-feedback">
        <input type="password" name="usr_password" class="form-control" id="usr_password" placeholder="Enter your New Password" REQUIRED>
        <span class="fa fa-unlock-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="usr_password_confirm" class="form-control" id="usr_password_confirm" placeholder="Re-type your New Password" REQUIRED>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Save Password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
    <center><a href="<?= base_url(); ?>">Back to home</a></center>
</div>
<!-- /.login-box -->
<!-- validation -->
  <script src="<?= base_url(); ?>assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
      ﻿function formValidation() {
        "use strict";
        /*----------- BEGIN validationEngine CODE -------------------------*/

        $('#block-validate').validate({
            rules: {
                usr_password: {
                    required: true,
                    minlength: 4
                },
                usr_password_confirm: {
                    required: true,
                    minlength: 4,
                    equalTo: "#usr_password"
                }
            },
            errorClass: 'help-block',
            errorElement: 'span',
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
            }
        });
        /*----------- END validate CODE -------------------------*/
    }

    $(function () { formValidation(); });
    </script>

