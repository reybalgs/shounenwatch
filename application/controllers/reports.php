<?php
class Reports extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('reports_model');
    }
    
    public function index() {
        $data['reports'] = $this->reports_model->get_all_reports();
        $data['title'] = 'Reports test';
        
        $this->load->view('templates/header', $data);
        $this->load->view('reports/reports', $data);
        $this->load->view('templates/footer');
    }
}

?>