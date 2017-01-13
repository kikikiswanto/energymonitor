<?php
class Example extends CI_Controller {

    public function index()
    {
        $data['page'] 	= 'example/Example_v';
        $this->load->view('themes/admin_lte/application_layout', $data);
    }

    public function dashboard()
    {
        $data['page'] 	= 'example/dashboard';
        $this->load->view('themes/admin_lte/application_layout', $data);
    }

    public function dashboard2()
    {
        $data['page'] 	= 'example/dashboard2';
        $this->load->view('themes/admin_lte/application_layout', $data);
    }

    public function widgets()
    {
        $data['page'] 	= 'example/widgets';
        $this->load->view('themes/admin_lte/application_layout', $data);
    }

    public function calendar()
    {
        $data['page']   = 'example/calendar';
        $this->load->view('themes/admin_lte/application_layout', $data);
    }

    public function layout_top()
    {
        $data['page']   = 'layout/top_nav';
        $this->load->view('themes/admin_lte/frontend_layout', $data);
    }

    public function layout_boxed()
    {
        $data['page']   = 'layout/boxed';
        $this->load->view('themes/admin_lte/backend_boxed_layout', $data);
    }

    public function layout_fixed()
    {
        $data['page']   = 'layout/fixed';
        $this->load->view('themes/admin_lte/backend_fixed_layout', $data);
    }

    public function layout_collapse()
    {
        $data['page']   = 'layout/collapse';
        $this->load->view('themes/admin_lte/backend_collapse_layout', $data);
    }
}