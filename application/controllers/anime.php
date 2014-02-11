<?php
class Anime extends CI_Controller {
    /**
     * Controller for anime
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('anime_model');
        $this->load->model('user_model');
    }
    
    public function detail($anime_id, $submit_success = NULL,
                           $image_errors = NULL) {
        # Displays anime based on the passed ID.
        # First we need to load the anime from the database.
        $anime = $this->anime_model->get_anime($anime_id);
        $user = $this->user_model->get_user_id($anime->userID);
        
        $data['anime'] = $anime;
        $data['user'] = $user;
        $data['title'] = $anime->name;
        
        $this->load->view('templates/header', $data);
        $this->load->view('anime/detail', $data);
        $this->load->view('templates/footer');
    }
    
    public function submit() {
        # Handles the addition of new anime to the service
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Submit new anime';
        
        # Form validation rules
        # Anime name is required
        $this->form_validation->set_rules('anime-title', 'Title',
                                          'required|is_unique[anime.name]');
        # Airing is required
        $this->form_validation->set_rules('anime-airing', 'Airing Date',
                                          'required');
        # Episodes is required and only 0 to n is allowed
        $this->form_validation->set_rules('anime-episodes', 'Episodes',
                                          'required|is_natural');
        # Synopsis is required
        $this->form_validation->set_rules('anime-synopsis', 'Synopsis',
                                          'required');
        
        if($this->form_validation->run() == FALSE) {
            # Either we haven't done the form yet, or validation has turned up
            # false
            $this->load->view('templates/header', $data);
            $this->load->view('anime/create_new', $data);
            $this->load->view('templates/footer');
        }
        else {
            # Forms seem to be okay
            # Get the post data
            $title = $this->input->post('anime-title');
            $airing = $this->input->post('anime-airing');
            $episodes = $this->input->post('anime-episodes');
            $synopsis = $this->input->post('anime-synopsis');
            $image = $this->input->post('userfile');
            
            # Config files for uploading anime images
            $config['upload_path'] = './upload/anime/';
            # Shorten the title into 24 chars most
            $config['file_name'] = substr($title, 0, 24).'.jpg';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']	= '2048';
            $config['max_width']  = '4096';
            $config['max_height']  = '4096';
            $config['overwrite'] = TRUE;
            
            # Load the upload library
            $this->load->library('upload', $config);
            
            # Get the ID of the currently logged in user
            $user = ($this->user_model->get_user($this->session->userdata('username')));
            $user_id = $user->id;
            
            # Put data into an array that will be passed to the model
            if($this->upload->do_upload()) {
                $upload_data = $this->upload->data();
                $animedata = array(
                    'name'=>$title,
                    'userID'=>$user_id,
                    'synopsis'=>$synopsis,
                    'episodes'=>$episodes,
                    'airing'=>$airing,
                    'image'=>$upload_data['file_name']
                );
            }
            else {
                $animedata = array(
                    'name'=>$title,
                    'userID'=>$user_id,
                    'synopsis'=>$synopsis,
                    'episodes'=>$episodes,
                    'airing'=>$airing,
                );
            }
            
            # DEBUG file info messages
            /*
            log_message('debug', 'Image upload errors: '.$this->upload->display_errors());
            log_message('debug', 'Image file name: '.$upload_data['file_name']);
            log_message('debug', 'Raw file name: '.$upload_data['raw_name']);
            log_message('debug', 'File extension: '.$upload_data['file_ext']);
            log_message('debug', 'Is this an image: '.$upload_data['is_image']);
            log_message('debug', 'File size: '.$upload_data['file_size']);
            */
            
            # Perform the query
            $this->anime_model->set_anime($animedata);
            
            # Get the new anime from the database
            $new_anime = $this->anime_model->get_anime_name($title);
            
            # Show the detail page of the new anime_model
            $this->detail($new_anime->id, TRUE, $this->upload->display_errors());
        }
    }
    
    public function edit($anime_id) {
        # Edits the anime at the given ID.
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        # Get the username of the currently logged-in user.
        $username = $this->session->userdata('username');
        # Get the user from that username
        $user = $this->user_model->get_user($username);
        
        # Get the anime from the database
        $curr_anime = $this->anime_model->get_anime($anime_id);
        
        $data['title'] = 'Editing '.$curr_anime->name;
        $data['anime_id'] = $anime_id;
        
        # Form validation rules
        # Anime name is required
        $this->form_validation->set_rules('anime-title', 'Title',
                                          'required|is_unique[anime.name]');
        # Airing is required
        $this->form_validation->set_rules('anime-airing', 'Airing',
                                          'required');
        # Episodes is required and only 0 to n is allowed
        $this->form_validation->set_rules('anime-episodes', 'Episodes',
                                          'required|is_natural');
        # Synopsis is required
        $this->form_validation->set_rules('anime-synopsis', 'Synopsis',
                                          'required');
        
        $this->load->view('templates/header', $data);
        $this->load->view('anime/edit', $data);
        $this->load->view('templates/footer');
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