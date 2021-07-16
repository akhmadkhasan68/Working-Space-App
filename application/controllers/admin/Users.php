<?php
    class Users extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true || $this->session->userdata('role') != 'admin'){
                redirect('auth/login');
            }  
        }

        public function index()
        {
            $data['title'] = "Data Pengguna";
            $data['view'] = $this->load->view('admin/users/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/users/index-js', $data, TRUE);

            $this->template->__admin($data);
        }

        public function get_table()
        {
            $data = $this->db->select('*')->from('users')->where('type !=', 'admin')->get()->result();

            print json_encode([
                'error' => false,
                'data' => $data
            ]);
        }
    }
?>