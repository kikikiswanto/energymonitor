
<!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
        		<!-- Horizontal Form -->
		          <div class="box box-info">
		            <div class="box-header with-border">
		              <h3 class="box-title"><?= $this->lang->line('form_new_user'); ?></h3>

		              <div class="pull-right">
			            <a href="<?= base_url('user.asp'); ?>"><button class="btn btn-primary btn-flat" title="<?= $this->lang->line('user_all'); ?>"><i class="fa fa-table"></i></button></a>
			          </div>
		            </div>
		            <!-- /.box-header -->
		            <!-- form start -->
		            <form class="form-horizontal" method="POST" id="block-validate" action="<?= base_url('user/save'); ?>">
		              <div class="box-body">
		                <div class="form-group">
		                  <label class="col-sm-5 control-label"><?= $this->lang->line('name'); ?></label>

		                  <div class="col-sm-4">
		                    <input type="text" id="usr_name" class="form-control" name="usr_name" value="<?= (isset($_POST['usr_name'])) ? $_POST['usr_name'] : '' ; ?>" placeholder="<?= $this->lang->line('name'); ?>">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label class="col-sm-5 control-label"><?= $this->lang->line('email'); ?></label>

		                  <div class="col-sm-4">
		                    <input type="email" class="form-control" id="usr_email" name="usr_email" value="<?= (isset($_POST['usr_email'])) ? $_POST['usr_email'] : '' ; ?>" placeholder="<?= $this->lang->line('email'); ?>">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label class="col-sm-5 control-label"><?= $this->lang->line('password'); ?></label>

		                  <div class="col-sm-5">
		                    <input type="password" id="usr_password" class="form-control" name="usr_password" placeholder="<?= $this->lang->line('password'); ?>">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label class="col-sm-5 control-label"><?= $this->lang->line('password_confirm'); ?></label>

		                  <div class="col-sm-5">
		                    <input type="password" id="usr_password_confirm" name="usr_password_confirm" class="form-control" placeholder="<?= $this->lang->line('password_confirm'); ?>">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label class="col-sm-5 control-label"><?= $this->lang->line('level'); ?></label>

		                  <div class="col-sm-4">
		                    <select class="form-control" name="usr_level" placeholder="select level">
		                    <?php 
		                    foreach ($levels as $row) {
		                     ?>
		                    	<option value="<?= $row->lvl_id; ?>"><?= $row->lvl_name; ?></option>
		                    <?php } ?>
		                    </select>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="col-sm-offset-5 col-sm-10">
		                    <div class="checkbox">
		                      <label>
		                        <input type="checkbox" id="agree" name="agree"> <?= $this->lang->line('i_agree'); ?> <a href="#"><?= $this->lang->line('terms_agreement'); ?></a>
		                      </label>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              <!-- /.box-body -->
		              <div class="box-footer">
		                <a href="<?= base_url(); ?>"><button type="button" class="btn btn-danger"><i class="fa fa-undo"></i> <?= $this->lang->line('cancel'); ?></button></a>
		                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> <?= $this->lang->line('save'); ?></button>
		              </div>
		              <!-- /.box-footer -->
		            </form>
		          </div>
		          <!-- /.box -->
        	</div>
    	</div>
    </section>
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
		            },
		            usr_name: {
		                required: true,
		                minlength: 2
		            },
		            usr_email: {
		                required: true,
		                email: true
		            },
		            agree: "required"
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