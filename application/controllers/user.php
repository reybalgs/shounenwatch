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
    
    public function login() {
        # Login function, also handles the login page
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Login!';
        $data['invalid'] = FALSE;
        
        # Set the form validation rules
        # Both fields must be filled out
        # Username must be between 1-30 characters in length, and unique
        $this->form_validation->set_rules('login-username', 'Username', 'xss_clean');
        $this->form_validation->set_rules('login-password', 'Password', 'xss_clean');
        
        if($this->form_validation->run() == FALSE) {
            # Show the pages
            $this->load->view('templates/header', $data);
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');
        }
        else {
            # Authenticate the user
            $username_input = $this->input->post('login-username');
            $password_input = $this->input->post('login-password');
            
            if($this->user_model->authenticate_user($username_input, $password_input)) {
                # Show success screen
                $this->load->view('templates/header', $data);
                $this->load->view('user/success');
                $this->load->view('templates/footer');
            }
            else {
                $data['invalid'] = TRUE;
                
                $this->load->view('templates/header', $data);
                $this->load->view('user/login', $data);
                $this->load->view('templates/footer');
            }
        }
    }
    
    public function view() {
    }
}

?>