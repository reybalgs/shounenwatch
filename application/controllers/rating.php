<?php
class Rating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rating_model');
    }
    
    public function remove_rating($rating_id, $anime_id) {
        # Removes the rating given the rating ID.
        $this->rating_model->remove_rating($rating_id);
        
        $this->load->library('../controllers/anime');
        $this->anime->detail($anime_id);
    }
    
    public function set_anime_rating($anime_id, $user_id, $rating) {
        # Creates a rating entry for the anime and user with the given rating.
        
        # Check if the user already has a rating for the given anime
        $current_rating = $this->rating_model->get_user_anime_rating($user_id, $anime_id);
        
        if(isset($current_rating->rating)) {
            $this->rating_model->modify_rating($current_rating->ratingID, $rating);
        }
        else {
            $this->rating_model->set_rating(array("animeID"=>$anime_id, "userID"=>$user_id, "rating"=>$rating));
        }
        
        # Load the anime controller
        $this->load->library('../controllers/anime');
        $this->anime->detail($anime_id);
    }
    
    public function index() {
        $data['ratings'] = $this->rating_model->get_all_ratings();
        $data['reluctanthero'] = $this->rating_model->get_all_ratings_from_anime(17);
        $data['rhaverage'] = $this->rating_model->get_rating_average($this->rating_model->get_all_ratings_from_anime(17));
        $data['phoenixwright'] = $this->rating_model->get_all_ratings_from_user(5);
        $data['pwaarating'] = $this->rating_model->get_user_anime_rating(5, 1);
        $data['title'] = 'Rating test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('rating/rating', $data);
        $this->load->view('templates/footer');
    }
}

?>