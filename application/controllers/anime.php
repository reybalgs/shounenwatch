<?php
class Anime extends CI_Controller {
    /**
     * Controller for anime
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('anime_model');
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