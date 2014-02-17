<?php
class Rating_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_rating_stars($rating) {
        # Returns stars (in a string) for the given rating.
        $string = '';
        
        if($rating == NULL) {
            $string = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            
        }
        
        if($rating >= 0 and $rating < 0.5) {
            $string = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 0.5 and $rating < 1.0) {
            $string = '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 1.0 and $rating < 1.5) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 1.5 and $rating < 2.0) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 2.0 and $rating < 2.5) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 2.5 and $rating < 3.0) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 3.0 and $rating < 3.5) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 3.5 and $rating < 4.0) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 4.0 and $rating < 4.5) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
        }
        else if($rating >= 4.5 and $rating < 5.0) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
        }
        else if($rating == 5.0) {
            $string = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
        }
        
        return $string;
    }
    
    public function get_rating_average($ratings) {
        # Returns the average (on a scale of .5s) of the given array of ratings.
        $ratings_count = count($ratings);
        $total_ratings = 0;
        
        if($ratings_count > 0) {
            # Add all the ratings together
            foreach($ratings as $rating) {
                $total_ratings += $rating['rating'];
            }
            
            # Get the average
            $total_ratings = $total_ratings / ($ratings_count * 1.0);
            
            # Round by the nearest .5
            return round($total_ratings, 1);
        }
        else {
            return 0.0;
        }
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