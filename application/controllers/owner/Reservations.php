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
    }
?>