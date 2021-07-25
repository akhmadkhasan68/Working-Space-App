<?php
    class Reservations extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            if($this->session->userdata('is_login') != true || $this->session->userdata('role') != 'admin'){
                redirect('auth/login');
            }  

            $this->load->model('M_places', 'places');
            $this->load->model('M_reservations', 'reservations');
        }

        public function index()
        {
            $data['title'] = "Master Data Co-Working";
            $data['places'] = $this->db->select('*')->from('places')->get()->result();
            $data['view'] = $this->load->view('admin/reservations/index', $data, TRUE);
            $data['view_js'] = $this->load->view('admin/reservations/index-js', $data, TRUE);

            $this->template->__admin($data);
        }

        public function get_table()
        {
            $status_reservation = $this->input->get_post('status_reservation');
            $status_payment = $this->input->get_post('status_payment');
            $place_id = $this->input->get_post('place_id');

            $data = $this->reservations->get_reservations(null, $status_reservation, $status_payment, $place_id);

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
    }
?>