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
        $this->load->model('watching_model');
        $this->load->model('rating_model');
        $this->load->library('pagination');
    }
    
    public function index() {
        $data['users'] = $this->user_model->get_users();
        $data['title'] = 'Users index';
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/test', $data);
        $this->load->view('templates/footer');
    }
    
    public function episodeCheck($anime, $episode_input) {
        # Checks whether or not the input is correct for the anime given
        if($anime['episodes'] > 0) {
            # If the total episodes are known, currEpisode cannot exceed
            # this value
            if($episode_input > $anime['episodes']) {
                return FALSE;
            }
        }
    }
    
    public function manage_watchlist() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        # Manages the watchlist of the given user.
        
        if($this->session->userdata('logged_in')) {
            # Get the user and their watchlist
            $user_id = $this->session->userdata('user_id');
            $user = $this->user_model->get_user_id($user_id);
            $watchlist = $this->watching_model->get_watching_from_user($user_id);
            $watchlist_count = count($watchlist);
            
            # Put them into the data superarray
            $data['user'] = $user;
            $data['watchlist'] = $watchlist;
            $data['title'] = 'Manage Your Watchlist';
            $data['done'] = FALSE;
            
            # Create validation rules
            for($i = 0; $i < $watchlist_count; $i++) {
                $anime = $watchlist[$i];
                if($anime['episodes'] > 0) {
                    # If the total episodes are known, currEpisode cannot exceed
                    # this value
                    $episodes = $anime['episodes'] + 1;
                    $this->form_validation->set_rules('epInput'.$i, $anime['name'].' current episode',
                                                      "required|less_than[$episodes]|is_natural_no_zero");
                }
                else {
                    # Episodes are unknown, currEpisode can be any value greater than 0
                    $this->form_validation->set_rules('epInput'.$i, $anime['name'].' current episode',
                                                      "required|is_natural_no_zero");
                }
            }
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('user/manage_watchlist', $data);
                $this->load->view('templates/footer');
            }
            else {
                # Initialize an array where we will be putting post values
                $episodes_array = array();
                
                for($i = 0; $i < $watchlist_count; $i++) {
                    # DEBUG log message
                    $input = $this->input->post('epInput'.$i);
                    log_message('debug', 'epInput'.$i.' content: '.$this->input->post('epInput'.$i));
                    if($input == '') {
                        log_message('debug', 'epInput'.$i.' is NULL!');
                    }
                    else {
                        log_message('debug', 'epInput'.$i.' is set to '.$input.', setting episode of '.$watchlist[$i]['name'].' to input');
                        $episodes_array[] = $this->input->post('epInput'.$i);
                    }
                }
                
                # For every anime in the watchlist, modify their watching values
                if(!(empty($episodes_array))) {
                    $i = 0;
                    foreach($watchlist as $anime) {
                        $anime['currentEpisode'] = $episodes_array[$i];
                        $this->watching_model->set_watching_episode($anime['watchingID'], $episodes_array[$i]);
                        $i = $i + 1;
                    }
                }
                
                $data['watchlist'] = $this->watching_model->get_watching_from_user($user_id);
                $data['done'] = TRUE;
                
                $this->load->view('templates/header', $data);
                $this->load->view('user/manage_watchlist', $data);
                $this->load->view('templates/footer');
            }
        }
        else {
            $this->login();
        }
    }
    
    public function delete($user_id) {
        # Deletes the given user by making them inactive, as well as all the
        # anime they have submitted.
        
        # Get all the anime this user has submitted.
        $user_anime = $this->anime_model->get_anime_from_user($user_id);
        
        foreach($user_anime as $anime) {
            # Make each anime inactive
            $this->anime_model->make_anime_inactive($anime['id']);
        }
        
        # Make the user's profile inactive
        $this->user_model->make_inactive($user_id);
        
        # Log the user out
        $this->logout();
    }
    
    public function profile($username) {
        # Loads the user profile page based on the user passed as an argument.
        $user = $this->user_model->get_user($username);
        # Load the user's watchlist
        $watchlist = $this->watching_model->get_watching_from_user($user->id);
        
        $config = array(
            "base_url"=>site_url('user/profile').'/'.$username,
            "total_rows"=>$this->anime_model->count_all_anime_from_user($user->id),
            "per_page"=>6,
            "uri_segment"=>4,
            "full_tag_open"=>'<ul class="pagination pagination-lg">',
            "full_tag_close"=>'<ul>',
            "cur_tag_open"=>'<li class="active"><a href="#">',
            "cur_tag_close"=>'</li>',
            "num_tag_open"=>'<li>',
            "num_tag_close"=>'</a></li>',
            "first_link"=>'<i class="fa fa-angle-double-left"></i> First',
            "first_tag_open"=>'<li>',
            "first_tag_close"=>'</li>',
            "last_link"=>'Last <i class="fa fa-angle-double-right"></i>',
            "last_tag_open"=>'<li>',
            "last_tag_close"=>'</li>',
            "next_link"=>'Next',
            "next_tag_open"=>'<li>',
            "next_tag_close"=>'</li>',
            "prev_link"=>'Prev',
            "prev_tag_open"=>'<li>',
            "prev_tag_close"=>'</li>'
        );
        
        # Initialize pagination library
        $this->pagination->initialize($config);
        
        # If there's a number in 3rd URI segment, use that, otherwise use 0
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        
        # Load all the anime submitted by the user
        $anime = $this->anime_model->get_anime_from_user($user->id, $config['per_page'], $page);
        
        $data['title'] = $user->username."'s"." profile";
        $data['links'] = $this->pagination->create_links();
        
        # Load important user data into data superarray
        $data['user'] = $user;
        $data['username'] = $user->username;
        $data['email'] = $user->email;
        $data['about'] = $user->about;
        $data['image'] = $user->image;
        $data['anime'] = $anime;
        $data['watchlist'] = $watchlist;
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/profile', $data);
        #$this->load->view('tests/tabs', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit_profile() {
        # Function that handles edits on a user's profile.
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $username = $this->session->userdata('username');
        
        if(empty($username)) {
            # The user is not logged in, show them the login page
            $this->firephp->error("Username is empty!");
            $this->login();
        }
        else {
            # DEBUG: Display retrived username in console
            $this->firephp->info($username, "Username retrieved from session");
            
            # Get the user from the database
            $user = $this->user_model->get_user($username);
            
            $data['title'] = 'Edit your profile';
            $data['user'] = $user;
            $data['username'] = $username;
            
            $data['done'] = FALSE;
            $data['wrong_password'] = FALSE;
            
            # Set the form validation rules
            $this->form_validation->set_rules('edit-email', 'Email',
                                              'valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('edit-password-new', 'New Password',
                                              'matches[edit-password-newconf]');
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('user/edit_profile', $data);
                $this->load->view('templates/footer');
            }
            else {
                # Everything checks out
                # Assign the inputs to variables if there are anything inputted.
                # If not, just use the current var of the user
                
                $email_input = $this->input->post('edit-email');
                $about_input = $this->input->post('edit-about');
                $password_input = $this->input->post('edit-password-new');
                
                # Check if there's an input in the email field
                if(empty($email_input)) {
                    $email = $user->email;
                }
                else {
                    $email = $email_input;
                }
                # Check if there's input in the about field
                if(empty($about_input)) {
                    $about = $user->about;
                }
                else {
                    $about = $about_input;
                }
                # Check if there's input in the password field
                if(empty($password_input)) {
                    $password = $user->password;
                }
                else {
                    # Check if the old password is correct
                    $old_password_input = $this->input->post('edit-password-old');
                    $old_password = hash("sha256", $old_password_input);
                    
                    if($old_password == $user->password) {
                        $password = hash("sha256", $password_input);
                    }
                    else {
                        # Set a flag for a wrong password
                        $data['wrong_password'] = TRUE;
                        $password = $user->password;
                    }
                }
                
                # Create the user that we will be putting into the database
                $input = array(
                    'email'=>$email,
                    'about'=>$about,
                    'password'=>$password
                );
                
                # Perform the query
                $this->user_model->edit_user($user->id, $input);
                
                # Update the model we're going to pass
                $user = $this->user_model->get_user($username);
                $data['user'] = $user;
                
                $data['title'] = $user->username."'s"." profile";
                
                # Load important user data into data superarray
                $data['username'] = $user->username;
                
                $data['done'] = TRUE;
                
                # Go back to the User's Profile
                $this->load->view('templates/header', $data);
                $this->load->view('user/edit_profile', $data);
                $this->load->view('templates/footer');
            }
        }
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
                                  'user_id'=>$user->id,
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
                'logged_in'=>TRUE,
                'user_id'=>$newuser->id
            );
            
            $this->session->set_userdata($userdata);
            
            $data['username'] = $newuser->username;
            
            # Show success screen
            $this->load->view('templates/header', $data);
            $this->load->view('user/success_register', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function upload_image() {
        # Get the user from the database
        $username = $this->session->userdata('username');
        $user = $this->user_model->get_user($username);
        
        $data['user'] = $user;
        
        # Function that handles the uploading of user images.
        # Configs for image uploading
        #$config['upload_path'] = base_url('upload/user').'/';
        $config['upload_path'] = './upload/user/';
        $config['file_name'] = $username.'.jpg';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
        $config['overwrite'] = TRUE;
        
        $this->load->library('upload', $config);
        
        $data['title'] = 'Upload an image';
        
        if($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            $image = $upload_data['file_name'];
            
            $input = array(
                'image'=>$image
            );
            
            # Perform the query
            #echo '<p>ID is: '.$user->id.'</p>';
            echo '<p>Image filename is: '.$image.'</p>';
            $this->user_model->edit_user($user->id, $input);
            
            # Refresh the current user
            $data['user'] = $this->user_model->get_user($username);
        }
        #echo '<p>Upload path: '.$config['upload_path'].'</p>';
        /*
        else {
            echo '<p>'.$$this->upload->display_errors().'</p>';
        }
        */
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/upload_image', $data);
        $this->load->view('templates/footer');
    }
    
    public function view() {
    }
}

?>