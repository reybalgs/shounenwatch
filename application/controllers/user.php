<?php
class User extends CI_Controller {
    public function __construct() {
        # Superclass constructor
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index() {
        $data['users'] = $this->user_model->get_users();
        
        $this->load->view('user/test', $data);
    }
    
    public function view() {
    }
}

?>