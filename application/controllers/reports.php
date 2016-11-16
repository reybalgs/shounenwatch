<?php
class Reports extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('anime_model');
        $this->load->model('reports_model');
    }
    
    public function resolve_report($report_id) {
        # Resolves the given report, in other words, deletes it.
        $this->reports_model->remove_report($report_id);
    }
    
    public function get_report($anime_id) {
        $comment = $this->input->post('report-comment');
        
        $data['title'] = 'Getting report';
        $data['anime'] = $this->anime_model->get_anime($anime_id);
        $data['comment'] = $comment;
        
        if(!(empty($comment))) {
            # Comment has something
            # Insert an entry into the reports table
            $this->reports_model->set_report(array(
                'userID'=>$this->session->userdata('user_id'),
                'animeID'=>$anime_id,
                'comment'=>$comment
            ));
            
            $data['success'] = TRUE;
        }
        else {
            # Comment is empty
            $data['success'] = FALSE;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('reports/get_report', $data);
        $this->load->view('templates/footer');
    }
    
    public function index() {
        $data['reports'] = $this->reports_model->get_all_reports();
        $data['sa_reports'] = $this->reports_model->get_all_reports_from_anime(24);
        $data['torgue_reports'] = $this->reports_model->get_all_reports_from_user(8);
        $data['title'] = 'Reports test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('reports/reports', $data);
        $this->load->view('templates/footer');
    }
}

?>