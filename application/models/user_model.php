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
    
    public function get_user_id($id) {
        # Queries a user from the database based on the provided id
        $query = $this->db->get_where('user', array("id"=>$id));
        return $query->row();
    }
    
    public function set_user($username, $email, $password) {
        $values = array(
            'username'=>$username,
            'email'=>$email,
            'password'=>hash('sha256', $password)
        );
        
        return $this->db->insert('user', $values);
    }
    
    public function edit_user($id, $data) {
        # Modifies the user's email with the given id with the email passed as
        # a second parameter
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
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