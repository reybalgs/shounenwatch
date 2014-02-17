<?php
class Rating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rating_model');
    }
    
    public function get_rating_average($ratings) {
        # Returns the average (on a scale of .5s) of the given array of ratings.
        $ratings_count = count($ratings);
        $total_ratings = 0;
        
        # Add all the ratings together
        foreach($ratings as $rating) {
            $total_ratings += $rating['rating'];
        }
        
        # Get the average
        $total_ratings = $total_ratings / ($ratings_count * 1.0);
        
        # Round by the nearest .5
        return round($total_ratings, 1);
    }
    
    public function index() {
        $data['ratings'] = $this->rating_model->get_all_ratings();
        $data['reluctanthero'] = $this->rating_model->get_all_ratings_from_anime(17);
        $data['rhaverage'] = $this->get_rating_average($this->rating_model->get_all_ratings_from_anime(17));
        $data['phoenixwright'] = $this->rating_model->get_all_ratings_from_user(5);
        $data['pwaarating'] = $this->rating_model->get_user_anime_rating(5, 1);
        $data['title'] = 'Rating test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('rating/rating', $data);
        $this->load->view('templates/footer');
    }
}

?>