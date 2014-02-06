<?php   
class User extends CI_Controller {
    /**
     * Controller for users
     */
    
    public function __construct() {
        # Superclass constructor
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('anime_model');
    }
    
    public function index() {
        $data['users'] = $this->user_model->get_users();
        $data['title'] = 'Users index';
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/test', $data);
        $this->load->view('templates/footer');
    }
    
    public function profile($username) {
        # Loads the user profile page based on the user passed as an argument.
        $user = $this->user_model->get_user($username);
        # Load all the anime submitted by the user
        $anime = $this->anime_model->get_anime_from_user($user->id);
        
        $data['title'] = $user->username."'s"." profile";
        
        # Load important user data into data superarray
        $data['username'] = $user->username;
        $data['email'] = $user->email;
        $data['about'] = $user->about;
        $data['image'] = $user->image;
        $data['anime'] = $anime;
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_profile($username) {
        # Function that handles edits on a user's profile.
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        # Get the user from the database
        $user = $this->user_model->get_user($username);
        
        $data['title'] = 'Edit your profile';
        $data['user'] = $user;
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/edit_profile', $data);
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
        $this->form_validation->set_rules('login-username', 'Username',
                                          'xss_clean');
        $this->form_validation->set_rules('login-password', 'Password',
                                          'xss_clean');
        
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
            
            if($this->user_model->authenticate_user($username_input,
                                                    $password_input)) {
                # Put user data into session so we can track them
                $user = $this->user_model->get_user($username_input);
                $userdata = array('username'=>$user->username,
                                  'logged_in'=>TRUE);
                $this->session->set_userdata($userdata);
                
                $data['username'] = $user->username;
                
                # Show success screen
                $this->load->view('templates/header', $data);
                $this->load->view('user/success_login', $data);
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
    
    public function logout() {
        # Delete the user's session
        $this->session->sess_destroy();
        
        $data['title'] = 'Logout';
        
        # Show the logout page
        $this->load->view('templates/header', $data);
        $this->load->view('user/success_logout');
        $this->load->view('templates/footer');
    }
    
    public function register() {
        # Function that handles user registration
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Register for a badass account';
        
        # Set the form validation rules
        # All fields must be filled out
        # Username must be 5-30 chars in length and unique
        $this->form_validation->set_rules('register-username', 'Username',
                                          'required|min_length[5]|max_length[30]|is_unique[user.username]');
        $this->form_validation->set_rules('register-password', 'Password',
                                          'required|matches[register-passwordconf]');
        $this->form_validation->set_rules('register-passwordconf', 'Password Confirmation',
                                          'required');
        $this->form_validation->set_rules('register-email', 'Email',
                                          'required|valid_email|is_unique[user.email]');
        
        if($this->form_validation->run() == FALSE) {
            # Show the pages
            $this->load->view('templates/header', $data);
            $this->load->view('user/register', $data);
            $this->load->view('templates/footer');
        }
        else {
            # Get the post data
            $username = $this->input->post('register-username');
            $password = $this->input->post('register-password');
            $email = $this->input->post('register-email');
            
            # Add the user into the database
            $this->user_model->set_user($username, $email, $password);
            $newuser = $this->user_model->get_user($username);
            
            # Log the user in by creating a session ID
            $userdata = array(
                'username'=>$newuser->username,
                'logged_in'=>TRUE
            );
            
            $this->session->set_userdata($userdata);
            
            $data['username'] = $newuser->username;
            
            # Show success screen
            $this->load->view('templates/header', $data);
            $this->load->view('user/success_register', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function view() {
    }
}

?>