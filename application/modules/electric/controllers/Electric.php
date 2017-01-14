<?php
class Electric extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('electric_m');
	}

	public function cost()
    {
        echo "<b>COST</b> <br>
          Today  : Rp " . ceil($this->electric_m->get_cost(date("Y-m-d")))  . ",-<br>
          Monthly  : Rp " . ceil($this->electric_m->get_cost(date("Y-m"))) . ",-<br>
          Years : Rp " . ceil($this->electric_m->get_cost(date("Y"))) . ",-
        ";
    }

    public function power()
    {
        echo "<b>POWER</b> <br>
          Today  : " . $this->electric_m->get_power(date("Y-m-d"))  . "W<br>
          Monthly  : " . $this->electric_m->get_power(date("Y-m")) . "W<br>
          Years : " . $this->electric_m->get_power(date("Y")) . "W
        ";
    }

    public function current()
    {
        echo "<b>CURRENT</b> <br>
          Today  : " . $this->electric_m->sum_electric('i', date('Y-m-d'))->i  . "A<br>
          Monthly  : " . $this->electric_m->sum_electric('i', date('Y-m'))->i . "A<br>
          Years : " . $this->electric_m->sum_electric('i', date('Y'))->i . "A
        ";
    }

    public function volt()
    {
        echo "<b>VOLT</b> <br>
          Today  : " . $this->electric_m->sum_electric('v', date('Y-m-d'))->v  . "V<br>
          Monthly  : " . $this->electric_m->sum_electric('v', date('Y-m'))->v . "V<br>
          Years : " . $this->electric_m->sum_electric('v', date('Y'))->v . "V
        ";
    }

    public function insert($source='', $i='', $v='')
    {
    	if ($this->electric_m->insert($source, $i, $v)) {
    		echo "accepted";
    	} else {
    		echo "rejected";
    	}
    	
    }
}