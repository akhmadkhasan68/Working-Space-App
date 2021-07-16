<?php
    class Places extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true || $this->session->userdata('role') != 'admin'){
                redirect('auth/login');
            }  

            $this->load->model('M_places', 'places');
        }

        public function index()
        {
            $data['title'] = "Master Data Co-Working";
            $data['view'] = $this->load->view('admin/places/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/places/index-js', $data, TRUE);

            $this->template->__admin($data);
        }

        public function get_table()
        {
            $data = $this->places->get_data(null, null, null);

            print json_encode([
                'error' => false,
                'data' => $data
            ]);
        }

        public function detail()
        {
            $id = $this->input->post('id');

            $data['data'] = $this->places->get_detail($id, null);

            $this->load->view('admin/places/ajax/detail', $data);
        }

        public function review()
        {
            $id = $this->input->post('id');
            $status = $this->input->post('status');

            $this->db->where('id', $id)->update('places', ['status' => $status]);

            print json_encode([
                'error' => false,
                'message' => "Berhasil melakukan aksi!"
            ]);
        }
    }
?>