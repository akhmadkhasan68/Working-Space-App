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
            $data['users'] = $this->db->select('*')->from('users')->get()->num_rows();
            $data['places'] = $this->db->select('*')->from('places')->where('status', 1)->get()->num_rows();
            $data['transactions'] = $this->db->select('*')->from('transaction')->get()->num_rows();
            $data['view'] = $this->load->view('admin/dashboard/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/dashboard/index-js', $data, TRUE);

            $this->template->__admin($data);
        }
    }
?>