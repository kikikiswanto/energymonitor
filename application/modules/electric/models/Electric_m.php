<?php 
class Electric_m extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_electric()
        {
        	$this->db->join('kay_source', 'kay_source.sc_code = kay_electric.el_source');
            $this->db->select('*');
            $this->db->from('kay_electric');
            $this->db->order_by('el_id', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }

        public function count_electric($date='')
        {
            $this->db->join('kay_source', 'kay_source.sc_code = kay_electric.el_source');
            if ($date != "") {
                $this->db->like('el_time', $date);
            }
            $query = $this->db->get('kay_electric');
            return $query->num_rows();
        }

        public function sum_electric($code='', $date='')
        {
            if ($code != "") {
                $this->db->select_sum($code);
            }
            $this->db->join('kay_source', 'kay_source.sc_code = kay_electric.el_source');
            
            if ($date != "") {
                $this->db->like('el_time', $date);
            }
            $query = $this->db->get('kay_electric');
            return $query->row();
        }

        public function get_power($date='')
        {
            $i = $this->sum_electric('i', $date)->i;
            $v = $this->sum_electric('v', $date)->v;
            return $i * $v;
        }

        public function get_cost($date='')
        {
            $w = $this->get_power($date);
            $s = $this->count_electric($date);
            $kwh    = 13000;
            $kws    = $kwh / 60;
            $ws     = $kws / 1000;
            $cw     = $w * $ws;
            $cws    = $cw * $s;
            return  $cws;
        }

        public function insert($s='', $i='', $v='')
        {
            $this->i            = $i;
            $this->v            = $v;
            $this->el_source    = $s;
            $query = $this->db->insert('kay_electric', $this);
            return $query;
        }
}