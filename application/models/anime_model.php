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
}

?>