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
    
    public function get_all_ratings_from_user($user_id) {
        # Gets all ratings from the given user.
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, rating.id as ratingID, rating.rating');
        $this->db->from('anime');
        $this->db->join('rating', 'anime.id = rating.animeID');
        $this->db->join('user', 'rating.userID = user.id');
        $this->db->where('rating.userID', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_ratings_from_anime($anime_id) {
        # Gets all ratings on the given anime.
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, rating.id as ratingID, rating.rating');
        $this->db->from('anime');
        $this->db->join('rating', 'anime.id = rating.animeID');
        $this->db->join('user', 'rating.userID = user.id');
        $this->db->where('rating.animeID', $anime_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_user_anime_rating($user_id, $anime_id) {
        # Gets the given user's rating on the given anime.
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, rating.id as ratingID, rating.rating');
        $this->db->from('anime');
        $this->db->join('rating', 'anime.id = rating.animeID');
        $this->db->join('user', 'rating.userID = user.id');
        $this->db->where('rating.animeID', $anime_id);
        $this->db->where('rating.userID', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }
}

?>