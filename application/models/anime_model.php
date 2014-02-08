<?php
class Anime_model extends CI_Model{
    public function __construct() {
        # Load DB first
        $this->load->database();
    }
    
    public function get_all_anime() {
        # Gets all anime from the database and returns them in an array
        # Includes the usernames of the submitters
        $this->db->select('anime.id, name, username, anime.image, airing, synopsis, episodes');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_anime($anime_id) {
        # Gets and returns anime from the database
        $query = $this->db->get_where('anime', array("id"=>$anime_id));
        return $query->row();
    }
    
    public function get_anime_from_user($user_id) {
        # Gets all anime submitted by the user passed as an argument.
        $this->db->select('anime.id, name, anime.image, airing, synopsis, episodes');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        $this->db->where('anime.userID', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>