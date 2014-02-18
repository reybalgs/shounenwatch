<?php
class Reports_model extends CI_Model {
    public function __construct() {
        $this->load->database();
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