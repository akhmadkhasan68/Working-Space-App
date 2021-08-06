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
            $status = $this->input->post('status');
            
            $this->db->where('id', $id);
            $this->db->update('places', [
                'status' => $status
            ]);

            print json_encode([
                'error' => false,
                'message' => 'Berhasil melakukan aksi!'
            ]);
        }       
    }
?>