<?php
class Watching_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_all_watching() {
        # Function that gets all watching data
        $this->db->select('watching.id, user.id as userID, user.username, anime.id as animeID, anime.name, watching.currentEpisode, anime.episodes');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>