<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('anime_model');
        $this->load->model('reports_model');
    }
    
    public function index() {
        $data['title'] = 'ShounenWatch Admin Panel';
        $data['users'] = $this->user_model->get_users();
        $data['anime'] = $this->anime_model->get_all_anime();
        $data['reports'] = $this->reports_model->get_all_reports();
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/panel', $data);
        $this->load->view('templates/footer');
    }
}

?>