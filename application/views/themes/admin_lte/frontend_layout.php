<?php 

$this->load->view('themes/admin_lte/head'); //call head resource
$this->load->view('themes/admin_lte/header_top'); //call header layout


	echo (isset($notif)) ? '<div style="padding:10px;">' . $notif . '</div>' : '' ;
	echo ($this->session->flashdata('notif') != '') ? '<div style="padding:10px;">' . $this->session->flashdata('notif') . '</div>' : '' ;

?>
<div class="container">
<!-- Content Header (Page header) -->

<?php $this->load->view('themes/admin_lte/breadcrumb'); //call header layout ?>
<!-- Main content -->
<section class="content">
<?php  $this->load->view($page); //call section left layout ?>
</section>
</div>
	<!-- </section> -->
<?php 
$this->load->view('themes/admin_lte/footer_space'); //call footer layout
$this->load->view('themes/admin_lte/foot'); //call foot resource
 ?>
