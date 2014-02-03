<?php
class User_model extends CI_Model{
    public function __construct() {
        # Constructor, load db first
        $this->load->database();
    }
    
    public function get_users() {
        # Function that gets all users
        $query = $this->db->get('user');
        return $query->result_array();
    }
}

?>