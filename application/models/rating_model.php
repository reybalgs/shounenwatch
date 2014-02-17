<?php
class Rating_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_all_ratings() {
        # Function that gets all rating rows
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, rating.id as ratingID, rating.rating');
        $this->db->from('anime');
        $this->db->join('rating', 'anime.id = rating.animeID');
        $this->db->join('user', 'rating.userID = user.id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>