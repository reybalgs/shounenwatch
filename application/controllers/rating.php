<?php
class Rating extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('rating_model');
    }
    
    public function index() {
        $data['ratings'] = $this->rating_model->get_all_ratings();
        $data['title'] = 'Rating test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('rating/rating', $data);
        $this->load->view('templates/footer');
    }
}

?>