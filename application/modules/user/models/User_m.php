<?php 
class User_m extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_user_all()
        {
        	$this->db->join('kay_level', 'kay_level.lvl_id = kay_user.usr_level');
                $query = $this->db->get('kay_user');
                return $query->result();
        }

        public function get_user_login()
        {
                $usr_email = $this->input->post('email');
                $password = $this->input->post('password');
                $usr_password = md5($password);

                $this->db->where('usr_email', $usr_email);
                $this->db->where('usr_password', $usr_password);
                $this->db->where('usr_activated', 1);
                $query = $this->db->get('kay_user');
                return $query->row();
        }

        public function get_user_session()
        {
                $sess_id = $this->session->userdata('usr_id');

                $this->db->select('usr_id, usr_name, lvl_name, usr_level, usr_photo, usr_created');
                $this->db->from('kay_user');
                $this->db->where('usr_id', $sess_id);
                $this->db->join('kay_level', 'kay_level.lvl_id = kay_user.usr_level');
                $query = $this->db->get();
                return $query->row();
        }

        public function get_user_by_email($id)
        {

                $this->db->select('*');
                $this->db->from('kay_user');
                $this->db->where('usr_email', $id);
                $this->db->join('kay_level', 'kay_level.lvl_id = kay_user.usr_level');
                $query = $this->db->get();
                return $query->row();
        }

        public function get_user_by_validation($id)
        {

                $this->db->select('*');
                $this->db->from('kay_user');
                $this->db->where('usr_validation', $id);
                $this->db->join('kay_level', 'kay_level.lvl_id = kay_user.usr_level');
                $query = $this->db->get();
                return $query->row();
        }

        public function get_user_count()
        {
                $this->db->join('kay_level', 'kay_level.lvl_id = kay_user.usr_level');
                $query = $this->db->get('kay_user');
                return $query->num_rows();
        }

        public function insert_user()
        {
                $this->usr_name         = $this->input->post('usr_name');
                $this->usr_email        = $this->input->post('usr_email');
                $password               = $this->input->post('usr_password');
                $this->usr_password     = md5($password);
                $this->usr_level        = $this->input->post('usr_level');
                $query = $this->db->insert('kay_user', $this);
                return $query;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

        public function update_activated($value, $id)
        {
                $this->usr_activated = $value;

                $this->db->where('usr_email', $id);
                $query = $this->db->update('kay_user', $this);
                return $query;
        }

        public function update_password($new, $id)
        {
                $this->usr_password = md5($new);
                $this->usr_activated = 1;

                $this->db->where('usr_email', $id);
                $query = $this->db->update('kay_user', $this);
                return $query;
        }

        public function update_validation($key, $id)
        {
                $this->usr_validation = $key;

                $this->db->where('usr_email', $id);
                $query = $this->db->update('kay_user', $this);
                return $query;
        }

        public function delete_user($id)
        {
                $this->db->where('usr_email', $id);
                $query = $this->db->delete('kay_user');
                return $query;

        }

        public function delete_user_multiple($id)
        {
                $this->db->where_in('usr_email', $id);
                $query = $this->db->delete('kay_user');
                return $query;

        }

}
 ?>