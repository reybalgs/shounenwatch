<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('anime_model');
    }
    
    public function index() {
        $data['title'] = 'ShounenWatch Admin Panel';
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/panel', $data);
        $this->load->view('templates/footer');
    }
}

?>