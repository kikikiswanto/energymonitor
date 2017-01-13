<?php 

$this->load->view('themes/admin_lte/head'); //call head resource
$this->load->view('themes/admin_lte/header_collapse'); //call header layout
$this->load->view('themes/admin_lte/breadcrumb'); //call header layout

	echo (isset($notif)) ? '<div style="padding:10px;">' . $notif . '</div>' : '' ;
	echo ($this->session->flashdata('notif') != '') ? '<div style="padding:10px;">' . $this->session->flashdata('notif') . '</div>' : '' ;
$this->load->view('themes/admin_lte/section_left'); //call section left layout
?>
<!-- Main content -->
    <section class="content">

<?php  $this->load->view($page); //call section left layout ?>
	<!-- </section> -->
<?php 
$this->load->view('themes/admin_lte/footer'); //call footer layout
$this->load->view('themes/admin_lte/foot'); //call foot resource
 ?>
