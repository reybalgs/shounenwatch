<?php
class Reports extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('reports_model');
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