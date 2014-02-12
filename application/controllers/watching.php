<?php
class Watching extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('watching_model');
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