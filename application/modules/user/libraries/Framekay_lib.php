<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Framekay_lib {

	protected $CI;

    public function __construct()
    {
    	$this->CI =& get_instance();
    }
    public function filter()
    {
    	$this->CI->load->library('session');
        $this->CI->load->model('level_m');
        $this->CI->load->model('user_m');
    	if ($this->CI->session->userdata('usr_id') == '') {
    		redirect('/user/login' . '?url=' . current_url());
    	}
        if ($this->CI->level_m->get_plugin_permission(uri_string(), $this->CI->user_m->get_user_session()->usr_level) != '1') {
            redirect('/sistem/forbidden');
        }
    }
    public function active_menu($url, $url2='')
    {
        echo ($this->CI->uri->segment(1) == $url) ? 'active' : '' ;
        echo (($this->CI->uri->segment(1) == $url2) && ($url2 != '')) ? 'active' : '' ;
        
    }

    public function gap_date($start, $end)
    {
        $datetime1 = new DateTime($start);
        $datetime2 = new DateTime($end);
        $difference = $datetime1->diff($datetime2);
        return $difference->days;
    }

    public function add_date($time='', $day='', $format='Y-m-d')
    {
        $date = new DateTime($time);
        $date->add(new DateInterval('P' . $day .'D'));
        return $date->format($format);
    }
}