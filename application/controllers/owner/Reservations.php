<?php
    class Reservations extends CI_Controller{
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
            $this->load->model('M_places', 'places');
            $this->load->model('M_reservations', 'reservations');
        }

        public function get_table()
        {
            $status_reservation = $this->input->get_post('status_reservation');
            $status_payment = $this->input->get_post('status_payment');

            $data = $this->reservations->get_reservations(null, $status_reservation, $status_payment);

            print json_encode([
                'error' => false,
                "data" => $data
            ]);
        }

        public function get_detail()
        {
            $id = $this->input->post('id');

            $data['reservation'] = $this->reservations->get_detail($id);
            $data['place'] = $this->places->get_detail($data['reservation']['place_id']);
		    $data['payments'] = $this->places->get_places_payments($data['reservation']['place_id']);

            $this->load->view('owner/reservations/detail', $data);
        }

        public function refund()
        {
            $reservation_id = $this->input->post('reservation_id');
            $total_payment = $this->input->post('total_payment');

            $this->form_validation->set_rules('total_payment', 'Nominal Pembayaran', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $errors = $this->form_validation->error_array();
                print json_encode([
                    'error' => true,
                    'message' => [$errors['total_payment']]
                ]);
                die;
            }

            if(!is_uploaded_file($_FILES['photos']['tmp_name'])){
                print json_encode([
                    'error' => true,
                    'message' => ["Foto harus diisi!"]
                ]);
                die;
            }

            $reservation = $this->reservations->get_detail($reservation_id);
            $total = $reservation['total'];
            if($total_payment != $total)
            {
                print json_encode([
                    'error' => true,
                    'message' => ["Nominal Pengembalian tidak sesuai dengan pembayaran!"]
                ]);
                die;
            }

            $config['upload_path'] = 'uploads/photos/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']  = '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('photos')){
                $messages = $this->upload->display_errors();

                print json_encode([
                    'error' => true,
                    'message' => $messages
                ]);
                die();
            }

            $dataupload = $this->upload->data();

            $this->db->where('id', $reservation_id)->update('reservations', ['status' => '2']);
            $this->db->where('reservation_id', $reservation_id)->update('transaction', ['status' => 'refund']);

            print json_encode([
                'error' => false,
                'message' => 'Selamat, anda berhasil melakukan aksi!',
            ]);
        }
    }
?>