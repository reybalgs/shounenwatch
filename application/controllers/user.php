<?php   
class User extends CI_Controller {
    /**
     * Controller for users
     */
    
    public function __construct() {
        # Superclass constructor
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index() {
        $data['users'] = $this->user_model->get_users();
        $data['title'] = 'Users index';
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/test', $data);
        $this->load->view('templates/footer');
    }
    
    public function view() {
    }
}

?>