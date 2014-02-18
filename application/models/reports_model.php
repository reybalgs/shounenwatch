<?php
class Reports_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function remove_report($id) {
        $this->db->where('id', $id);
        return $this->db->delete('reports');
    }
    
    public function set_report($data) {
        return $this->db->insert('reports', $data);
    }
    
    public function get_all_reports_from_anime($anime_id) {
        # Gets all reports on a given anime.
        $this->db->select('reports.id as reportID, user.id as userID, user.username, anime.id as animeID, anime.name, comment');
        $this->db->from('anime');
        $this->db->join('reports', 'anime.id = reports.animeID');
        $this->db->join('user', 'reports.userID = user.id');
        $this->db->where('reports.animeID', $anime_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_reports_from_user($user_id) {
        # Gets all reports from a user
        $this->db->select('reports.id as reportID, user.id as userID, user.username, anime.id as animeID, anime.name, comment');
        $this->db->from('anime');
        $this->db->join('reports', 'anime.id = reports.animeID');
        $this->db->join('user', 'reports.userID = user.id');
        $this->db->where('reports.userID', $user_id);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_reports() {
        # Gets all reports from the database
        $this->db->select('reports.id as reportID, user.id as userID, user.username, anime.id as animeID, anime.name, comment');
        $this->db->from('anime');
        $this->db->join('reports', 'anime.id = reports.animeID');
        $this->db->join('user', 'reports.userID = user.id');
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>