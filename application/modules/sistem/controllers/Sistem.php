<?php
class Sistem extends CI_Controller {

    public function index()
    {
        $data['page'] 	= 'sistem/dashboard';
        $this->load->view('themes/admin_lte/backend_collapse_layout', $data);
    }
}