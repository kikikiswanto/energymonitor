<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->lang->load('user', 'indonesia');
        $this->load->model('level_m');
        $this->load->model('user_m');
        $this->load->library('framekay_lib');

    }

	public function index()
	{
		$this->framekay_lib->filter();
		$data['page'] 	= 'user/all';
		$data['users'] 	= $this->user_m->get_user_all();
		$this->load->view('themes/admin_lte/application_layout', $data);
	}

	public function profile($id)
	{
		$this->framekay_lib->filter();
		$data['page'] 	= 'user/profile';
		$data['user'] 	= $this->user_m->get_user_by_email($id);
		$this->load->view('themes/admin_lte/application_layout', $data);
	}

	public function add()
	{
		$this->framekay_lib->filter();
		$data['levels']		 	= $this->level_m->get_level_available();
		$data['page'] 			= 'user/add';
		$this->load->view('themes/admin_lte/application_layout', $data);
	}

	public function save()
	{
		$this->framekay_lib->filter();
		$new_user 	= $this->input->post('usr_name');
		if ($this->user_m->insert_user()) {
			$this->session->mark_as_flash('notif');
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Pengguna <b>' . $new_user . '</b> berhasil ditambahkan.
                            </div>');
			redirect('/user/');
		} else {
			$data['notif'] = '<div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                                . $this->lang->line('duplicate_user') .
                            '</div>';
			$data['page'] 	= 'user/add';
			$data['levels']		 	= $this->level_m->get_level_available();
			$data['users'] 	= $this->user_m->get_user_all();
			$this->load->view('themes/admin_lte/application_layout', $data);
		}
		
	}

	public function delete($id)
	{
		
		$this->framekay_lib->filter();
		$usr_email = $this->encryption_kay->decode($id);
		if ($this->user_m->delete_user($usr_email)) {
			$this->session->mark_as_flash('notif');
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Pengguna <b>' . $usr_email . '</b> berhasil dihapus.
                            </div>');
			redirect('/user/');
		} else {
			$data['notif'] = '<div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                                . 'tidak ada yang bisa dihapus' .
                            '</div>';
			redirect('/user/');
		}
	}

	public function delete_multiple()
	{
		var_dump($this->input->post('user'));
		$usr_email = $this->input->post('user');
		$jumlah = count($usr_email);

		$this->framekay_lib->filter();
		if ($this->user_m->delete_user_multiple($usr_email)) {
			$this->session->mark_as_flash('notif');
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <b>' . $jumlah . '</b> Pengguna berhasil dihapus.
                            </div>');
			redirect('/user/');
		} else {
			$data['notif'] = '<div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                                . 'tidak ada yang bisa dihapus' .
                            '</div>';
             redirect('/user/');
		}
	}

	public function activated($value, $id)
	{
		$this->framekay_lib->filter();
		if ($this->user_m->update_activated($value, $id)) {
			$this->session->mark_as_flash('notif');
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Pengguna <b>' . $id . '</b> re-aktivasi.
                            </div>');
			redirect('/user/');
		} else {
			$this->session->set_flashdata('notif', '<div class="callout callout-danger">
								<h4><i class="icon fa fa-bug"></i> Kesalahan sistem</h4>
                                Sepertinya ada masalah di sistem kami, laporkan kesalahan <a href="#">disini</a>
                            </div>');
			redirect('/user/');
		}
		
	}

	public function forgot_password()
	{

		$data['page'] 	= 'user/forgot_password';
		$this->load->view('themes/admin_lte/blank_layout', $data);
	}

	public function login()
	{

		$data['page'] 	= 'user/login';
		$this->load->view('themes/admin_lte/blank_layout', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function auth()
	{
		if ($this->input->get('url') != NULL) {
			$url = $this->input->get('url');
		} else {
			$url = base_url();
		}
		
		
		$get_user = $this->user_m->get_user_login();
		if ($get_user != NULL) {
			echo "please wait...";
			$this->session->mark_as_flash('notif');
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Anda berhasil login sebagai <b>' . $get_user->usr_name . '</b>.
                            </div>');
			$this->session->set_userdata('usr_id', $get_user->usr_id);
			echo '<meta http-equiv="refresh" content="0;URL=' . $url . '" />';
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Email dan password yang anda masukkan tidak cocok.
                            </div>');
			$data['page'] 	= 'user/login';
			$this->load->view('themes/admin_lte/blank_layout', $data);
		}
	}

	public function reset_password()
	{
		$usr_email = $this->input->post('email');
		$key = str_shuffle('abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
		
		$get_user = $this->user_m->get_user_by_email($usr_email);
		if ($get_user != NULL) {
			echo "please wait...";
			
			$data['key'] = $key;
			$data['email'] = $get_user->usr_email;
			$data['name'] = $get_user->usr_name;

			if(!$this->user_m->update_validation($key, $usr_email)){
				$this->session->set_flashdata('notif', '<div class="callout callout-danger">
								<h4><i class="icon fa fa-bug"></i> Kesalahan sistem</h4>
                                Sepertinya ada masalah di sistem kami, laporkan kesalahan <a href="#">disini</a>
                            </div>');
			} elseif(!$this->sendmail_reset_password($data)){
				$this->session->set_flashdata('notif', '<div class="callout callout-danger">
								<h4><i class="icon fa fa-bug"></i> Gagal Mengirim email</h4>
                                Hi, <b>' . $get_user->usr_name . '</b><br/>Mohon maaf atas ketidak nyamanannya, Sistem kami tidak dapat mengirim email ke <b>' . $get_user->usr_email . '</b><br/>silahkan coba lagi nanti atau hubungi kami <a href="#">disini</a>
                            </div>');
			} else {
				$this->session->set_flashdata('notif', '<div class="callout callout-info">
								<h4><i class="icon fa fa-info"></i> Password Recovery</h4>
                                Hi, <b>' . $get_user->usr_name . '</b><br/>Password berhasil di reset. kami telah mengirimkan link untuk mengisi password baru ke email <b>' . $get_user->usr_email . '</b><br/>silahkan periksa inbox atau spam email anda dan klik tautan
                            </div>');
			}
			
			redirect('/user/send_password_recovery');
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Email tidak terdaftar.
                            </div>');
			$data['page'] 	= 'user/forgot_password';
			$this->load->view('themes/admin_lte/blank_layout', $data);
		}
	}

	public function update_password()
	{
		$usr_email = $this->input->post('usr_email');
		$usr_password = $this->input->post('usr_password');
		$key = str_shuffle('abcdefghijklmnopqrstuvwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
		$url = base_url();
		
		$update = $this->user_m->update_password($usr_password, $usr_email);
		if ($update) {
			echo "please wait...";
			
			if(!$this->user_m->update_validation($key, $usr_email)){
				$this->session->set_flashdata('notif', '<div class="callout callout-danger">
								<h4><i class="icon fa fa-bug"></i> Kesalahan sistem</h4>
                                Sepertinya ada masalah di sistem kami, laporkan kesalahan <a href="#">disini</a>
                            </div>');
			} else {
				$this->session->set_flashdata('notif', '<div class="callout callout-info">
								<h4><i class="icon fa fa-info"></i> Password Changed</h4>
                                Hi, akun <b>' . $usr_email . '</b><br/>
                                Anda telah berhasil mengganti password dengan yang baru.
                            </div>');
			}
			
			echo '<meta http-equiv="refresh" content="0;URL=' . base_url() . 'user/login.asp?url=' . $url . '" />';
		} else {
			$this->session->set_flashdata('notif', '<div class="callout callout-danger">
								<h4><i class="icon fa fa-bug"></i> Kesalahan sistem</h4>
                                Sepertinya ada masalah di sistem kami, laporkan kesalahan <a href="#">disini</a>
                            </div>');
			$data['page'] 	= 'commons/page_blank';
			$this->load->view('themes/admin_lte/blank_layout', $data);
		}
	}

	public function send_password_recovery()
	{

		$data['page'] 	= 'commons/page_blank';
		$this->load->view('themes/admin_lte/blank_layout', $data);
	}

	public function recovery_password($key)
	{
		$get_user = $this->user_m->get_user_by_validation($key);
		if ($get_user != NULL) {
			$data['user'] = $get_user;
			$data['page'] 	= 'user/recovery_password';
			$this->load->view('themes/admin_lte/blank_layout', $data);
		} else {
			$data['notif'] = '<div class="callout callout-danger">
								<h4><i class="icon fa fa-ban"></i> Token Invalid</h4>
                                Ups, token sudah tidak berlaku.
                            </div>';
			$data['page'] 	= 'commons/page_blank';
			$this->load->view('themes/admin_lte/blank_layout', $data);
		}
		
		
	}

	public function sendmail_reset_password($data)
	{
		$mail = $this->sendmail();
		$message = 'Hi, ' . $data['name'] . '<br/>' .
        'Please follow this link for create new password<br/>'
        . base_url('user/recovery_password') . '/' . $data['key'] .
		'<br/>Sender <a href="http://cyberkay.xyz" target="blank">Cyberkay</a>';
		$mail->email->to($data['email']);// change it to yours
	      $mail->email->subject('Password recovery from cyberkay');
	      $mail->email->message($message);
	      if($mail->email->send())
	     {
	    	return true;
	     }
	     else
	     {
	     	return false;
	     }

	}

	public function sendmail()
	{
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'mx1.idhostinger.com',
		  'smtp_port' => 2525,
		  'smtp_user' => 'kiki.kiswanto@cyberkay.xyz', // change it to yours
		  'smtp_pass' => 'kiswanto', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
        
        $this->load->library('email', $config);
	      $this->email->set_newline("\r\n");
	      $this->email->from('kiki.kiswanto@cyberkay.xyz', 'Cyberkay Inc'); // change it to yours
	      return $this;
	      
	}
}