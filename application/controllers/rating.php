<?php
class Rating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rating_model');
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