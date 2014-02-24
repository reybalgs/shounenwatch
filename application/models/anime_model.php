<?php
class Anime_model extends CI_Model{
    public function __construct() {
        # Load DB first
        $this->load->database();
    }
    
    public function get_highest_rated_anime($limit = NULL, $start = NULL, $alphabetical = FALSE,
                                            $reverse = FALSE, $with_inactives = FALSE) {
        # Gets all anime and sorts them in descending order according to their
        # average ratings.
        # This does not use the Bayesian average, so the results could be skewed.
        $this->db->select('anime.id, name, anime.image, airing, episodes, anime.active, (SELECT AVG(rating.rating) AS avgrating FROM rating WHERE rating.animeID = anime.id) as average_rating, (SELECT COUNT(rating.id) as ratingcnt FROM rating WHERE rating.animeID = anime.id) as rating_count');
        $this->db->from('anime');
        
        if(!($with_inactives)) {
            $this->db->where('anime.active', 1);
        }
        
        if($reverse) {
            $this->db->order_by('average_rating', 'asc');
            $this->db->order_by('rating_count', 'asc');
        }
        else {
            $this->db->order_by('average_rating', 'desc');
            $this->db->order_by('rating_count', 'desc');
        }
        
        if($alphabetical) {
            $this->db->order_by('name', 'asc');
        }
        
        # Limit the results if the parameters are given
        if(!(is_null($limit) and is_null($start))) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function search_anime_title($search_term, $limit = NULL, $start = NULL,
                                       $alphabetical = FALSE, $reverse = FALSE,
                                       $with_inactives = FALSE) {
        if(!(is_null($search_term))) {
            # Searches for anime based on the title and the given search term.
            # Uses a pretty loose wildcard (anything containing the given term)
            $this->db->select('anime.id, name, username, anime.image, airing, synopsis, episodes, anime.active');
            $this->db->from('anime');
            $this->db->join('user', 'user.id = anime.userID');
            if(!($with_inactives)) {
                $this->db->where('anime.active', 1);
            }
            $this->db->like('name', $search_term);
            
            if($alphabetical) {
                $this->db->order_by('name', 'asc');
            }
            
            if(!(is_null($limit) and is_null($start))) {
                $this->db->limit($limit, $start);
            }
            
            $query = $this->db->get();
            return $query->result_array();
        }
    }
    
    public function get_most_watched_anime($limit = NULL, $start = NULL, $alphabetical = FALSE,
                                           $reverse = FALSE, $with_inactives = FALSE) {
        # Gets all anime, and sorts them in descending order according to
        # the number of watching users.
        # Has an optional parameter that reverses the ordering.
        $this->db->select('anime.id, name, anime.image, airing, episodes, anime.active, (SELECT COUNT(watching.id) AS numwatching FROM watching WHERE watching.animeID = anime.id) AS watch_count');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        
        # Filter the inactives, if not set to have them
        if(!($with_inactives)) {
            $this->db->where('anime.active', 1);
        }
        
        # Reverse the order when necessary
        if($reverse) {
            $this->db->order_by('watch_count', 'asc');
        }
        else {
            $this->db->order_by('watch_count', 'desc');
        }
        
        if($alphabetical) {
            $this->db->order_by('name', 'asc');
        }
        
        # Limit the results if the parameters are given
        if(!(is_null($limit) and is_null($start))) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function count_all_anime_from_user($user_id) {
        # Counts all anime submitted by a given user.
        $this->db->select('anime.id, name, anime.image, airing, synopsis, episodes, anime.active');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        $this->db->where('anime.userID', $user_id);
        return $this->db->count_all_results();
    }
    
    public function count_all_anime() {
        # Counts all anime in the database and returns the count as a result.
        return $this->db->count_all('anime');
    }
    
    public function set_anime($animeinfo) {
        # Sets user information
        return $this->db->insert('anime', $animeinfo);
    }
    
    public function edit_anime($id, $animeinfo) {
        # Edits the anime assigned to the given id.
        $this->db->where('id', $id);
        return $this->db->update('anime', $animeinfo);
    }
    
    public function delete_anime($anime_id) {
        # Deletes the given anime from the database.
        # WARNING! If the given anime has viewers, use the
        # make_anime_inactive() function instead.
        $this->db->where('id', $anime_id);
        return $this->db->delete('anime');
    }
    
    public function make_anime_inactive($anime_id) {
        # Makes the given anime 'inactive', meaning it's not technically
        # deleted from the database, only from the listings.
        # This is necessary when a submitter wants to delete their submission
        # while there are other people still watching it.
        $this->db->where('id', $anime_id);
        return $this->db->update('anime', array('active'=>0));
    }
    
    public function make_anime_active($anime_id) {
        # Simply does the reverse of the aforementioned function.
        $this->db->where('id', $anime_id);
        return $this->db->update('anime', array('active'=>1));
    }
    
    public function get_all_anime($limit = NULL, $start = NULL, $alphabetical = FALSE, $with_inactives = FALSE) {
        # Gets all anime from the database and returns them in an array
        # Accepts two parameters, a limit for the number of rows returned and an
        # offset to start the results query from
        
        # Includes the usernames of the submitters
        $this->db->select('anime.id, name, username, anime.image, airing, synopsis, episodes, anime.active');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        if(!($with_inactives)) {
            $this->db->where('anime.active', 1);
        }
        if($alphabetical) {
            $this->db->order_by('name', 'asc');
        }
        
        if(!(is_null($limit) and is_null($start))) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_anime($anime_id) {
        # Gets and returns anime from the database
        $query = $this->db->get_where('anime', array("id"=>$anime_id));
        return $query->row();
    }
    
    public function get_anime_name($anime_name) {
        # Gets and returns an anime based on a name
        $query = $this->db->get_where('anime', array('name'=>$anime_name));
        return $query->row();
    }
    
    public function get_anime_from_user($user_id, $limit = NULL, $start = NULL,
                                        $with_inactives = FALSE) {
        # Gets all anime submitted by the user passed as an argument.
        $this->db->select('anime.id, name, anime.image, airing, synopsis, episodes, anime.active');
        $this->db->from('anime');
        $this->db->join('user', 'user.id = anime.userID');
        $this->db->where('anime.userID', $user_id);
        if(!($with_inactives)) {
            $this->db->where('anime.active', 1);
        }
        
        if(!(is_null($limit) and is_null($start))) {
            $this->db->limit($limit, $start);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>