<?php
    class Facilities extends CI_Controller{
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

        public function add()
        {
            $place_id = $this->db->get_where('places', ['user_id' => $this->session->userdata('user_id')])->row()->id;
            $facility_id = $this->input->post('facility_id');

            $cek = $this->db->select('*')->from('places_facilities')->where(['place_id' => $place_id, 'facility_id' => $facility_id])->get()->row();
            if(!empty($cek)){
                print json_encode([
                    'error' => true,
                    'message' => 'Fasilitas ini sudah ditambahkan!'
                ]);
                die;
            }

            $this->db->insert('places_facilities', [
                'place_id' => $place_id,
                'facility_id' => $facility_id,
            ]);

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menyimpan data!'
            ]);
        }

        public function destroy()
        {
            $place_id = $this->db->get_where('places', ['user_id' => $this->session->userdata('user_id')])->row()->id;
            $facility_id = $this->input->post('facility_id');

            $cek = $this->db->select('*')->from('places_facilities')->where(['place_id' => $place_id, 'facility_id' => $facility_id])->get()->row();
            if(empty($cek))
            {
                print json_encode([
                    'error' => true,
                    'message' => 'Fasilitas ini sudah dihapus!'
                ]);
                die;
            }

            $this->db->where('id', $cek->id)->delete('places_facilities');

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menghapus data!'
            ]);
        }
    }
?>