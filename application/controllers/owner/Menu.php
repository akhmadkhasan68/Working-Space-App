<?php
    class Menu extends CI_Controller{
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('is_login') != true){
                redirect('auth/login');
            }
            if($this->session->userdata('role') != 'owner'){
                show_404();
            }

            $this->load->model('M_myworkingspace', 'm');
        }

        public function get_table()
        {
            $filter = $this->input->get('filter');

            $this->db->select('a.*')->from('menus a');
            $this->db->join('places b', 'b.id = a.place_id');
            if($filter != null) 
                $this->db->where('type', $filter);
            $this->db->where('b.user_id', $this->session->userdata('user_id'));
            $menus = $this->db->get()->result();

            print json_encode([
                'error' => false,
                'data' => $menus
            ]);
        }
    }
?>