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
        $this->db->select('watching.id as watchingID, user.id as userID, user.username, anime.id as animeID, anime.name, watching.currentEpisode, anime.episodes');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        $this->db->where('watching.userID', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function set_watching_episode($watching_id, $episode) {
        # Sets the current episode of the watching entry to the given episode.
        $this->db->where('id', $watching_id);
        return $this->db->update('watching', array('currentEpisode'=>$episode));
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
    
    public function check_if_watching($user_id, $anime_id) {
        # Returns true or false whether or not the anime is in the user's watch list.
        $this->db->select('user.username, anime.name, watching.currentEpisode');
        $this->db->from('anime');
        $this->db->join('watching', 'anime.id = watching.animeID');
        $this->db->join('user', 'watching.userID = user.id');
        $this->db->where('watching.animeID', $anime_id);
        $this->db->where('watching.userID', $user_id);
        
        $query = $this->db->get();
        return $query->row();
    }
    
    public function add_anime_to_user_watchlist($anime_id, $user_id) {
        # Adds the given anime to the given user's watchlist.
        $data = array(
            'userID'=>$user_id,
            'animeID'=>$anime_id,
            'currentEpisode'=>1
        );
        
        return $this->db->insert('watching', $data);
    }
    
    public function remove_anime_from_user_watchlist($anime_id, $user_id) {
        # Removes the given anime from the given user's watchlist.
        $this->db->where('animeID', $anime_id);
        $this->db->where('userID', $user_id);
        return $this->db->delete('watching');
    }
}
?>