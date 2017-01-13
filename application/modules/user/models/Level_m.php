<?php 
class Level_m extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_level_all()
        {
                $query = $this->db->get('kay_level');
                return $query->result();
        }

        public function get_level_available()
        {
                $this->db->where('lvl_id !=', 1);
                $query = $this->db->get('kay_level');
                return $query->result();
        }

        public function get_level_by_code($id)
        {
                $this->db->where('lvl_code', $id);
                $query = $this->db->get('kay_level');
                return $query->row();
        }

        public function get_level_count($id)
        {
                $this->db->where('usr_level', $id);
                $query = $this->db->get('kay_user');
                return $query->num_rows();
        }

        public function get_plugin_all()
        {
                $query = $this->db->get('kay_plugin');
                return $query->result();
        }

        public function get_plugin_uri($id)
        {
                $this->db->where('plg_id', $id);
                $query = $this->db->get('kay_plugin_uri');
                return $query->result();
        }

        public function get_plugin_permission($uri, $lvl)
        {
                $this->db->where('uri_link', $uri);
                $this->db->where('lvl_id', $lvl);
                $this->db->join('kay_plugin_uri', 'kay_plugin_uri.uri_id = kay_plugin_permission.uri_id');
                $query = $this->db->get('kay_plugin_permission');
                
                $query = $query->num_rows();
                if ($query < 1) {
                        return 1;
                } else {
                        return 0;
                }
                
        }

        public function get_plugin_permission_by_id($uri, $lvl)
        {
                $this->db->where('uri_id', $uri);
                $this->db->where('lvl_id', $lvl);
                $query = $this->db->get('kay_plugin_permission');
                
                $query = $query->num_rows();
                if ($query < 1) {
                        return 1;
                } else {
                        return 0;
                }
                
        }

        public function insert_plugin_permission($uri_id, $lvl_id)
        {
                $this->uri_id     = $uri_id;
                $this->lvl_id     = $lvl_id;

                $query = $this->db->insert('kay_plugin_permission', $this);
                return $query;
        }

        public function delete_plugin_permission($uri_id, $lvl_id)
        {
                $this->db->where('uri_id', $uri_id);
                $this->db->where('lvl_id', $lvl_id);
                $query = $this->db->delete('kay_plugin_permission');
                return $query;

        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}
 ?>