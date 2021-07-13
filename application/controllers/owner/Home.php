<?php
    class Home extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true){
                redirect('auth/login');
            }
            if($this->session->userdata('role') != 'owner'){
                show_404();
            }
        }

        public function reconfirm()
        {
            $id = $this->input->post('id');
            
            $this->db->where('id', $id);
            $this->db->update('places', [
                'status' => 0
            ]);

            print json_encode([
                'error' => false,
                'message' => 'Berhasil melakukan aksi!'
            ]);
        }       
    }
?>