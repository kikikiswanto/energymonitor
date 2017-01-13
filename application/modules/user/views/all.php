  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
        	<form method="POST" action="<?= base_url('user/delete_multiple'); ?>">
        		<div class="box">
		            <div class="box-header">
		              <h3 class="box-title"><?= $this->lang->line('user_all'); ?></h3>
		              <a href="<?= base_url('user/add.asp'); ?>"><button class="btn btn-primary btn-flat" title="<?= $this->lang->line('user_add'); ?>" type="button"><i class="fa fa-user-plus"></i></button></a>
		              <div class="pull-right">
		              	<button class="btn btn-danger btn-flat" type="submit" title="<?= $this->lang->line('user_delete'); ?>" onclick="return confirm('Anda yakin akan menghapus pengguna terpilih ?');"><i class="fa fa-trash-o"></i></button>
			          </div>
		            </div>
		            
		            <!-- /.box-header -->
		            <div class="box-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th><input type="checkbox" id="user-all"></th>
		                  <th>Status</th>
		                  <th><?= $this->lang->line('name'); ?></th>
		                  <th><?= $this->lang->line('email'); ?></th>
		                  <th><?= $this->lang->line('level'); ?></th>
		                </tr>
		                </thead>
		                <tbody>
		                <?php 
		                $no=1;
		                foreach ($users as $row)
						{
						        
		                 ?>
		                <tr>
		                  <td><input type="checkbox" name="user[]" class="user" value="<?= $row->usr_email; ?>"></td>
		                  <td align='center'>
		                  	<div class="btn-group" role="group" aria-label="...">
							  <button type="button" class="btn btn-default"><?= ($row->usr_activated == 0) ? '<a href="'.base_url().'user/activated/1/' . $row->usr_email .'" title="active"><i class="fa fa-fw fa-times-circle-o"></i></a>' : '<a href="'.base_url().'user/activated/0/' . $row->usr_email .'" title="active"><i class="fa fa-fw fa-check-circle-o"></i></a>'; ?></button>

							  <div class="btn-group" role="group">
							    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							      <?= $this->lang->line('action'); ?>
							      <span class="caret"></span>
							    </button>
							    <ul class="dropdown-menu">
							      <li><a href="<?= base_url('user/profile'); ?>/<?= $row->usr_email; ?>" title="<?= $this->lang->line('profile'); ?>"><button type="button" class="btn btn-primary btn-flat btn-block"><i class="fa fa-fw fa-search-plus"></i> Profile</button></a></li>
							      <li><a href="#"><button type="button" class="btn btn-warning btn-flat btn-block"><i class="fa fa-fw fa-pencil-square-o"></i> Edit</button></a></li>
							      <li><a href="#"><button type="button" class="btn btn-danger btn-flat btn-block" data-toggle="modal" data-target="#exampleModal" data-user="<?= $row->usr_email; ?>" data-link="<?= $this->encryption_kay->encode($row->usr_email); ?>"><i class="fa fa-fw fa-trash-o" ></i> Delete</button></a></li>
							    </ul>
							  </div>
							</div>
		                  </td>
		                  <td><?= $row->usr_name; ?></td>
		                  <td><?= $row->usr_email; ?></td>
		                  <td><?= $row->lvl_name; ?></td>
		                  
		                </tr>
		                <?php } ?>
		                </tfoot>
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		    </form>
        	</div>
        	<!-- col -->
        </div>
        <!-- row -->
    </section>
    <!-- section -->

    <div class="modal modal-warning fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="exampleModalLabel">Delete Confirmation for <label id="title-confirm">Title Confirm</label></h4>
	      </div>
	      <div class="modal-body">
	        <center>Apakah anda yakin akan menghapus pengguna dengan email <label id="user-confirm">User Confirm</label></center>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-danger" id="delete-user">Delete</button>
	      </div>
	    </div>
	  </div>
	</div>

<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable();
  });

  $('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var user = button.data('user') // Extract info from data-* attributes
	  var link = button.data('link') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('#title-confirm').text(user)
	  modal.find('#user-confirm').text(user)
	  modal.find('#delete-user').click(function() {
		   document.location.href='<?= base_url(); ?>user/delete/' + link;
		});
	});
  	$("#user-all").change(function(){
      $(".user").prop('checked', $(this).prop("checked"));
    });
</script>