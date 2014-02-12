<?php
class Watching extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('watching_model');
    }
    
    public function get_watching_anime($anime_id) {
        # Gets all the users watching a particular anime.
        $data['watchlist'] = $this->watching_model->get_watching_anime($anime_id);
        $data['title'] = 'People watching '.$data['watchlist'][0]['name'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('watching/watching', $data);
        $this->load->view('templates/footer');
    }
    
    public function get_watching_from_user($user_id) {
        # Gets watching information from the given user.
        $data['watchlist'] = $this->watching_model->get_watching_from_user($user_id);
        $data['title'] = 'Watching information for '.$data['watchlist'][0]['username'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('watching/watching', $data);
        $this->load->view('templates/footer');
    }
    
    public function index() {
        $data['watchlist'] = $this->watching_model->get_all_watching();
        $data['title'] = 'Watching test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('watching/watching', $data);
        $this->load->view('templates/footer');
    }
}

?>