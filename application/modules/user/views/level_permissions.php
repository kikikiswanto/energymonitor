  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Main content -->
    <section class="content">
      <form method="POST" action="<?= base_url('level/permissions_update'); ?>">
      <div class="row">
          <div class="col-lg-12">
          <?= $level->lvl_name; ?>
          <input type="hidden" name="lvl_id" value="<?= $level->lvl_id; ?>">
          <div class="pull-right"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> <?= $this->lang->line('save'); ?></button></div></div>
      </div>
      <br>
    	<?php foreach ($plugins as $row) { ?>
      
    	<div class="col-xs-4">
    	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $row->plg_name; ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach ($this->level_m->get_plugin_uri($row->plg_id) as $uri) {
                
               ?>
               <div class="row">
               <div class="col-xs-12">

              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary <?= ($this->level_m->get_plugin_permission($uri->uri_link, $level->lvl_id) == 1) ? "active" : "" ; ?>">
                  <input type="radio" name="<?= $uri->uri_id; ?>" value="allow" <?= ($this->level_m->get_plugin_permission($uri->uri_link, $level->lvl_id) == 1) ? "CHECKED" : "" ; ?>> Allow
                </label>
                <label class="btn btn-primary <?= ($this->level_m->get_plugin_permission($uri->uri_link, $level->lvl_id) == 1) ? "" : "active" ; ?>">
                  <input type="radio" name="<?= $uri->uri_id; ?>" value="deny" <?= ($this->level_m->get_plugin_permission($uri->uri_link, $level->lvl_id) == 1) ? "" : "CHECKED" ; ?>> Deny
                </label>
              </div>

              <?= $uri->uri_name; ?> 

              </div>
              </div>
              <br/>
              <?php } ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>

        <?php } ?>
        </form>
    </section>
    <!-- section -->