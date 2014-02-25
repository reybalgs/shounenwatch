<?php
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('anime_model');
        $this->load->model('reports_model');
    }
    
    public function unauthorized() {
        # Displays a page when a non-admin attempts to go to the admin panel
        $data['title'] = "You're not supposed to be here...";
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/unauthorized', $data);
        $this->load->view('templates/footer');
    }
    
    public function index() {
        # The admin panel controller
        
        # First we need to check if the admin is logged in
        if($this->session->userdata('logged_in') and
           $this->session->userdata('username') == 'admin' and
           $this->session->userdata('user_id') == 1) {
            $data['title'] = 'ShounenWatch Admin Panel';
            $data['users'] = $this->user_model->get_users();
            $data['anime'] = $this->anime_model->get_all_anime();
            $data['reports'] = $this->reports_model->get_all_reports();
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/panel', $data);
            $this->load->view('templates/footer');
        }
        else {
            $this->unauthorized();
        }
    }
}

?>