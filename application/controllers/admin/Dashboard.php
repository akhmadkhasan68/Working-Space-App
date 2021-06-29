<?php
    class Dashboard extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true || $this->session->userdata('role') != 'admin'){
                redirect('auth/login');
            }  
        }

        public function index()
        {
            $data['title'] = "Dashboard";
            $data['view'] = $this->load->view('admin/dashboard/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/dashboard/index-js', $data, TRUE);

            $this->template->__admin($data);
        }
    }
?>