<?php
class Watching_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_all_watching() {
        # Function that gets all watching data
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, watching.currentEpisode, anime.episodes');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_watching_from_user($user_id) {
        # Returns a table on all the anime being watched by the given user.
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, watching.currentEpisode, anime.episodes');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        $this->db->where('watching.userID', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_watching_anime($anime_id) {
        # Returns a table of all people watching the given anime.
        $this->db->select('user.id as userID, user.username, anime.id as animeID, anime.name, watching.currentEpisode, anime.episodes');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        $this->db->where('watching.animeID', $anime_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>