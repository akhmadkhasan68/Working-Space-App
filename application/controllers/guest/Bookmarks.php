<?php
    class Bookmarks extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('places', 'm');

            if($this->session->userdata('is_login') != true){
                redirect('auth/login');
            }
            if($this->session->userdata('role') != 'guest'){
                show_404();
            }
        }

        public function add() 
        {
            $user_id = $this->session->userdata('user_id');
            $place_id = $this->input->post('id');
            $data = [
                'user_id' => $user_id,
                'place_id' => $place_id
            ];

            $cek = $this->db->get_where("bookmarks", $data)->row();

            if(!empty($cek))
            {
                $this->db->where('id', $cek->id)->delete('bookmarks');
                
                print json_encode([
                    'error' => false,
                    'message' => 'berhasil menghapus bookmark!'
                ]);
                die;
            }

            $this->db->insert('bookmarks', $data);

            print json_encode([
                'error' => false,
                'message' => 'berhasil menambahkan bookmark!'
            ]);
        }
    }
?>