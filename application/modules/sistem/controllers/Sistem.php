<?php
class Sistem extends CI_Controller {

    public function index()
    {
    	$this->load->model('electric_m');
        $data['page'] 	= 'sistem/dashboard';
        $data['electrics'] = $this->electric_m->get_electric();
        $this->load->view('themes/admin_lte/backend_collapse_layout', $data);
    }
}