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
    
    public function get_user($username) {
        # Queries a user from the database based on the provided username
        $query = $this->db->get_where('user', array("username"=>$username));
        return $query->row();
    }
    
    public function authenticate_user($username, $password) {
        # Authenticates the username, along with the password, provided above.
        $query = $this->db->get_where('user', array("username"=>$username,
            "password"=>hash("sha256", $password)));
        $result = $query->result_array();
        if(empty($result)) {
            # Result is empty, user is not authenticated
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
}

?>