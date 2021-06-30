<?php
    class General extends CI_Controller{
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

        public function uploadImg()
        {
            $config['upload_path'] = 'uploads/photos/';
            $config['allowed_province_ids'] = 'gif|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')){
                $messages = $this->upload->display_errors();

                print json_encode([
                    'error' => true,
                    'message' => $messages
                ]);
                die();
            }
            
            $dataupload = $this->upload->data();

            $this->db->insert('place_photos', [
                'place_id' => $this->input->get_post('place_id'),
                'photo' => $dataupload['file_name']
            ]);

            print json_encode([	
                'error' => false,
                'message' => 'Selamat, anda berhasil menambahkan gambar!',
                'data' => $dataupload
            ]);
        }

        public function update()
        {
            $id = $this->input->get_post('id');

            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required');
            $this->form_validation->set_rules('capacity', 'Kapasitas', 'required');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');
            $this->form_validation->set_rules('province_id', 'Provinsi', 'required');
            $this->form_validation->set_rules('regency_id', 'Kota/Kabupaten', 'required');
            $this->form_validation->set_rules('district_id', 'Kecamatan', 'required');
            $this->form_validation->set_rules('address', 'Alamat', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                print json_encode([
                    'error' => true,
                    'message' => $errors
                ]);
                die;
            }

            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'capacity' => $this->input->post('capacity'),
                'price' => $this->input->post('price'),
                'province_id' => $this->input->post('province_id'),
                'regency_id' => $this->input->post('regency_id'),
                'district_id' => $this->input->post('district_id'),
                'address' => $this->input->post('address'),
                'longitude' => $this->input->post('longitude'),
                'latitude' => $this->input->post('latitude'),
                'status' => 0,
            ];

            $this->db->where('id', $id)->update('places', $data);

            print json_encode([
                'error' => false,
                'message' => 'Berhasil menyimpan data!'
            ]);
            die;
        }
    }
?>