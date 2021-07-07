<?php
    class Operational extends CI_Controller{
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

        public function save_day()
        {
            $place_id = $this->db->get_where('places', ['user_id' => $this->session->userdata('user_id')])->row()->id;
            $day_id = $this->input->post('day_id');
            $status = $this->input->post('status');

            $cek = $this->db->get_where("place_schedules", ['place_id' => $place_id, 'day_id' => $day_id])->row();
            
            if($status == 1) //if insert/check
            {
                if(!empty($cek))
                {
                    print json_encode([
                        'error' => true,
                        'message' => 'Jadwal sudah ada/aktif!'
                    ]);
                    die;
                }

                $this->db->insert('place_schedules', [
                    'place_id' => $place_id,
                    'day_id' => $day_id,
                ]); 
            }else{ //else hapus/uncheck
                if(empty($cek))
                {
                    print json_encode([
                        'error' => true,
                        'message' => 'Jadwal tidak ada!'
                    ]);
                    die;
                }

                $this->db->where('id', $cek->id)->delete('place_schedules');
            }

            print json_encode([
                'error' => false,
                'message' => 'Berhasil melakukan aksi!'
            ]);
        }

        public function save_time()
        {
            $id = $this->input->post('id');
            $column = $this->input->post('column');
            $value = $this->input->post('value');

            $this->db->where('id', $id)->update('place_schedules', [
                $column => $value
            ]);

            print json_encode([
                'error' => false,
                'message' => 'Berhasil melakukan aksi!'
            ]);
        }
    }
?>