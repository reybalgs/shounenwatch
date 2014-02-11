<?php
class Anime extends CI_Controller {
    /**
     * Controller for anime
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('anime_model');
        $this->load->model('user_model');
    }
    
    public function detail($anime_id) {
        # Displays anime based on the passed ID.
        # First we need to load the anime from the database.
        $anime = $this->anime_model->get_anime($anime_id);
        $user = $this->user_model->get_user_id($anime->userID);
        
        $data['anime'] = $anime;
        $data['user'] = $user;
        $data['title'] = $anime->name;
        
        $this->load->view('templates/header', $data);
        $this->load->view('anime/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function submit() {
        # Handles the addition of new anime to the service
        $data['title'] = 'Add new anime';
        
        $this->load->view('templates/header', $data);
        $this->load->view('anime/create_new', $data);
        $this->load->view('templates/footer');
    }
    
    public function index() {
        $data['animes'] = $this->anime_model->get_all_anime();
        $data['title'] = 'Anime index';
        
        $this->load->view('templates/header', $data);
        $this->load->view('anime/test', $data);
        $this->load->view('templates/footer');
    }
}
?>