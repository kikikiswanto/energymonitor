  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<!-- Main content -->
    <section class="content">
    	<div class="row">
        	<div class="col-xs-12">
        		<div class="box">
		            <div class="box-header">
		              <h3 class="box-title">Semual Level</h3>
		              
		              <div class="pull-right">
			            <a href="<?= base_url('user/add.asp'); ?>"><button class="btn btn-primary btn-flat" title="<?= $this->lang->line('user_add'); ?>"><i class="fa fa-user-plus"></i></button></a>
			          </div>
		            </div>
		            
		            <!-- /.box-header -->
		            <div class="box-body">
		              <table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>Level Code</th>
		                  <th>Level Name</th>
		                  <th>Total</th>
		                  <th><?= $this->lang->line('action'); ?></th>
		                </tr>
		                </thead>
		                <tbody>
		                <?php 
		                $no=1;
		                foreach ($levels as $row)
						{
						        
		                 ?>
		                <tr>
		                  <td><?= $row->lvl_code; ?></td>
		                  <td><?= $row->lvl_name; ?></td>
		                  <td><?= $this->level_m->get_level_count($row->lvl_code); ?></td>
		                  <td align='center'>
		                  	<a href="#" title="<?= $this->lang->line('profile'); ?>"><button class='btn btn-primary btn-flat'><i class="fa fa-fw fa-list"></i></button></a>
		                  	<a href="<?= base_url('level/permissions'); ?>/<?= $row->lvl_code; ?>"><button class='btn btn-warning btn-flat'><i class="fa fa-fw fa-cogs"></i></button></a>
		                  	<button class='btn btn-danger btn-flat' data-toggle="modal" data-target="#exampleModal" data-user="" data-link=""><i class="fa fa-fw fa-trash-o"></i></button>
		                  </td>
		                </tr>
		                <?php } ?>
		                </tfoot>
		              </table>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
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
</script>